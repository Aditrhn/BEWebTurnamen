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
    public function team_create(Request $request)
    {
        // $games = Game::select('name', 'id')->get();
        $games_id = Game::where('name', 'LIKE', '%' . $request->teamGame . '%')->first();
        // $check = Team::where('name', 'LIKE', '%' . $request->teamName . '%')->first();

        // if ($check == null) {
        //     // $team = new Team;

        //     // $team->name = $request->teamName;
        //     // $team->max_member = 5;
        //     // $team->logo_url = "test";
        //     // $team->games_id = $games_id->id;
        //     // $team->save();

        //     // return \view('team.create', \compact('games'));
        // } else {
        //     echo "Nama Tim Sudah Digunakan.";
        // };

        $this->validate($request, [
            'name' => 'required',
            'games_id' => 'required',
        ]);
        $file = $request->file('logo_url');
        $name_icon = \time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'images/team_logo/';
        $file->move($tujuan_upload, $name_icon);
        Team::create([
            'name' => $request->teamName,
            'max_member' => 5,
            'logo_url' => $name_icon,
            'games_id' => $games_id->id
        ]);

        dd($name_icon);
        return \redirect('team.overview')->with(['success' => 'Team created successfully']);
    }
    public function team_overview()
    {
        return view('team.overview');
    }
    public function team_search()
    {
        return \view('team.search');
    }
}
?>