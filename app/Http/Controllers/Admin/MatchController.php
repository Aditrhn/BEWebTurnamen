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
        if (Auth::guard('admin')->check()) {
            return \view('admin.match.index');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Auth::guard('admin')->check()) {
            $event = Event::find($id);
            #SELECT * FROM `joins` join teams on teams.id=joins.team_id join events on events.id=joins.event_id WHERE joins.status=1
            // \dd($event);
            $team = DB::table('joins')
                ->join('teams', 'teams.id', '=', 'joins.team_id')
                ->join('events', 'events.id', '=', 'joins.event_id')
                ->where('joins.status', '1')
                ->where('events.id', $event->id)
                ->select('teams.*', 'joins.status', 'events.id as id_events')
                ->get();
            // \dd($team);
            // $match = Match::all();
            // $match = DB::table('matches')
            //     // ->join('joins', 'joins.id', 'matches.')
            //     ->join('events', 'events.id', '=', 'matches.event_id')
            //     // ->join('teams', 'teams.id', '=', 'events.team_id')
            //     ->where('events.id', $event->id)
            //     ->select('matches.*')
            //     ->get();
            #SELECT (SELECT (SELECT t.name FROM teams t WHERE t.id = m.team_a) as team_a,(SELECT t.name FROM teams t WHERE t.id = m.team_b) as team_b, m.score_a, m.score_b, m.date,m.round_number,m.match_number FROM matches m JOIN events e ON m.event_id = e.id WHERE m.event_id = ' . $event->id . ' AND m.round_number = 1 ORDER BY `m`.`match_number` ASC
            $match = DB::select('SELECT (SELECT t.name FROM teams t WHERE t.id = m.team_a) as team_a,(SELECT t.name FROM teams t WHERE t.id = m.team_b) as team_b, m.score_a, m.score_b, m.date, m.round_number, m.match_number FROM matches m JOIN events e ON m.event_id = e.id WHERE m.event_id = ' . $event->id . ' ORDER BY `m`.`round_number` ASC');
            // $cek = $match->paginate(2);
            // \dd($match);
            return \view('admin.match.create', \compact('match', 'event', 'team'));
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
    public function store(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $event = Event::find($id);
            $join = DB::table('joins')
                ->join('events', 'events.id', 'joins.event_id')
                ->where('events.id', $event->id)
                ->where('joins.status', '1')
                ->select('joins.*', 'events.id')->get();
            // \dd($join);

            $this->validate($request, [
                'round_number' => 'required',
                'date' => 'required',
                'team_a' => 'required',
                'team_b' => 'required',
            ]);
            Match::create([
                'event_id' => $event->id,
                'round_number' => $request->round_number,
                'date' => $request->date,
                'team_a' => $request->team_a,
                'team_b' => $request->team_b
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
    public function score($id)
    {
        if (Auth::guard('admin')->check()) {
            $matches = DB::select('SELECT (SELECT t.name FROM teams t WHERE t.id = m.team_a) as team_a,
            (SELECT t.name FROM teams t WHERE t.id = m.team_b) as team_b, m.id
            FROM matches m JOIN events e ON m.event_id = e.id
            WHERE m.id = ' . $id);
            // \dd($matches);
            return \view('admin.match.score', \compact('matches'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
    public function time($id)
    {
        if (Auth::guard('admin')->check()) {
            $matches = Match::find($id);
            return \view('admin.match.date', \compact('matches'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
    public function edit(Match $match)
    {
        if (Auth::guard('admin')->check()) {
            return \view('admin.match.edit', \compact('match'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
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
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'date' => 'required'
            ]);
            $match = Match::find($id);
            dd($match);
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
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
    public function updateScore(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
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
            return \redirect()->back()->with(['msg' => 'score berhasil diubah!!']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
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
