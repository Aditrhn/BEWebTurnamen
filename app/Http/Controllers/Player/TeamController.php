<?php 

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Player;
use App\Model\Game;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller 
{
    public function index()
    {
        return \view('team.index');
    }
    public function team_create_page()
    {
        $games = Game::select('name', 'id')->get();

        return \view('team.create', \compact('games'));
    }
    public function team_create()
    {
        $games = Game::select('name', 'id')->get();
        $games_name = request('teamGame');
        $games_id = Game::where('name', 'LIKE', '%' . $games_name . '%')->first();
        $team_name = request('teamName');
        $check = Team::where('name', 'LIKE', '%' . $team_name . '%')->first();

        if ($check == null) {
            $team = new Team;

            $team->name = $team_name;
            $team->max_member = 5;
            $team->logo_url = "test";
            $team->games_id = $games_id->id;
            $team->save();

            return \view('team.create', \compact('games'));
        } else {
            echo "Nama Tim Sudah Digunakan.";
        };
    }
    public function team_search()
    {
        return \view('team.search');
    }
}
?>