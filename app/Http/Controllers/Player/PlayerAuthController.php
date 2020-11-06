<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
use App\Model\Team;
use App\Model\Friend;
use App\Model\Game;
use App\Model\HistoryTournament;
use App\Model\Player;
use App\Model\PlayerGame;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use File;

class PlayerAuthController extends Controller
{
    public function index()
    {
        //cek jika user belum logout maka akan redirect back
        // if(!Auth::guard('player')->check()){
        return \view('player.auth.login'); //view login
        // } else {
        //     return redirect()->back();
        // }
    }
    public function register()
    {
        //cek jika user belum logout maka akan redirect back
        // if(!Auth::guard('player')->check()){
        return \view('player.auth.register'); //view register
        // } else {
        //     return redirect()->back();
        // }
    }
    public function postLogin(Request $request)
    {
        \request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required'
            ]
        );
        // $player = Player::where('email', $request->email)->first();
        if (Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('dashboard'); //redirect to url link dashboard
        } else {
            return \redirect('login')->with(['success' => 'Email or password is incorrect']); //routing login jika user tidak ada
        }
    }
    public function postRegister(Request $request)
    {
        \request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:players',
            'password' => 'required|min:8',
        ]);
        // $data = $request->all();
        // $check = $this->create($data);
        Player::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // \dd(Auth::guard('player')->user());
        if (Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('dashboard')->with(['success' => 'Register success']); //redirect to url link dashboard
        } else {
            return Redirect::to("login"); //routing login jika user tidak ada
        }
        // return \redirect('dashboard'); //redirect to url link dashboard
        // return Redirect::to("dashboard")->withSuccess('Great! U have successfully loggedin'); //routing dashboard
    }
    public function dashboard()
    {
        if (Auth::guard('player')->check()) {
            // $notif = $this->notifFriend();
            $cek = new Controller();
            $game = Game::query()->get();
            // \dd($notif);
            // \dd($notifTeams);
            return view('player.dashboard', \compact('game')); //view dashboard
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function create(array $data)
    {
        return Player::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login'); //routing login
    }
    public function profile()
    {
        if (Auth::guard('player')->check()) {
            $game = DB::table('players')
                ->join('player_games', 'player_games.players_id', '=', 'players.id')
                ->select('players.*', 'player_games.*')
                ->get();
            $friend = DB::select('select p.name, p.ava_url, p.id from friends f join players p on p.id = f.player_one or p.id = player_two where not p.id = ' . Auth::guard('player')->user()->id . ' and (f.player_one = ' . Auth::guard('player')->user()->id . ' or f.player_two = ' . Auth::guard('player')->user()->id . ') and f.status = "1"');

            $team = DB::table('teams')
                ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                ->select('teams.id', 'teams.name', 'teams.logo_url', 'teams.description')
                ->where('contracts.players_id', '=', Auth::guard('player')->user()->id)
                ->get();

            $history = HistoryTournament::all();
            // dd($team);
            return \view('player.profile', \compact('game', 'friend', 'team', 'history'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function userProfile(Request $request, Player $player)
    {
        if (Auth::guard('player')->check()) {
            $check = DB::table('friends')
                ->select('*')
                ->where([
                    ['player_one', '=', $player->id],
                    ['player_two', '=', Auth::guard('player')->user()->id]
                ])
                ->orWhere([
                    ['player_one', '=', Auth::guard('player')->user()->id],
                    ['player_two', '=', $player->id]
                ])->first();
            $checks = DB::table('friends')
                ->select('*')
                ->where([
                    ['player_one', '=', $player->id],
                    ['player_two', '=', Auth::guard('player')->user()->id],
                    ['status', '=', '0']
                ])
                ->orWhere([
                    ['player_one', '=', Auth::guard('player')->user()->id],
                    ['player_two', '=', $player->id],
                    ['status', '=', '0']
                ])->first();
            $game = DB::table('players')
                ->join('player_games', 'player_games.players_id', '=', 'players.id')
                ->select('players.*', 'player_games.*')
                ->get();
            $friend = DB::select('select p.name, p.ava_url from friends f join players p on p.id = f.player_one or p.id = player_two where not p.id = ' . $player->id . ' and (f.player_one = ' . $player->id . ' or f.player_two = ' . $player->id . ') and f.status = "1"');
            $team = DB::table('teams')
                ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                ->select('teams.id', 'teams.name', 'teams.logo_url', 'teams.description')
                ->where('contracts.players_id', '=', $player->id)
                ->get();
            // $request->user();
            // \dd($player);
            // return \response()->json($player);
            // return view('player.user-profile', [
            //     'user' => $request->user()
            // ], \compact('player'));
            return \view('player.user-profile', \compact('player', 'game', 'friend', 'team', 'check', 'checks'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function editProfile(Request $request)
    {
        if (Auth::guard('player')->check()) {
            return view('player.edit-profile', [
                'user' => $request->user()
            ]);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function updateProfile(Request $request)
    {
        if (Auth::guard('player')->check()) {
            $player = Auth::guard('player')->user();
            $ava_name = Auth::guard('player')->user()->ava_url;
            if ($request->hasFile('ava_url')) {
                $ava = $request->ava_url;
                $ava_name = \time() . "_" . $ava->getClientOriginalName();
                $ava->move('images/avatars/', $ava_name);
                $player->ava_url = 'images/avatars/' . $ava_name;
                File::delete('avatars/' . $player->ava_url);
            }

            $player->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'address' => $request->address,
                'email' => $request->mail,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'ava_url' => $ava_name,
                'city' => $request->city,
                'province' => $request->province,
                'status' => $request->status
            ]);

            return \redirect('profile')->with(['success' => 'Profile updated successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
