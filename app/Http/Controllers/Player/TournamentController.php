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
            // $tournament = Event::select('title', 'participant', 'banner_url', 'start_date', 'description', 'fee', 'prize_pool')->where('start_date', 'ASC')->paginate(1);
            // $tournament = Event::all('title', 'status', 'participant', 'banner_url', 'start_date', 'description', 'fee', 'prize_pool')->where('start_date', 'ASC');
            $tournament = Event::query()->paginate(1);
            // \dd($tournament);
            return \view('tournament.index', \compact('tournament'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
