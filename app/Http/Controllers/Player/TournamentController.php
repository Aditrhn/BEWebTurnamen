<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    public function index()
    {
        if (Auth::guard('player')->check()) {
            $tournament = Event::select('title', 'participant', 'banner_url', 'start_date', 'description', 'fee', 'prize_pool')->where('start_date', 'ASC')->paginate(1);
            // $tournament = Event::all('title', 'status', 'participant', 'banner_url', 'start_date', 'description', 'fee', 'prize_pool')->where('start_date', 'ASC')->paginate(15);
            // $tournament = Event::query()->paginate(5);
            // \dd($tournament);
            return \view('tournament.index', \compact('tournament'));
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access'); //routing login
    }
}
