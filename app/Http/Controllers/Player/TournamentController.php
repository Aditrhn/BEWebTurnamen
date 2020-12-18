<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
use App\Model\Event;
use App\Model\Join;
use App\Model\Payment;
use App\Model\Game;
use App\Model\HistoryTournament;
use Exception;
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
                ->select('players.name', 'players.email', 'players.contact', 'teams.id as team_id', 'teams.name as name_team', 'games.name as name_game', 'contracts.id')
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
                $phone = null;
                if (!empty($contract->contact)) {
                    $phone = $contract->contact;
                }
                $code = Join::JOINCODE . \uniqid() . '-' . \rand() . '-' ./*gross_amount*/ $event->fee . /*team_id*/ $contract->team_id ./*event_id*/ $id ./*approved_by*/ Auth::guard('player')->user()->id;
                // \dd($code);
                $join = Join::create([
                    'team_id' => $contract->team_id,
                    'event_id' => $id,
                    'join_date' => \now(),
                    'payment_duration' => Join::EXPIRY,
                    'phone' => $phone,
                    'approved_by' => $contract->name,
                    'approved_at' => \now(),
                    'gross_amount' => $event->fee,
                    'code_order_id' => "$code",
                ]);
                $history = HistoryTournament::create([
                    'game' => $contract->name_game,
                    'name' => $contract->name,
                    'team' => $contract->name_team,
                    'date' => $event->start_date,
                    'participant' => $event->participant,
                    'status' => 'kosong',
                ]);
                $detail_payment = DB::table('joins')
                    ->join('teams', 'teams.id', '=', 'joins.team_id')
                    ->join('events', 'events.id', '=', 'joins.event_id')
                    ->join('contracts', 'contracts.teams_id', '=', 'joins.team_id')
                    ->join('players', 'players.id', '=', 'contracts.players_id')
                    ->select('joins.id', 'teams.name as team_name', 'teams.id as team_id', 'events.id as event_id', 'events.title as event_title', 'events.fee as price', 'players.name as captain', 'players.email as mail', 'players.contact as telp')
                    ->where([
                        ['players.id', '=', Auth::guard('player')->user()->id],
                        ['teams.id', '=', $contract->team_id],
                        ['events.id', '=', $id]
                    ])->first();
                // dd($detail_payment);
                return \view('tournament.checkout', \compact('contract', 'detail_payment', 'team'));
            }
            $detail_payment = DB::table('joins')
                ->join('teams', 'teams.id', '=', 'joins.team_id')
                ->join('events', 'events.id', '=', 'joins.event_id')
                ->join('contracts', 'contracts.teams_id', '=', 'joins.team_id')
                ->join('players', 'players.id', '=', 'contracts.players_id')
                ->select('joins.id', 'teams.name as team_name', 'teams.id as team_id', 'events.id as event_id', 'events.title as event_title', 'events.fee as price', 'players.name as captain', 'players.email as mail', 'players.contact as telp')
                ->where([
                    ['players.id', '=', Auth::guard('player')->user()->id],
                    ['teams.id', '=', $contract->team_id],
                    ['events.id', '=', $id]
                ])->first();
            // dd($event);
            return \view('tournament.checkout', \compact('contract', 'detail_payment', 'team'));
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

//             $tournament = DB::table('events')
//                 ->join('joins', 'joins.event_id', '=', 'events.id')
//                 ->join('contracts', 'contracts.teams_id', '=', 'joins.team_id')
//                 ->select('events.id')
//                 ->where('contracts.players_id', '=', Auth::guard('player')->user()->id)
//                 ->first();
//             // dd($tournament);
//             return \view('tournament.success', \compact('tournament'));
//         } else {
//             return Redirect('login')->with('msg', 'Anda harus login'); //routing login
//         }
//     }
    public function checkout($id)
    {
        if (Auth::guard('player')->check()) {
            $contract = DB::table('contracts')
                ->join('players', 'players.id', '=', 'contracts.players_id')
                ->join('teams', 'teams.id', '=', 'contracts.teams_id')
                ->join('games', 'games.id', '=', 'teams.games_id')
                ->where('players.id', Auth::guard('player')->user()->id)
                ->select('players.name', 'players.email', 'players.contact as telp', 'teams.id as team_id', 'teams.name as name_team', 'games.name as name_game', 'contracts.id')
                ->first();
            $join = Join::find($id);
            // \dd($join);
            $this->initPaymentGateway();
            $customerDetails = [
                'first_name' => $join->approved_by,
                'last_name' => $contract->name_team,
                'email' => $contract->email,
                'phone' => $contract->telp,
            ];

            $params = [
                'enable_payments' => Payment::PAYMENT_CHANNELS,
                'transaction_details' => [
                    'order_id' => $join->code_order_id,
                    'gross_amount' => $join->gross_amount,
                ],
                'customer_details' => $customerDetails,
                'expiry' => [
                    "unit" => "days",
                    'duration' => Join::EXPIRY,
                ],
            ];
            try {
                $response_midtrans = \Midtrans\Snap::createTransaction($params);
                $join->_token = $response_midtrans->token;
                $join->redirect_url = $response_midtrans->redirect_url;
                $join->save();
                // \dd($join);
                return \redirect($response_midtrans->redirect_url);
            } catch (Exception $e) {
                $message = $e->getMessage();
                return \redirect()->back()->with($message);
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
