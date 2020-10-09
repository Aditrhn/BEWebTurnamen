<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
use App\Model\Event;
use App\Model\Join;
use App\Model\Team;
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
            $tournament = Event::query()->paginate(1);
            // \dd($tournament);
            return \view('tournament.index', \compact('tournament'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function registerTournament(Request $request, $id)
    {
        if (Auth::guard('player')->check()) {
            $this->initPaymentGateway();
            $event = Event::find($id);
            // $contract = DB::table('joins')
            //     ->join('contracts', 'contracts.id', '=', 'joins.team_id')
            //     ->join('players', 'players.id', '=', 'contracts.players_id')
            //     ->where('players.id', Auth::guard('player')->user()->id)
            //     ->select('joins.team_id', 'joins.event_id', 'contracts.*')
            //     ->first();
            // penting
            $contract = DB::table('contracts')
                ->join('players', 'players.id', '=', 'contracts.players_id')
                ->where('players.id', Auth::guard('player')->user()->id)
                ->select('players.*', 'contracts.teams_id', 'contracts.id')
                ->first();
            // \dd($contract);
            // \dd($contract);
            // $join = Join::create([
            //     'team_id' => $contract->id,
            //     'event_id' => $id,
            //     'join_date' => \now(),
            //     'payment_due' => \now(),
            //     'cancellation_note' => 'note'
            // ]);

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand() . '_' . $event->id . '_' . $contract->teams_id,
                    'gross_amount' => $event->fee,
                ),
                'customer_details' => array(
                    'first_name' => Auth::guard('player')->user()->name,
                    'last_name' => $contract->teams_id,
                    'email' => Auth::guard('player')->user()->email,
                    'phone' => Auth::guard('player')->user()->contact,
                ),
            );
            // // \dd($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // \dd($snapToken, $params);
            // if ($snapToken->token) {

            // }
            $team = DB::table('teams')->get();
            // \dd($team, $snapToken);
            return \view('tournament.overview', \compact('event', 'team', 'snapToken', 'params'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function payment(Request $request)
    {
        // $token = Str::random(100);
        $this->initPaymentGateway();
        $var = 20000;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $var,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                // 'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        // \dd($params);

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // \dd($params, $snapToken);
        return view('snap', \compact('params', 'snapToken'));
    }
}
