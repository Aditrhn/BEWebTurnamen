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
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackPlayer()
    {

        // jika user masih login lempar ke home
        if (Auth::guard('player')->check()) {
            return redirect('dashboard');
        }
        $oauthUser = Socialite::driver('google')->user();
        $player = Player::where('google_id', $oauthUser->id)->first();
        if ($player) {
            // Auth::loginUsingId($player->id, \true);
            Auth::guard('player')->login($player);
            return redirect('dashboard');
        } else {
            $newUser = Player::create([
                'google_id' => $oauthUser->id,
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'ava_url' => $oauthUser->avatar,
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),
            ]);
            // Auth::login($newUser);
            Auth::guard('player')->login($newUser);
            return redirect('dashboard');
        }
    }
}
