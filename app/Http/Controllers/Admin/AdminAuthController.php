<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Http\Controllers\Controller;
use App\Model\Game;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminAuthController extends Controller
{
    public function login()
    {
        return \view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('super-dashboard'); //redirect to url link dashboard
        } else {
            return Redirect::to("login"); //routing login jika user tidak ada
        }
    }
    public function createAdmin()
    {
        // return Admin::create([
        //     'name' => 'svperadmin',
        //     'email' => 'svper@mail.com',
        //     'password' => Hash::make('qwerty1234'),
        // ]);
    }
    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            $game = Game::all();
            return \view('admin.game.index', \compact('game'));
        } else {
            // return view('admin.atuh.login'); //view dashboard
            return Redirect::to("login")->withSuccess('Opps! You do not have access'); //routing login
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('super-login'); //routing login
    }
}
