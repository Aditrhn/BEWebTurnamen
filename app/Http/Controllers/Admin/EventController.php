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
use File;

use function GuzzleHttp\Promise\all;

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
                'participant' => 'required',
                'start_date' => 'required',
                'description' => 'required',
                // 'banner_url' => 'required',
            ]);

            // $file = $request->file('banner_url');
            // $name_banner = \time() . "_" . $request->file('banner_url')->getClientOriginalName();
            // $tujuan_upload = 'images/events/';
            // $file->move($tujuan_upload, $name_banner);
            $tempevent = TemporaryEvent::create([
                'title' => $request->title,
                'game_id' => $request->game_id,
                // 'banner_url' => $name_banner,
                'participant' => $request->participant,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ]);

            return redirect()->route('temporary-event.edit', [$tempevent->id])->with(['msg' => 'berhasil membuat turnament!!']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    public function updateAndStore(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            if ($request->input('action') == 'save') {
                $tempevent = TemporaryEvent::find($id);
                // \dd($tempevent);
                if (!isset($request->comeback)) {
                    $comeback = "0";
                } else {
                    $comeback = $request->comeback;
                }
                $tempevent->update([
                    'title' => $request->title,
                    'game_id' => $request->game_id,
                    'participant' => $request->participant,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'description' => $request->description,
                    'fee' => $request->fee,
                    'prize_pool' => $request->prize_pool,
                    'rules' => $request->rules,
                    'bracket_type' => $request->bracket_type,
                    'registration_open' => $request->registration_open,
                    'registration_close' => $request->registration_close,
                    'form_message' => $request->form_message,
                    'comeback' => $comeback,
                    'bracket_model' => $request->bracket_model
                ]);
                // dd($tempevent);
                // $tempevent->title = $request->title;
                // $tempevent->game_id = $request->game_id;
                // $tempevent->participant = $request->participant;
                // $tempevent->banner_url = $name_banner;
                // $tempevent->start_date = $request->start_date;
                // $tempevent->end_date = $request->end_date;
                // $tempevent->description = $request->description;
                // $tempevent->fee = $request->fee;
                // $tempevent->prize_pool = $request->prize_pool;
                // $tempevent->rules = $request->rules;
                // $tempevent->bracket_type = $request->bracket_type;
                // $tempevent->registration_open = $request->registration_open;
                // $tempevent->registration_close = $request->registration_close;
                // $tempevent->form_message = $request->form_message;
                // $tempevent->save();
                return redirect()->back()->with(['msg' => 'turnament berhasil diubah!!']); //save and go back to card
            } else if ($request->input('action') == 'publish') {
                // dd($request->all());
                $this->validate($request, [
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
                    'banner_url' => 'required',
                    'bracket_model' => 'required'
                ]);
                $tempevent = TemporaryEvent::find($id);
                // \dd($request->all());
                // $file = $request->file('banner_url');
                // $name_banner = $request->file('banner_url')->getClientOriginalName();
                // $tujuan_upload = 'images/events/';
                // $file->move($tujuan_upload, $name_banner);

                if ($request->hasFile('banner_url')) {
                    $file = $request->file('banner_url');
                    $name_banner = \time() . "_" . $request->file('banner_url')->getClientOriginalName();
                    // \dd($name_banner);
                    $tujuan_upload = 'images/events/';
                    $file->move($tujuan_upload, $name_banner);
                }

                // Event::create([$request->all(), 'banner_url' => $name_banner]);
                // if($request->banner_url == null){
                $event = Event::create([
                    'title' => $tempevent->title,
                    'participant' => $tempevent->participant,
                    'banner_url' => $name_banner,
                    'start_date' => $tempevent->start_date,
                    'end_date' => $tempevent->end_date,
                    'description' => $tempevent->description,
                    'fee' => $request->fee,
                    'prize_pool' => $request->prize_pool,
                    'rules' => $request->rules,
                    'bracket_type' => $request->bracket_type,
                    'registration_open' => $request->registration_open,
                    'registration_close' => $request->registration_close,
                    'form_message' => $request->form_message,
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'game_id' => $tempevent->game_id,
                    'comeback' => $request->comeback,
                    'bracket_model' => $request->bracket_model
                ]);
                // }
                // $event = Event::create([
                //     'title' => $tempevent->title,
                //     'participant' => $tempevent->participant,
                //     'banner_url' => $name_banner,
                //     'start_date' => $tempevent->start_date,
                //     'description' => $tempevent->description,
                //     'fee' => $tempevent->fee,
                //     'prize_pool' => $tempevent->prize_pool,
                //     'rules' => $tempevent->rules,
                //     'bracket_type' => $tempevent->bracket_type,
                //     'registration_open' => $tempevent->registration_open,
                //     'registration_close' => $tempevent->registration_close,
                //     'form_message' => $tempevent->form_message,
                //     'admin_id' => Auth::guard('admin')->user()->id,
                //     'game_id' => $tempevent->game_id,
                // ]);
                TemporaryEvent::destroy($tempevent->id);
                // dd($cek);
                return redirect()->route('event.index', \compact('event'))->with(['msg' => 'Turnament berhasil dipublish!!']);
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
                ->select('events.*', 'games.id as games_id', 'games.name as games_name')->first();
            $events = Event::find($id);
            $fee = number_format($event->fee);
            $prize_pool = number_format($event->prize_pool);

            // $matches = DB::select('SELECT (SELECT t.name FROM teams t WHERE t.id = m.team_a) as team_a,
            // (SELECT t.name FROM teams t WHERE t.id = m.team_b) as team_b, m.id, m.score_a, m.score_b, m.date
            // FROM matches m JOIN events e ON m.event_id = e.id
            // WHERE m.event_id = ' . $id);
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
                    $scores = DB::select('SELECT
                        (SELECT t.name FROM teams t WHERE t.id = m.team_a) as team_a,
                        (SELECT t.name FROM teams t WHERE t.id = m.team_b) as team_b,
                        m.id, m.score_a, m.score_b, m.date
                        FROM matches m
                        JOIN events e
                        ON m.event_id = e.id
                        WHERE m.event_id = ' . $id .
                        ' AND m.round_number = ' . $j .
                        ' AND m.bracket_number = ' . $i .
                        ' ORDER BY m.match_number ASC');
                    $mtch = array();
                    foreach ($scores as $score) {
                        $matchscore = array(
                            'id' => $score->id,
                            'team_a' => $score->team_a,
                            'team_b' => $score->team_b,
                            'score_a' => $score->score_a,
                            'score_b' => $score->score_b,
                            'date' => $score->date
                        );
                        array_push($mtch, $matchscore);
                    }
                    array_push($rounds, $mtch);
                }
                array_push($brackets, $rounds);
            }
            // \dd($brackets[0][0]);

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
            return view('admin.tournament.detail', \compact('count_round', 'event', 'events', 'brackets', 'join', 'join2', 'fee', 'prize_pool'));
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
            // \dd($tempevent);
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
        if (Auth::guard('admin')->check()) {
            // dd(TemporaryEvent::find($id));
            $event = TemporaryEvent::destroy($id);
            // dd($event);
            return \redirect()->route('event.index')->with(['delete' => 'berhasil menghapus data']);
        } else {
            return \redirect('login')->with(['msg' => 'Anda harus login']);
        }
    }
}
