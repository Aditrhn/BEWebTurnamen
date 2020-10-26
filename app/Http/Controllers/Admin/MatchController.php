<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Join;
use App\Model\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('admin.match.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.match.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'round_number' => 'required',
            'match_number' => 'required',
            'team_a' => 'required',
            'team_b' => 'required',
        ]);
        $join = Join::find($id);
        Match::create([
            'date' => \now(),
            'event_id' => $join,
            'round_number' => $request->round_number,
            'match_number' => $request->match_number,
            'team_a' => $request->team_a,
            'team_b' => $request->team_b,
        ]);
        return \redirect('super/team-matches')->with(['msg' => 'Berhasil menambah team matches!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        return \view('admin.match.edit', \compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function updateDate(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required'
        ]);
        $match = Match::find($id);
        $match->update([
            'date' => $request->date,
            'event_id' => $match->event_id,
            'round_number' => $match->round_number,
            'match_number' => $match->match_number,
            'team_a' => $match->team_a,
            'team_b' => $match->team_b,
            'score_a' => $match->score_a,
            'score_b' => $match->score_b
        ]);
    }
    public function updateScore(Request $request, $id)
    {
        $this->validate($request, [
            'score_a' => 'required',
            'score_b' => 'required'
        ]);
        $match = Match::find($id);
        $match->update([
            'date' => $match->date,
            'event_id' => $match->event_id,
            'round_number' => $match->round_number,
            'match_number' => $match->match_number,
            'team_a' => $match->team_a,
            'team_b' => $match->team_b,
            'score_a' => $request->score_a,
            'score_b' => $request->score_b
        ]);
        return \redirect('super/event')->with(['msg' => 'score berhasil diubah!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
