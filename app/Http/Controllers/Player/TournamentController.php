<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Event;
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
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand() . '_' . $event->id,
                    'gross_amount' => $event->fee,
                ),
                'customer_details' => array(
                    'first_name' => 'aa',
                    // 'last_name' => 'pratama',
                    'email' => 'budi.pra@example.com',
                    'phone' => '08111222333',
                ),
            );

            // \dd($params);

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // \dd($snapToken);
            // if ($snapToken->token) {
            // }
            // $team = Team::select('id', 'name')->get();
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
