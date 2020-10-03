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
        if ($request->has('cari')) {
            $cari = $request->cari;
            $players = Player::where('name', 'LIKE', '%' . $cari . '%')->get();
            $teams = Team::where('name', 'LIKE', '%' . $cari . '%')->get();
            
            return \view('result', \compact('players', 'teams', 'cari'));
        } else {
            $players = DB::table('players')
                ->join('friends', 'players.id', '=', 'friends.player_one')
                ->orWhere('players.id', '=', 'friends.player_two')
                ->select('players.*', 'friends.*')->get();
            
            return \view('result', \compact('players'));
        }
    }
}
?>