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
        $player_id = Auth::guard('player')->user()->id;
        // $friendlists = DB::select('select * from friends f join players p on p.id = f.player_two where f.status = ?', ["1"]);
        $friendlists = DB::select('select * from friends f join players p on p.id = f.player_one or p.id = player_two 
        where not p.id = '.$player_id.' and (f.player_one = '.$player_id.' or f.player_two = '.$player_id.') and f.status = "1"');
        $friend_requests = DB::select('select * from friends f join players p on p.id = f.player_one where f.status = ? and f.player_two = ?', ["0",$player_id]);

        return \view('friend.index', \compact('friendlists','friend_requests'));
    }
    public function add_friend(Request $request)
    {
        if ($request->has('id')) {

            $player_id = Auth::guard('player')->user()->id;
            $friend_id = $request->id;

            $friend = DB::insert('insert into friends (player_one, player_two, status) values ('.$player_id.', '.$friend_id.', "0")');

            return redirect()->back();
        }
    }
    public function accept_friend(Request $request)
    {
        if($request->has('accept')) {
            $player_id = Auth::guard('player')->user()->id;
            $friend_id = $request->accept;

            $accept_friend = DB::update('update friends set status = "1" where player_one = '.$friend_id.' and player_two = '.$player_id);

            return redirect()->back();
        }
    }
    public function decline_friend(Request $request){
        if ($request->has('decline')) {

            $player_id = Auth::guard('player')->user()->id;
            $friend_id = $request->decline;

            $decline_friends = DB::delete('delete from friends where player_one = '.$friend_id.' and player_two = '.$player_id);

            return redirect()->back();
        }
    }
    public function unfriend(Request $request){
        if ($request->has('unfriend')) {

            $player_id = Auth::guard('player')->user()->id;
            $friend_id = $request->unfriend;

            $unfriends = DB::delete('delete from friends where player_one = '.$friend_id.' and player_two = '.$player_id);

            return redirect()->back();
        }
    }
}
