<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
use App\Model\Player;
use App\Model\Game;
use App\Model\Team;
use App\Model\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use File;

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
                    ->where([
                        ['contracts.players_id', '=', Auth::guard('player')->user()->id],
                        ['contracts.status', '=', '1']
                        ])
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
                $request = DB::table('contracts')
                    ->join('players', 'players.id', '=', 'contracts.players_id')
                    ->select('players.id', 'players.name', 'players.ava_url')
                    ->where('contracts.status', '=', '2')
                    ->get();
                $role = DB::table('contracts')
                    ->select('role')
                    ->where([
                        ['players_id', '=', Auth::guard('player')->user()->id],
                        ['teams_id', '=', $team->id]
                        ])
                    ->first();
                $sponsor = Sponsor::select('*')
                    ->where([
                        ['team_id', '=', $team->id],
                        ['status', '=', '1']
                        ])
                    ->get();

                return view('team.overview-captain', \compact('team', 'member', 'friends', 'request', 'role', 'sponsor'));
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
        request()->validate([
            'name' => 'required|unique:teams'
        ],
        [
            'name.required' => 'Team Name is required',
            'name.unique' => 'Team Name is taken'
        ]);

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
            // $teams = Team::where('name', 'LIKE', '%' . $request->name . '%')->first();
            $teams = Team::where('logo_url', '=', $name_icon)->first();
            
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
    public function team_edit(Request $request)
    {
        if (Auth::guard('player')->check()) {
            $team = DB::table('teams')
                ->select('id', 'name', 'logo_url', 'description')
                ->where('teams.id', '=', $request->teamId)
                ->first();
            $count = Sponsor::select('*')
                ->where('team_id', '=', $request->teamId)
                ->count();
            $sponsor = Sponsor::select('*')
                ->where('team_id', '=', $request->teamId)
                ->get();
            $status = Sponsor::select('status')
                ->where('team_id', '=', $request->teamId)
                ->get();
            // dd($status);
            return \view('team.edit', \compact('team', 'sponsor', 'count', 'status'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_update(Request $request)
    {
        if (Auth::guard('player')->check()) {
            $team = Team::select('*')
                ->where('id', '=', $request->teamId)
                ->first();
            $count = Sponsor::select('*')
                ->where('team_id', '=', $request->teamId)
                ->count();
            $sponsor = Sponsor::select('*')
                ->where('team_id', '=', $request->teamId)
                ->get();
            $team_logo = Team::select('logo_url')
                ->where('id', '=', $request->teamId)
                ->first()->logo_url;
            // dd($sponsor_logo);
            if ($request->hasFile('logo_url')) {
                $logo = $request->logo_url;
                $team_logo = \time() . "_" . $logo->getClientOriginalName();
                $logo->move('images/team_logo/', $team_logo);
                $team->logo_url = 'images/team_logo/' . $team_logo;
                File::delete('team_logo/' . $team->logo_url);
            }
            // Sponsor add & update
            if ($count == 0) {
                // Create Sponsor 1
                if ($request->hasFile('sponsor_url1')){
                    $file = $request->file('sponsor_url1');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor1')) {
                        Sponsor::create([
                            'name' => $request->sponsorName1,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName1,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }

                // Create Sponsor 2
                if ($request->hasFile('sponsor_url2')){
                    $file = $request->file('sponsor_url2');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor2')) {
                        Sponsor::create([
                            'name' => $request->sponsorName2,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName2,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }

                // Create Sponsor 3
                if ($request->hasFile('sponsor_url3')){
                    $file = $request->file('sponsor_url3');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor3')) {
                        Sponsor::create([
                            'name' => $request->sponsorName3,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName3,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }

                // Create Sponsor 4
                if ($request->hasFile('sponsor_url4')){
                    $file = $request->file('sponsor_url4');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor4')) {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }
            } elseif ($count == 1) {
                // Update Sponsor 1
                // Update logo Sponsor 1
                if ($request->hasFile('sponsor_url1')){
                    $sponsor_logo = $sponsor[0]->logo_url;
                    $logo = $request->sponsor_url1;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[0]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[0]->logo_url);
                    $sponsor[0]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 1
                $sponsor[0]->update([
                    'name' => $request->sponsorName1,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor
                if ($request->has('enable_sponsor1')) {
                    $sponsor[0]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[0]->update([
                        'status' => '0'
                    ]);
                }

                // Create Sponsor 2
                if ($request->hasFile('sponsor_url2')){
                    $file = $request->file('sponsor_url2');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor2')) {
                        Sponsor::create([
                            'name' => $request->sponsorName2,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName2,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }

                // Create Sponsor 3
                if ($request->hasFile('sponsor_url3')){
                    $file = $request->file('sponsor_url3');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor3')) {
                        Sponsor::create([
                            'name' => $request->sponsorName3,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName3,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }

                // Create Sponsor 4
                if ($request->hasFile('sponsor_url4')){
                    $file = $request->file('sponsor_url4');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor4')) {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }
            } elseif ($count == 2) {
                // Update Sponsor 1
                // Update logo Sponsor 1
                if ($request->hasFile('sponsor_url1')){
                    $sponsor_logo = $sponsor[0]->logo_url;
                    $logo = $request->sponsor_url1;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[0]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[0]->logo_url);
                    $sponsor[0]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 1
                $sponsor[0]->update([
                    'name' => $request->sponsorName1,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 1
                if ($request->has('enable_sponsor1')) {
                    $sponsor[0]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[0]->update([
                        'status' => '0'
                    ]);
                }

                // Update Sponsor 2
                // Update Logo Sponsor 2
                if ($request->hasFile('sponsor_url2')){
                    $sponsor_logo = $sponsor[1]->logo_url;
                    $logo = $request->sponsor_url2;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[1]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[1]->logo_url);
                    $sponsor[1]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 2
                $sponsor[1]->update([
                    'name' => $request->sponsorName2,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 2
                if ($request->has('enable_sponsor2')) {
                    $sponsor[1]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[1]->update([
                        'status' => '0'
                    ]);
                }

                // Create Sponsor 3
                if ($request->hasFile('sponsor_url3')){
                    $file = $request->file('sponsor_url3');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor3')) {
                        Sponsor::create([
                            'name' => $request->sponsorName3,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName3,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }

                // Create Sponsor 4
                if ($request->hasFile('sponsor_url4')){
                    $file = $request->file('sponsor_url4');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor4')) {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }
            } elseif ($count == 3) {
                // Update Sponsor 1
                // Update logo Sponsor 1
                if ($request->hasFile('sponsor_url1')){
                    $sponsor_logo = $sponsor[0]->logo_url;
                    $logo = $request->sponsor_url1;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[0]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[0]->logo_url);
                    $sponsor[0]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 1
                $sponsor[0]->update([
                    'name' => $request->sponsorName1,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 1
                if ($request->has('enable_sponsor1')) {
                    $sponsor[0]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[0]->update([
                        'status' => '0'
                    ]);
                }

                // Update Sponsor 2
                // Update Logo Sponsor 2
                if ($request->hasFile('sponsor_url2')){
                    $sponsor_logo = $sponsor[1]->logo_url;
                    $logo = $request->sponsor_url2;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[1]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[1]->logo_url);
                    $sponsor[1]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 2
                $sponsor[1]->update([
                    'name' => $request->sponsorName2,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 2
                if ($request->has('enable_sponsor2')) {
                    $sponsor[1]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[1]->update([
                        'status' => '0'
                    ]);
                }

                // Update Sponsor 3
                // Update Logo Sponsor 3
                if ($request->hasFile('sponsor_url3')){
                    $sponsor_logo = $sponsor[2]->logo_url;
                    $logo = $request->sponsor_url3;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[2]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[2]->logo_url);
                    $sponsor[2]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 3
                $sponsor[2]->update([
                    'name' => $request->sponsorName3,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 3
                if ($request->has('enable_sponsor3')) {
                    $sponsor[2]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[2]->update([
                        'status' => '0'
                    ]);
                }

                // Create Sponsor 4
                if ($request->hasFile('sponsor_url4')){
                    $file = $request->file('sponsor_url4');
                    $name_icon = \time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/sponsor_logo/';
                    $file->move($tujuan_upload, $name_icon);
                    if ($request->has('enable_sponsor4')) {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '1'
                        ]);
                     } else {
                        Sponsor::create([
                            'name' => $request->sponsorName4,
                            'logo_url' => $name_icon,
                            'team_id' => $request->teamId,
                            'status' => '0'
                        ]);
                     }
                }
            } else {
                // Update Sponsor 1
                // Update logo Sponsor 1
                if ($request->hasFile('sponsor_url1')){
                    $sponsor_logo = $sponsor[0]->logo_url;
                    $logo = $request->sponsor_url1;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[0]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[0]->logo_url);
                    $sponsor[0]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 1
                $sponsor[0]->update([
                    'name' => $request->sponsorName1,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 1
                if ($request->has('enable_sponsor1')) {
                    $sponsor[0]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[0]->update([
                        'status' => '0'
                    ]);
                }

                // Update Sponsor 2
                // Update Logo Sponsor 2
                if ($request->hasFile('sponsor_url2')){
                    $sponsor_logo = $sponsor[1]->logo_url;
                    $logo = $request->sponsor_url2;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[1]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[1]->logo_url);
                    $sponsor[1]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 2
                $sponsor[1]->update([
                    'name' => $request->sponsorName2,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 2
                if ($request->has('enable_sponsor2')) {
                    $sponsor[1]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[1]->update([
                        'status' => '0'
                    ]);
                }

                // Update Sponsor 3
                // Update Logo Sponsor 3
                if ($request->hasFile('sponsor_url3')){
                    $sponsor_logo = $sponsor[2]->logo_url;
                    $logo = $request->sponsor_url3;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[2]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[2]->logo_url);
                    $sponsor[2]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 3
                $sponsor[2]->update([
                    'name' => $request->sponsorName3,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 3
                if ($request->has('enable_sponsor3')) {
                    $sponsor[2]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[2]->update([
                        'status' => '0'
                    ]);
                }

                // Update Sponsor 4
                // Update Logo Sponsor 4
                if ($request->hasFile('sponsor_url4')){
                    $sponsor_logo = $sponsor[3]->logo_url;
                    $logo = $request->sponsor_url4;
                    $sponsor_logo = \time() . "_" . $logo->getClientOriginalName();
                    $logo->move('images/sponsor_logo/', $sponsor_logo);
                    $sponsor[3]->logo_url = 'images/sponsor_logo/' . $sponsor_logo;
                    File::delete('sponsor_logo/' . $sponsor[3]->logo_url);
                    $sponsor[3]->update([
                        'logo_url' => $sponsor_logo
                        ]);
                }
                // Update Data Sponsor 4
                $sponsor[3]->update([
                    'name' => $request->sponsorName4,
                    'team_id' => $request->teamId,
                ]);
                // Enable/Disable Sponsor 4
                if ($request->has('enable_sponsor4')) {
                    $sponsor[3]->update([
                        'status' => '1'
                    ]);
                 } else {
                    $sponsor[3]->update([
                        'status' => '0'
                    ]);
                }
            }
            // Sponsor add & update END

            $team->update([
                'name' => $request->teamName,
                'logo_url' => $team_logo,
                'description' => $request->teamDesc
            ]);

            return redirect('team');
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
    public function team_invitation()
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
        return view('team.team-invitation', \compact('teams'));
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
    public function teamreq_acc(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamId') && $request->has('friendId')) {
                
                DB::table('contracts')
                    ->where([
                        ['teams_id', '=', $request->teamId],
                        ['players_id', '=', $request->friendId],
                        ['status', '=', '2']
                    ])
                    ->update(['status' => '1']);

                return redirect('team')->with(['success' => 'Request Accepted successfully']);
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
    public function teamreq_decline(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamId') && $request->has('friendId')) {

                DB::table('contracts')
                    ->where([
                        ['teams_id', '=', $request->teamId],
                        ['players_id', '=', $request->friendId]
                    ])
                    ->delete();

                return redirect('team')->with(['success' => 'Request Declined successfully']);
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_view(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamId')) {
                $check = DB::table('teams')
                    ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                    ->select('teams.id')
                    ->where('contracts.players_id', '=', Auth::guard('player')->user()->id)
                    ->first();
                $team = DB::table('teams')
                    ->join('games', 'games.id', '=', 'teams.games_id')
                    ->select('teams.*', 'games.name as game_name', 'games.icon_url')
                    ->where('teams.id', '=', $request->teamId)
                    ->first();
                $member = DB::table('players')
                    ->join('contracts', 'contracts.players_id', '=', 'players.id')
                    ->select('players.name', 'players.ava_url', 'contracts.role', 'contracts.status')
                    ->where([
                        ['contracts.teams_id', '=', $request->teamId],
                        ['contracts.status', '=', '1']
                    ])
                    ->get();
                $sponsor = Sponsor::select('*')
                    ->where([
                        ['team_id', '=', $request->teamId],
                        ['status', '=', '1']
                        ])
                    ->get();
            }
            if ($check->id == $team->id) {
                return Redirect('team');
            } else {
                return view('team.overview-unsigned', \compact('team', 'member', 'sponsor'));
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function team_join(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamId')) {
                $team = DB::table('teams')
                    ->join('games', 'games.id', '=', 'teams.games_id')
                    ->select('teams.*', 'games.name as game_name', 'games.icon_url')
                    ->where('teams.id', '=', $request->teamId)
                    ->first();
                $member = DB::table('players')
                    ->join('contracts', 'contracts.players_id', '=', 'players.id')
                    ->select('players.name', 'players.ava_url', 'contracts.role', 'contracts.status')
                    ->where([
                        ['contracts.teams_id', '=', $request->teamId],
                        ['contracts.status', '=', '1']
                    ])
                    ->get();
                $check = DB::table('contracts')
                ->select('*')
                ->where([
                    ['teams_id', '=', $request->teamId],
                    ['players_id', '=', Auth::guard('player')->user()->id],
                    ['status', '=', '2']
                    ])
                ->first();
    
                if ($check == null) {
                    Contract::create([
                        'role' => "2",
                        'status' => "2",
                        'teams_id' => $request->teamId,
                        'players_id' => Auth::guard('player')->user()->id
                    ]);
                }
    
                return \view('team.overview-unsigned', \compact('team', 'member'));
            };
        }
    }
    public function team_leave(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamId')) {

                DB::table('contracts')
                    ->where([
                        ['teams_id', '=', $request->teamId],
                        ['players_id', '=', Auth::guard('player')->user()->id],
                        ['status', '=', '1']
                    ])
                    ->delete();
            }
            return redirect('team');
        }
    }
    public function team_disband(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('teamId')) {
                DB::table('sponsors')
                    ->where('team_id', '=', $request->teamId)
                    ->delete();
                DB::table('contracts')
                    ->where([
                        ['teams_id', '=', $request->teamId],
                    ])
                    ->delete();
                DB::table('teams')
                    ->where('id', '=', $request->teamId)
                    ->delete();
            }
            return redirect('team');
        }
    }
}
