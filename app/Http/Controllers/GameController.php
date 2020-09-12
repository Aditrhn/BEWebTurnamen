<?php

namespace App\Http\Controllers;

use App\Model\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game = Game::orderBy('created_at', 'ASC')->get();
        // return \response()->json($game);
        // \dd($game);
        return \view('admin.game.index', \compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $game = new Game;
        // $game->name = $request->name;
        // $game->platform = $request->platform;
        // $game->save();
        $request->validate([
            'name' => 'required',
            'platform' => 'required',
        ]);
        Game::create($request->all());
        return \redirect('/game')->with(['success' => 'Game created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('admin.game.edit', \compact('game'));
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
        Game::where('id', $game->id)->update(
            [
                'name' => $request->name,
                'platform' => $request->platform,
            ]
        );

        return \redirect('/game')->with(['success' => 'Game updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        Game::destroy($game->id);
        return \redirect()->back()->with(['success' => 'Game deleted successfully']);
    }
}
