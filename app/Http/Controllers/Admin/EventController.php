<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Game;
use App\Model\TemporaryEvent;
use Illuminate\Support\Facades\Input as Input;

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
        $event = Event::orderBy('created_at', 'ASC')->get();
        return \view('admin.tournament.index', \compact('event'));
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
        return redirect()->route('temporary-event.edit',[$tempevent->id]);
    }

    public function store(Request $request)
    {
        if(Input::get('save')) {
            $tempevent = TemporaryEvent::find($request->id);
            $tempevent->name = $request->title;
            $tempevent->game_id = $request->game;
            $tempevent->participant = $request->participant;
            $tempevent->banner_url = $request->banner;
            $tempevent->start_date = $request->start_date;
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
        }else if(Input::get('publish')){
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
        return view('admin.tournament.edit', \compact('tempevent','games'));
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
