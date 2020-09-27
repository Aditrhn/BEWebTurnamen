<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Game;
use App\Model\TemporaryEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
                ->select('events.title as judul', 'events.participant as peserta', 'events.start_date as tgl_mulai', 'games.name as nama')->get();
            $myTempEvents = DB::table('temporary_events')
                ->join('games', 'temporary_events.games_id', '=', 'games.id')
                ->select('temporary_events.id as aidi', 'temporary_events.title as judul', 'temporary_events.participant as peserta', 'temporary_events.start_date as tgl_mulai', 'games.name as nama')->get();
            return \view('admin.tournament.index', \compact('myEvents', 'myTempEvents'));
        }
        return Redirect('login')->with('msg', 'Anda harus login'); //routing login
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::orderBy('created_at', 'ASC')->get();
        return \view('admin.tournament.create', \compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tempStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'games_id' => 'required',
            'participant' => 'required',
            'start_date' => 'required',
            'description' => 'required'
        ]);
        $tempevent = TemporaryEvent::create($request->all());
        return redirect()->route('temporary-event.edit', [$tempevent->id]);
    }

    public function updateAndStore(Request $request)
    {
        if ($request->input('action') == 'save') {
            $tempevent = TemporaryEvent::find($request->id);
            $tempevent->title = $request->title;
            $tempevent->games_id = $request->game;
            $tempevent->participant = $request->participant;
            $tempevent->banner_url = $request->banner;
            $tempevent->start_date = $request->start_date;
            $tempevent->end_date = $request->end_date;
            $tempevent->description = $request->description;
            $tempevent->fee = $request->fee;
            $tempevent->prize_pool = $request->prizepool;
            $tempevent->rules = $request->rules;
            $tempevent->bracket_size = $request->bracket_size;
            $tempevent->bracket_type = $request->bracket_type;
            $tempevent->registration_open = $request->registration_open;
            $tempevent->registration_close = $request->registration_close;
            $tempevent->form_message = $request->form_message;
            $tempevent->save();
            return back(); //save and go back to card
        } else if ($request->input('action') == 'publish') {
            $request->validate([
                'title' => 'required',
                'game' => 'required',
                'participant' => 'required',
                'start_date' => 'required',
                'description' => 'required'
            ]);
            Event::create($request->all());
            return back();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporaryEvent $tempevent)
    {
        $games = Game::orderBy('created_at', 'ASC')->get();
        return view('admin.tournament.edit', \compact('tempevent', 'games'));
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
        Event::where('id', $event->id)->update(
            [
                'name' => $request->title,
                'platform' => $request->platform,
            ]
        );

        return \redirect('/game')->with(['success' => 'Game updated successfully']);
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
