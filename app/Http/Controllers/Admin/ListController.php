<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Player;
use App\Model\Contract;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function player()
    {
        // $player = Player::select('name', 'email', 'address', 'contact', 'gender', 'city')->get();
        $player = Player::query()->paginate(50);
        return \view('admin.player-list.index', \compact('player'));
    }
    public function team()
    {
        $team = DB::table('teams')
            ->join('games', 'games.id', '=', 'teams.games_id')
            ->select('teams.id', 'teams.name as team_name', 'teams.max_member', 'teams.description', 'games.name as game_name')
            ->get();
        // dd($team);
        foreach($team as $teams) {
            $member[] = Contract::select('*')->where('teams_id', '=', $teams->id)->count();
        }
        // dd($member);
        return \view('admin.team-list.index', \compact('team', 'member'));
    }
}