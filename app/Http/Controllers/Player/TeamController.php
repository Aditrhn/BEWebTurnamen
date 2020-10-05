<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
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
            $player_id = Auth::guard('player')->user()->id;
            $check = Contract::select('players_id')
                ->where([
                    ['players_id', '=', $player_id],
                    ['status', '=', '1']
                ])->first();

            if ($check == null) {
                return \view('team.index');
            } else {
                $team = DB::table('teams')
                    ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                    ->join('games', 'games.id', '=', 'teams.games_id')
                    ->select('teams.*', 'games.name as game_name', 'games.icon_url')
                    ->where('contracts.players_id', '=', Auth::guard('player')->user()->id)
                    ->first();
                $member = DB::table('players')
                    ->join('contracts', 'contracts.players_id', '=', 'players.id')
                    ->select('players.name', 'players.ava_url', 'contracts.role', 'contracts.status')
                    ->where([
                        ['contracts.teams_id', '=', $team->id],
                        ['contracts.status', '=', '1']
                    ])
                    ->get();
                $friends = DB::select('select * from friends f join players p on p.id = f.player_one or p.id = player_two
                    where not p.id = ' . $player_id . ' and (f.player_one = ' . $player_id . ' or f.player_two = ' . $player_id . ')
                    and f.status = "1" and p.id not in (select players_id from contracts)');
                // dd($member);
                return view('team.overview-captain', \compact('team', 'member', 'friends'));
            }
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

            $this->validate($request, [
                'name' => 'required'
            ]);
            $file = $request->file('logo_url');
            $name_icon = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/team_logo/';
            $file->move($tujuan_upload, $name_icon);
            Team::create([
                'name' => $request->name,
                'max_member' => 5,
                'logo_url' => $name_icon,
                'description' => $request->teamDesc,
                'games_id' => $games_id->id
            ]);

            $player_id = Auth::guard('player')->user()->id;
            $teams = Team::where('name', 'LIKE', '%' . $request->name . '%')->first();

            Contract::create([
                'role' => "1",
                'status' => "1",
                'teams_id' => $teams->id,
                'players_id' => $player_id
            ]);

            return \redirect('team')->with(['success' => 'Team created successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function friendInvite(Request $request)
    {
        if ($request->has('friendId') && $request->has('teamId')) {
            Contract::create([
                'role' => "2",
                'status' => "0",
                'teams_id' => $request->teamId,
                'players_id' => $request->friendId
            ]);

            return \redirect('team')->with(['success' => 'Friend invited successfully']);
        };
    }
    public function team_request()
    {
        $teams = DB::table('teams')
            ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
            ->select('teams.id', 'teams.name', 'teams.logo_url')
            ->where([
                ['contracts.players_id', '=', Auth::guard('player')->user()->id],
                ['contracts.status', '=', '0']
            ])
            ->get();
        // dd($team);
        return view('team.request-team', \compact('teams'));
    }
    public function team_acc(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamAcc')) {

                DB::table('contracts')
                    ->where([
                        ['teams_id', '=', $request->teamAcc],
                        ['players_id', '=', Auth::guard('player')->user()->id]
                    ])
                    ->update(['status' => '1']);

                return redirect('team')->with(['success' => 'Friend invited successfully']);
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_decline(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamDecline')) {

                DB::table('contracts')
                    ->where([
                        ['teams_id', '=', $request->teamDecline],
                        ['players_id', '=', Auth::guard('player')->user()->id]
                    ])
                    ->delete();

                return redirect()->back();
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_view(Team $team)
    {
        if (Auth::guard('player')->check()) {
            // $team = DB::table('team')
            //     ->join('contract', 'contract.teams_id', '=', 'team.id')
            //     ->select('team.*')
            //     ->where('contract.players_id', '=', Auth::guard('player')->user()->id)
            //     ->get();

            // dd($team);
            return view('team.overview-unsigned', \compact('team'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
