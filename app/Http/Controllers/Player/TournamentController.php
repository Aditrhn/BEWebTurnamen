<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
use App\Model\Event;
use App\Model\Join;
use App\Model\Payment;
use App\Model\Game;
use App\Model\HistoryTournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    public function index()
    {
        if (Auth::guard('player')->check()) {
            // $tournament = Event::select('title', 'participant', 'banner_url', 'start_date', 'description', 'fee', 'prize_pool')->where('start_date', 'ASC')->paginate(1);
            // $tournament = Event::all('title', 'status', 'participant', 'banner_url', 'start_date', 'description', 'fee', 'prize_pool')->where('start_date', 'ASC');
            $game = Game::query()->get();
            $count = Game::query()->count();
            $tournament = Event::query()->paginate(5);
            // \dd($game);
            return \view('tournament.index', \compact('tournament', 'game', 'count'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function detailTournament(Request $request, $id)
    {
        if (Auth::guard('player')->check()) {
            // $this->initPaymentGateway();
            $game = DB::table('games')
                ->join('events', 'events.game_id', '=', 'games.id')
                ->select('games.name')
                ->where('events.id', '=', $id)
                ->first();
            $event = Event::find($id);
            // \dd($event);
            $contract = DB::table('contracts')
                ->join('players', 'players.id', '=', 'contracts.players_id')
                ->join('teams', 'teams.id', '=', 'contracts.teams_id')
                ->where([
                    ['players.id', Auth::guard('player')->user()->id],
                    ['contracts.status', '=', '1']
                ])
                ->orWhere([
                    ['players.id', Auth::guard('player')->user()->id],
                    ['contracts.status', '=', '2']
                ])
                ->select('players.name', 'players.email', 'teams.id as team_id', 'contracts.id')
                ->first();
            $countmember = Contract::select('*')->where('contracts.teams_id', '=', $contract->team_id)->count();

            $fee = number_format($event->fee);
            $prize_pool = number_format($event->prize_pool);

            $team = DB::table('teams')->get();
            return \view('tournament.overview', \compact('contract', 'event', 'team', 'game', 'fee', 'prize_pool', 'countmember'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function joinTournament($id)
    {
        if (Auth::guard('player')->check()) {
            $event = Event::find($id);
            // dd($event->id);
            $contract = DB::table('contracts')
                ->join('players', 'players.id', '=', 'contracts.players_id')
                ->join('teams', 'teams.id', '=', 'contracts.teams_id')
                ->join('games', 'games.id', '=', 'teams.games_id')
                ->where('players.id', Auth::guard('player')->user()->id)
                ->select('players.name', 'players.email', 'teams.id as team_id', 'teams.name as name_team', 'games.name as name_game', 'contracts.id')
                ->first();
            // dd($contract);

            $team = DB::table('joins')
                ->join('teams', 'teams.id', '=', 'joins.team_id')
                ->where('team_id', $contract->team_id)
                ->select('status', 'teams.name as name_team')
                ->first();
            // dd($team);
            $check_team = DB::table('joins')
                ->select('team_id', 'event_id')
                ->where([
                    ['team_id', '=', $contract->team_id],
                    ['event_id', '=', $id]
                ])->first();
            // dd($check_team);

            if ($check_team == null) {
                $join = Join::create([
                    'team_id' => $contract->team_id,
                    'event_id' => $id,
                    'join_date' => \now(),
                    'payment_due' => \now(),
                    'gross_amount' => $event->fee,
                    'cancellation_note' => 'none'
                ]);
                $history = HistoryTournament::create([
                    'game' => $contract->name_game,
                    'name' => $contract->name,
                    'team' => $contract->name_team,
                    'date' => $event->start_date,
                    'participant' => $event->participant,
                    'status' => 'kosong',
                ]);
                //    dd($join);
            }


            // $detail_payment = DB::table('joins')
            //     ->join('contracts', 'contracts.id', '=', 'joins.team_id')
            //     ->join('teams', 'teams.id', '=', 'contracts.teams_id')
            //     ->join('events', 'events.id', '=', 'joins.event_id')
            //     ->join('players', 'players.id', '=', 'contracts.players_id')
            //     ->select('teams.name as team_name', 'teams.id as team_id', 'events.id as event_id', 'events.title as event_title', 'events.fee as price', 'players.name as captain', 'players.email as mail', 'players.contact as telp')
            //     ->where('players.id', Auth::guard('player')->user()->id)->first();
            $detail_payment = DB::table('joins')
                ->join('teams', 'teams.id', '=', 'joins.team_id')
                ->join('events', 'events.id', '=', 'joins.event_id')
                ->join('contracts', 'contracts.teams_id', '=', 'joins.team_id')
                ->join('players', 'players.id', '=', 'contracts.players_id')
                ->select('teams.name as team_name', 'teams.id as team_id', 'events.id as event_id', 'events.title as event_title', 'events.fee as price', 'players.name as captain', 'players.email as mail', 'players.contact as telp')
                ->where([
                    ['players.id', '=', Auth::guard('player')->user()->id],
                    ['teams.id', '=', $contract->team_id],
                    ['events.id', '=', $id]
                ])->first();
            // dd($detail_payment);
            $this->initPaymentGateway();
            $params = array(
                'enable_payments' => Payment::PAYMENT_CHANNELS,
                'transaction_details' => array(
                    'order_id' => rand() . '_from_' . $detail_payment->captain,
                    'gross_amount' => $detail_payment->price,
                ),
                'customer_details' => array(
                    'first_name' => $detail_payment->captain,
                    'last_name' => $detail_payment->team_name,
                    'email' => $detail_payment->mail,
                    'phone' => $detail_payment->telp,
                ),
                'expiry' => array(
                    'start_time' => date('Y-m-d H:i:s T'),
                    'unit' => \App\Model\Payment::EXPIRY_UNIT,
                    'duration' => \App\Model\Payment::EXPIRY_DURATION,
                ),
            );
            // \dd($params['transaction_details']['order_id']);
            // $snap = \Midtrans\Snap::createTransaction($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // $midtrans = \json_encode($snapToken);
            // \dd($snap);

            // \dd($midtrans);
            // $payment = Payment::create([
            //     'order_id' => $params['transaction_details']['order_id'],
            //     'gross_amount' => $params['transaction_details']['gross_amount'],
            //     // 'status_code'=>
            // ]);
            return \view('tournament.checkout', \compact('contract', 'detail_payment', 'snapToken', 'team'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    // public function payment(Request $request)
    // {
    //     // $token = Str::random(100);
    //     $this->initPaymentGateway();
    //     $var = 20000;
    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => rand(),
    //             'gross_amount' => $var,
    //         ),
    //         'customer_details' => array(
    //             'first_name' => 'budi',
    //             // 'last_name' => 'pratama',
    //             'email' => 'budi.pra@example.com',
    //             'phone' => '08111222333',
    //         ),
    //     );

    //     // \dd($params);

    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    //     // \dd($params, $snapToken);
    //     return view('snap', \compact('params', 'snapToken'));
    // }
}
