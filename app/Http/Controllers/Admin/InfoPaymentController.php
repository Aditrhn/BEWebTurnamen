<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Join;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT players.name,joins.*,teams.id,events.id,events.title, contracts.teams_id FROM `joins` join teams on teams.id=joins.team_id JOIN events on events.id=joins.event_id JOIN contracts on teams.id=contracts.teams_id JOIN players on  players.id=contracts.players_id
        $info = DB::table('joins')
            ->join('teams', 'teams.id', '=', 'joins.team_id')
            ->join('events', 'events.id', '=', 'joins.event_id')
            ->join('contracts', 'teams.id', '=', 'contracts.teams_id')
            ->join('players', 'players.id', 'contracts.players_id')
            ->select('players.name as nama', 'players.email as mail', 'teams.name as nama_team', 'events.title as nama_turney', 'joins.team_id', 'joins.event_id', 'joins.status as info_pembayaran', 'joins.join_date', 'joins.payment_due', 'joins.gross_amount', 'joins.cancellation_note', 'joins.id')
            ->orderBy('join_date', 'DESC')
            ->paginate(10);
        // \dd($info);
        return \view('admin.info-payment.index', \compact('info'));
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
    public function update(Request $request, Join $join)
    {
        Join::where('id', $join->id)
            ->update([
                'team_id' => $request->team_id,
                'event_id' => $request->event_id,
                'status' => $request->status,
                'join_date' => $request->join_date,
                'payment_due' => $request->payment_due,
                'gross_amount' => $request->gross_amount,
                'cancellation_note' => $request->cancellation_note
            ]);
        return \redirect()->back()->with(['msg' => 'status pembayaran diubah!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Join $join)
    {
        Join::destroy($join->id);
        return \redirect()->back()->with(['msg' => 'Berhasil menghapus pembayaran!!']);
    }
}
