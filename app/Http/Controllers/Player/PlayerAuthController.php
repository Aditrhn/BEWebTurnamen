<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
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

class PlayerAuthController extends Controller
{
    public function index()
    {
        // $player = Player::select('name', 'contact')->get();
        // \dd($player);
        return \view('player.auth.login'); //view login
        // return \view('player');
        // return \response()->json($player);
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
            return view('player.dashboard'); //view dashboard
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access'); //routing login
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
            // $game = DB::table('players')->get();

            // \dd($game);
            return \view('player.profile', \compact('game'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
