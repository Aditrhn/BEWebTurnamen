<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\Player;
use App\Model\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('player')->check()) {
            $player_id = Auth::guard('player')->user()->id;
            $friendlists = DB::select('select * from friends f join players p on p.id = f.player_one or p.id = player_two
            where not p.id = ' . $player_id . ' and (f.player_one = ' . $player_id . ' or f.player_two = ' . $player_id . ') and f.status = "1"');
            
            $friend_requests = DB::table('friends')
                ->join('players', 'players.id', '=', 'friends.player_one')
                ->select('*')
                ->where([
                    ['friends.status', '=', '0'],
                    ['friends.player_two', '=', $player_id]
                    ])
                ->get();

            return \view('friend.index', \compact('friendlists', 'friend_requests'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function add_friend(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('id')) {

                $check = DB::table('friends')
                    ->select('*')
                    ->where([
                        ['player_one', '=', $request->id],
                        ['player_two', '=', Auth::guard('player')->user()->id]
                        ])
                    ->orWhere([
                        ['player_one', '=', Auth::guard('player')->user()->id],
                        ['player_two', '=', $request->id]
                    ])->first();
                    
                if ($check == null) {
                    if ($request->id != Auth::guard('player')->user()->id) {
                        DB::table('friends')->insert(
                            [
                                'player_one' => Auth::guard('player')->user()->id, 
                                'player_two' => $request->id, 
                                'status' => '0'
                            ]);
                    }
                }

                return redirect()->back();
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function accept_friend(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('accept')) {

                DB::table('friends')
                    ->where([
                        ['player_one', '=', $request->accept],
                        ['player_two', '=', Auth::guard('player')->user()->id]
                        ])
                    ->update(['status' => '1']);

                return redirect()->back();
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function decline_friend(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('decline')) {

                DB::table('friends')
                    ->where([
                        ['player_one', '=', $request->decline],
                        ['player_two', '=', Auth::guard('player')->user()->id]
                        ])
                    ->delete();

                return redirect()->back();
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function unfriend(Request $request)
    {
        if (Auth::guard('player')->check()) {
            if ($request->has('unfriend')) {

                DB::table('friends')
                    ->where([
                        ['player_one', '=', $request->unfriend],
                        ['player_two', '=', Auth::guard('player')->user()->id]
                        ])
                    ->orWhere([
                        ['player_one', '=', Auth::guard('player')->user()->id],
                        ['player_two', '=', $request->unfriend]
                    ])
                    ->delete();

                return redirect()->back();
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
