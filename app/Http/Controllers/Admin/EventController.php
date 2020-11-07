<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Game;
use App\Model\Match;
use App\Model\TemporaryEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Arr;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT events.title as judul,events.participant as peserta,events.start_date as tgl_mulai,games.name as nama FROM `events` JOIN games ON events.game_id=games.id
        // $event = Event::orderBy('created_at', 'ASC')->get();
        if (Auth::guard('admin')->check()) {
            $myEvents = DB::table('events')
                ->join('games', 'events.game_id', '=', 'games.id')
                ->select('events.id as aidi', 'events.title as judul', 'events.participant as peserta', 'events.start_date as tgl_mulai', 'games.name as nama')->get();
            $myTempEvents = DB::table('temporary_events')
                ->join('games', 'temporary_events.game_id', '=', 'games.id')
                ->select('temporary_events.id as aidi', 'temporary_events.title as judul', 'temporary_events.participant as peserta', 'temporary_events.start_date as tgl_mulai', 'games.name as nama')->get();
            // $json_array = \response()->json([
            //     'status'=> \true,
            //     'message'=> ''
            // ])
            return \view('admin.tournament.index', \compact('myEvents', 'myTempEvents'));
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
            $games = Game::orderBy('created_at', 'ASC')->get();
            return \view('admin.tournament.create', \compact('games'));
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
    public function tempStore(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'title' => 'required',
                'game_id' => 'required',
                'banner_url' => 'required',
                'participant' => 'required',
                'start_date' => 'required',
                'description' => 'required'
            ]);
            $file = $request->file('banner_url');
            $name_banner = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/events/';
            $file->move($tujuan_upload, $name_banner);
            // \dd($name_banner);
            $tempevent = TemporaryEvent::create([
                'title' => $request->title,
                'game_id' => $request->game_id,
                'banner_url' => $name_banner,
                'participant' => $request->participant,
                'start_date' => $request->start_date,
                'description' => $request->description,
            ]);
            return redirect()->route('temporary-event.edit', [$tempevent->id]);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    public function updateAndStore(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            if ($request->input('action') == 'save') {
                $tempevent = TemporaryEvent::find($request->id);
                $tempevent->title = $request->title;
                $tempevent->game_id = $request->game_id;
                $tempevent->participant = $request->participant;
                $tempevent->banner_url = $request->banner;
                $tempevent->start_date = $request->start_date;
                $tempevent->end_date = $request->end_date;
                $tempevent->description = $request->description;
                $tempevent->fee = $request->fee;
                $tempevent->prize_pool = $request->prize_pool;
                $tempevent->rules = $request->rules;
                $tempevent->bracket_type = $request->bracket_type;
                $tempevent->registration_open = $request->registration_open;
                $tempevent->registration_close = $request->registration_close;
                $tempevent->form_message = $request->form_message;
                $tempevent->save();
                return back(); //save and go back to card
            } else if ($request->input('action') == 'publish') {
                $request->validate([
                    'title' => 'game_id',
                    'title' => 'required',
                    'participant' => 'required',
                    'start_date' => 'required',
                    'description' => 'required',
                    'fee' => 'required',
                    'prize_pool' => 'required',
                    'rules' => 'required',
                    'bracket_type' => 'required',
                    'registration_open' => 'required',
                    'registration_close' => 'required',
                    'form_message' => 'required',
                ]);

                $file = $request->file('banner');
                $name_icon = \time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'images/events/';
                $file->move($tujuan_upload, $name_icon);

                Event::create([$request->all(), 'banner_url' => $name_icon]);
                TemporaryEvent::destroy($request->id);
                return redirect()->route('event.index');
            }
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guard('admin')->check()) {
            $event = DB::table('events')
                ->join('games', 'events.game_id', '=', 'games.id')
                ->where('events.id', $id)
                ->select('events.*', 'games.id as games_id')->first();
            $events = Event::find($id);
            $fee = number_format($event->fee);
            $prize_pool = number_format($event->prize_pool);

            $matches = DB::select('SELECT (SELECT t.name FROM teams t WHERE t.id = m.team_a) as team_a,
            (SELECT t.name FROM teams t WHERE t.id = m.team_b) as team_b, m.id, m.score_a, m.score_b, m.date
            FROM matches m JOIN events e ON m.event_id = e.id
            WHERE m.event_id = ' . $id);
            // \dd($matches);

            $count_round = DB::table('matches')
                ->where('matches.event_id', $id)
                ->distinct('round_number')
                ->count('round_number');

            $count_bracket = DB::table('matches')
                ->where('matches.event_id', $id)
                ->distinct('bracket_number')
                ->count('bracket_number');

            $brackets = array();
            for ($i = 1; $i <= $count_bracket; $i++) {
                $rounds = array();
                for ($j = 1; $j <= $count_round; $j++) {
                    $scores = DB::table('matches')
                        ->select('round_number', 'match_number', 'score_a', 'score_b')
                        ->where('event_id', $id)
                        ->where('round_number', $j)
                        ->where('bracket_number', $i)
                        ->orderBy('match_number', 'asc')
                        ->get()
                        ->toArray();
                    $mtch = array();
                    foreach ($scores as $score) {
                        $matchscore = array('score_a' => $score->score_a, 'score_b' => $score->score_b);
                        array_push($mtch, $matchscore);
                    }
                    array_push($rounds, $mtch);
                }
                array_push($brackets, $rounds);
            }
            // \dd($brackets);

            $join = DB::table('joins')
                ->join('teams', 'teams.id', '=', 'joins.team_id')
                ->join('events', 'events.id', '=', 'joins.event_id')
                ->where('joins.event_id', $id)
                ->select('joins.*', 'events.*')
                ->count();
            $join2 = DB::table('joins')
                ->join('teams', 'teams.id', '=', 'joins.team_id')
                ->join('events', 'events.id', '=', 'joins.event_id')
                ->where('joins.event_id', $id)
                ->select('joins.team_id', 'teams.*')
                ->get();
            // \dd($join);
            return view('admin.tournament.detail', \compact('count_round', 'matches', 'events', 'brackets', 'join', 'join2', 'fee', 'prize_pool'));
            // return view('admin.tournament.detail');
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporaryEvent $tempevent)
    {
        if (Auth::guard('admin')->check()) {
            $games = Game::orderBy('created_at', 'ASC')->get();
            return view('admin.tournament.edit', \compact('tempevent', 'games'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if (Auth::guard('admin')->check()) {
            Event::where('id', $event->id)->update(
                [
                    'name' => $request->title,
                    'platform' => $request->platform,
                ]
            );

            return \redirect('/game')->with(['success' => 'Game updated successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
