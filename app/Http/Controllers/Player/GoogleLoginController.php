<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function index()
    {
        return \view('welcome');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackPlayer(Request $request)
    {
        $oauthUser = Socialite::driver('google')->user();
        // \dd($oauthUser->id);
        $finduser = Player::where('google_id', $oauthUser->id)
            ->first();
        // \dd($google);
        if ($finduser) {
            \request()->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));
            return \redirect('dashboard'); //redirect to url link dashboard
            // Auth::login($finduser);
            // return redirect('dashboard');
        } else {
            \request()->validate([
                'name' => 'required',
                'email' => 'required|email|unique:players',
                'password' => 'required|min:8',
            ]);
            Player::create([
                'google_id' => $oauthUser->id,
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'password' => \md5($oauthUser->token),
            ]);

            // Auth::login($newUser);
            // \dd($newUser);
            // \dd(Auth::guard('player')->user());
            Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));
            return \redirect('dashboard'); //redirect to url link dashboard

            // Auth::guard('player')->attempt($newUser);
            // return redirect('dashboard');
            // \dd('failed');
            // return Redirect::to("login"); //routing login jika user tidak ada

        }
    }
}
