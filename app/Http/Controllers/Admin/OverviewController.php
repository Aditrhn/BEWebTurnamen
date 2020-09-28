<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Event;
use App\Model\TemporaryEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $event = Event::all();
        // $temporaryEvent = TemporaryEvent::all();
        $total =  Event::count() + TemporaryEvent::count();
        $onGoing = Event::where('status', 1)->count();
        $finished = Event::where('status', 0)->count();
        $draft = TemporaryEvent::count();
        // $status_0 = Event::where('status', 0)->get();
        $status_1 = DB::table('events')
            ->join('games', 'events.game_id', '=', 'games.id')
            ->select('events.title as judul', 'events.participant as jml_peserta', 'events.start_date as tgl_mulai', 'events.bracket_type as mode', 'games.name as nama')->where('events.status', 1)
            ->get();
        // $status_1 = Event::where('status', 1)->get();
        $status_0 = DB::table('events')
            ->join('games', 'events.game_id', '=', 'games.id')
            ->select('events.title as judul', 'events.participant as jml_peserta', 'events.start_date as tgl_mulai', 'events.bracket_type as mode', 'games.name as nama')->where('events.status', 0)
            ->get();
        // \dd($temporaryEvent);
        return \view('admin.overview', \compact('total', 'draft', 'onGoing', 'finished', 'status_0', 'status_1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
