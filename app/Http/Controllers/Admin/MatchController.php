<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Event;
use App\Model\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function create($id)
    {
        $event = Event::find($id);
        // $events = DB::table('events')
        //     ->join('games', 'events.game_id', '=', 'games.id')
        //     ->where('events.id', $id)
        //     ->select('events.*', 'games.*')->first();
        // \dd($event);
        $match = Match::all();
        return \view('admin.match.create', \compact('match', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $event = Event::find($id);
            $join = DB::table('joins');
            \dd($event);

            $this->validate($request, [
                'round_number' => 'required',
                'match_number' => 'required',
                'team_a' => 'required',
                'team_b' => 'required',
            ]);
            Match::create([
                'date' => \now(),
                'event_id' => $event->id,
                'round_number' => $request->round_number,
                'match_number' => $request->match_number,
                'team_a' => $request->team_a,
                'team_b' => $request->team_b,
            ]);
            return \redirect()->back()->with(['msg' => 'Berhasil menambah team matches!!']);
        } else {
            return \redirect('login')->with(['msg' => 'anda harus login!!']);
        }
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
    public function score()
    {
        // $events = Event::get();
        // \dd($events);
        return \view('admin.match.score');
    }
    public function time()
    {
        return \view('admin.match.date');
    }
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
        return \redirect()->back()->with(['msg' => 'waktu dimulai berhasil ditentukan!!']);
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
