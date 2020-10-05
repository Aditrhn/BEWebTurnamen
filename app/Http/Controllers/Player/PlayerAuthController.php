<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Contract;
use App\Model\Team;
use App\Model\Friend;
use App\Model\Game;
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
        return \view('player.auth.login'); //view login
    }
    public function register()
    {
        return \view('player.auth.register'); //view register
    }
    public function postLogin(Request $request)
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $player = Player::where('email', $request->email)->first();
        // // dd(Hash::check($request->password, $player->password));
        // if (Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        //   // return \response()->json($player);
        //   return \view('player.dashboard');
        // } else {
        //   return Redirect::to("login") //routing login jika user tidak ada
        //     ->withSuccess('Oppes! You have entered invalid credentials');
        // }

        if (Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('dashboard'); //redirect to url link dashboard
        } else {
            return Redirect::to("login"); //routing login jika user tidak ada
        }
    }
    public function postRegister(Request $request)
    {
        \request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:players',
            'password' => 'required|min:6',
            // 'address' => 'required',
            // 'contact' => 'required|max:15',
            // 'ava_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $player = Auth::user();
        // $ava_name = $player->id . '_avatar' . time() . '.' . \request()->ava_url->getClientOriginalExtension();
        // $ava_url = \request()->file('ava_url');
        // $ava_name = $ava_url->getClientOriginalName() . '_avatar' . \time();
        // $ava_folder = \storage_path('ava_player');
        // $ava_url->move($ava_folder, $ava_name);

        $data = $request->all();
        $check = $this->create($data);
        return Redirect::to("dashboard")->withSuccess('Great! U have successfully loggedin'); //routing dashboard
    }
    public function dashboard()
    {
        if (Auth::guard('player')->check()) {
            $game = Game::all();
            return view('player.dashboard'); //view dashboard
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
            // 'address' => $data['address'],
            // 'contact' => $data['contact'],
            // 'ava_url' => $data['ava_url'],
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
            // $player_game = PlayerGame::all()->join('games','player_games.players_id');
            // $game = Game::select('name', 'platform')->get();
            $game = DB::table('players')
                ->join('player_games', 'player_games.players_id', '=', 'players.id')
                ->select('players.*', 'player_games.*')
                ->get();

            // SQL
            //SELECT p.name FROM friends f join players p on p.id = f.player_one OR p.id = f.player_two WHERE p.id != '1' AND (f.player_one = '1' OR f.player_two = '1') AND f.status = '1'
            // $friend = Friend::select('players.name')->join('players', function ($join) {
            //     $join->on('players.id', '=', 'friends.player_one');
            //     $join->orOn('players.id', '=', 'friends.player_two');
            // })->where('players.id', '!=', Auth::guard('player')->user()->id)->where(function ($query) {
            //     $query->where('friends.player_one', Auth::guard('player')->user()->id);
            //     $query->orWhere('friends.player_two', Auth::guard('player')->user()->id);
            // })->where('friends.status', 1)->get();
            $friend = DB::select('select p.name,p.ava_url from friends f join players p on p.id = f.player_one or p.id = player_two where not p.id = ' . Auth::guard('player')->user()->id . ' and (f.player_one = ' . Auth::guard('player')->user()->id . ' or f.player_two = ' . Auth::guard('player')->user()->id . ') and f.status = "1"');

            $team = DB::table('teams')
                ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                ->select('teams.name', 'teams.logo_url', 'teams.description')
                ->where('contracts.players_id', '=', Auth::guard('player')->user()->id)
                ->get();

            // dd($team);
            return \view('player.profile', \compact('game', 'friend', 'team'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function userProfile(Request $request, Player $player)
    {
        if (Auth::guard('player')->check()) {
            $game = DB::table('players')
                ->join('player_games', 'player_games.players_id', '=', 'players.id')
                ->select('players.*', 'player_games.*')
                ->get();
            $friend = DB::select('select p.name,p.ava_url from friends f join players p on p.id = f.player_one or p.id = player_two where not p.id = ' . Auth::guard('player')->user()->id . ' and (f.player_one = ' . Auth::guard('player')->user()->id . ' or f.player_two = ' . Auth::guard('player')->user()->id . ') and f.status = "1"');
            $team = DB::table('teams')
                ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                ->select('teams.name', 'teams.logo_url', 'teams.description')
                ->where('contracts.players_id', '=', Auth::guard('player')->user()->id)
                ->get();
            // $request->user();
            // \dd($player);
            // return \response()->json($player);
            // return view('player.user-profile', [
            //     'user' => $request->user()
            // ], \compact('player'));
            return \view('player.user-profile', \compact('player', 'game', 'friend', 'team'));
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
            // $this->validate($request, [
            //     'name' => 'required',
            //     // 'email' => 'required|email|unique:players',
            //     // 'password' => 'required|min:6',
            //     // 'address' => 'required',
            //     // 'contact' => 'required|max:15',
            //     // 'gender' => ' required'
            //     // 'ava_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);

            $player = Auth::guard('player')->user();
            // \dd($player);
            $ava_name = Auth::guard('player')->user()->ava_url;
            if ($request->hasFile('ava_url')) {
                $ava = $request->ava_url;
                $ava_name = \time() . "_" . $ava->getClientOriginalName();
                $ava->move('images/avatars/', $ava_name);
                $player->ava_url = 'images/avatars/' . $ava_name;
                File::delete('avatars/' . $player->ava_url);
            }
            // if ($request->hasFile('ava_url')) {
            //     $file = $request->file('ava_url');
            //     $ava_name = \time() . "_" . $request->file('ava_url')->getClientOriginalName();
            //     $path = $request->file('ava_url')->store('images/avatars/' . $request->user());
            //     $file->move($path, $ava_name);
            //     File::delete('avatars/' . $player->ava_url);
            // }
            // \dd($path);
            $player->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'address' => $request->address,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'ava_url' => $ava_name,
                'city' => $request->city,
                'province' => $request->province,
                'status' => $request->status
            ]);
            // dd($player);
            // $request->user()->update(
            //     $request->all()
            // );
            return \redirect('profile')->with(['success' => 'Profile updated successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
