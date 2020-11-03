<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use Midtrans\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function initPaymentGateway()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-us3a1om9gqkowhGa0aWVX9gU';
        // \env('MIDTRANS_SERVER_KEY')
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
    protected function notifFriend()
    {
        // SELECT * FROM `friends` join players on players.id=friends.player_one WHERE friends.player_one=1
        $friend = DB::table('friends')
            ->join('players', 'players.id', '=', 'friends.player_one')
            ->where('friends.player_one', Auth::guard('player')->user()->id)
            ->get();
            
    }
}
