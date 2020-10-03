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
        if (Auth::guard('player')->check()) {
            return \view('team.index');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_create_page()
    {
        if (Auth::guard('player')->check()) {
            // $games = Game::select('name', 'id')->get();

            // return \view('team.create', \compact('games'));
            return \view('team.create');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function store(Request $request)
    {
        if (Auth::guard('player')->check()) {
            // $games = Game::select('name', 'id')->get();
            // $games_id = Game::where('name', 'LIKE', '%' . $request->teamGame . '%')->first();
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
                // 'games_id' => 'required',
            ]);
            $file = $request->file('logo_url');
            $name_icon = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/team_logo/';
            $file->move($tujuan_upload, $name_icon);
            Team::create([
                'name' => $request->name,
                'max_member' => 10,
                'logo_url' => $name_icon
                // 'games_id' => $games_id->id
            ]);

            dd($name_icon);
            // return \redirect('team-overview')->with(['success' => 'Team created successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_overview()
    {
        if (Auth::guard('player')->check()) {
            return view('team.overview');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_search()
    {
        if (Auth::guard('player')->check()) {
            return \view('team.search');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
