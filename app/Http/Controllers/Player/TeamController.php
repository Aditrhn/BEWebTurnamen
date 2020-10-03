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
    public function team_create()
    {
        if (Auth::guard('player')->check()) {
            $games = Game::select('name', 'id')->get();

            return \view('team.create', \compact('games'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function store(Request $request)
    {
        if (Auth::guard('player')->check()) {
            $games_id = Game::where('name', 'LIKE', '%' . $request->teamGame . '%')->first();
            // $check = Team::where('name', 'LIKE', '%' . $request->teamName . '%')->first();

            $this->validate($request, [
                'name' => 'required'
            ]);
            $file = $request->file('logo_url');
            $name_icon = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/team_logo/';
            $file->move($tujuan_upload, $name_icon);
            Team::create([
                'name' => $request->name,
                'max_member' => 10,
                'logo_url' => $name_icon,
                'games_id' => $games_id->id
            ]);

            return \redirect('team-overview')->with(['success' => 'Team created successfully']);
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
