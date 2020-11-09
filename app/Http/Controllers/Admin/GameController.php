<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Game;
use File;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $game = Game::orderBy('created_at', 'ASC')->get();
            // return \response()->json($game);
            $test = Game::all();
            $array = \response()->json([
                'status' => \true,
                'message' => 'Data Game',
                'data' => $test
            ]);
            // \dd($array, $game);
            return \view('admin.game.index', \compact('game', 'array'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return \view('admin.game.create');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'name' => 'required',
                'platform' => 'required',
                'icon_url' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('icon_url');
            $name_icon = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/game_icon/';
            $file->move($tujuan_upload, $name_icon);
            // Game::create($request->all());
            Game::create([
                'name' => $request->name,
                'platform' => $request->platform,
                'icon_url' => $name_icon
            ]);
            return \redirect('super/game')->with(['success' => 'Game created successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        // $game = Game::all();
        // $array = \response()->json([

        // ])
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.game.edit', \compact('game'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'name' => 'required',
                'platform' => 'required',
            ]);
            // Game::where('id', $game->id)->update(
            //     [
            //         'name' => $request->name,
            //         'platform' => $request->platform,
            //     ]
            // );
            $game = Game::find($game->id);
            $name_icon = $game->icon_url;
            if ($request->hasFile('icon_url')) {
                $file = $request->file('icon_url');
                $name_icon = \time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'images/game_icon/';
                $file->move($tujuan_upload, $name_icon);
                File::delete('images/game_icon/' . $game->icon_url);
            }
            $game->update([
                'name' => $request->name,
                'platform' => $request->platform,
                'icon_url' => $name_icon
            ]);
            return \redirect('super/game')->with(['success' => 'Game updated successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if (Auth::guard('admin')->check()) {
            Game::destroy($game->id);
            return \redirect()->back()->with(['success' => 'Game deleted successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
