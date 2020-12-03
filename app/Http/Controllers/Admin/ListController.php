<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Excel\PlayersExport;
use App\Http\Controllers\Controller;
use App\Model\Player;
use App\Model\Contract;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function player()
    {
        if (Auth::guard('admin')->check()) {
            // $player = Player::select('name', 'email', 'address', 'contact', 'gender', 'city')->get();
            $player = Player::query()->paginate(50);
            return \view('admin.player-list.index', \compact('player'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
    public function exportPlayer()
    {
        if (Auth::guard('admin')->check()) {
            return Excel::download(new PlayersExport, 'players.xlsx');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
    public function team()
    {
        if (Auth::guard('admin')->check()) {
            $team = DB::table('teams')
                ->join('games', 'games.id', '=', 'teams.games_id')
                ->select('teams.id', 'teams.name as team_name', 'teams.max_member', 'teams.description', 'games.name as game_name')
                ->paginate(50);
            return \view('admin.team-list.index', \compact('team'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
}
