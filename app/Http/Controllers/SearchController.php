<?php

namespace App\Http\Controllers;

use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('player')->check()){
            if ($request->has('cari')) {
                $player = Player::where([
                    ['name', 'LIKE', '%' . $request->cari . '%'],
                    ['name', 'not LIKE', '%' . Auth::guard('player')->user()->name . '%']
                    ])->get();
                $team = Team::where('name', 'LIKE', '%' . $request->cari . '%')->get();
                $tournament = DB::table('events')
                    ->join('games', 'games.id', '=', 'events.game_id')
                    ->select('games.icon_url as logo', 'events.title as name', 'events.start_date as date', 'events.fee', 'events.participant as participants')
                    ->where('events.title', 'LIKE', '%' . $request->cari . '%')->get();
                $cari = $request->cari;
                // \dd($request);
                return \view('result', \compact('player', 'team', 'cari', 'tournament'));
            } else {
                $player = DB::table('players')
                    ->join('friends', 'players.id', '=', 'friends.player_one')
                    ->orWhere('players.id', '=', 'friends.player_two')
                    ->select('players.*', 'friends.*')->get();
    
                return \view('result', \compact('players'));
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login

        }        
    }
}
