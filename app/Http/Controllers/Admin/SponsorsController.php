<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminSponsor;
use File;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $sponsor = AdminSponsor::orderBy('created_at', 'ASC')->get();
            // return \response()->json($game);
            $test = AdminSponsor::all();
            $array = \response()->json([
                'status' => \true,
                'message' => 'Data Sponsors',
                'data' => $test
            ]);
            // \dd($array, $game);
            return \view('admin.sponsors.index', \compact('sponsor'));
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
            return \view('admin.sponsors.create');
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
    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'name' => 'required',
                'logo_url' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('logo_url');
            $name_icon = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/admin/sponsors/';
            $file->move($tujuan_upload, $name_icon);
            AdminSponsor::create([
                'name' => $request->name,
                'logo_url' => $name_icon
            ]);
            return \redirect('super/sponsors')->with(['success' => 'Sponsors created successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSponsor $sponsor)
    {
        // $game = Game::all();
        // $array = \response()->json([

        // ])
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSponsor $sponsor)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.sponsors.edit', \compact('sponsor'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminSponsor $sponsor)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $sponsor = AdminSponsor::find($sponsor->id);
            $name_icon = $sponsor->logo_url;
            if ($request->hasFile('logo_url')) {
                $file = $request->file('logo_url');
                $name_icon = \time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'images/admin/sponsors/';
                $file->move($tujuan_upload, $name_icon);
                File::delete('images/admin/sponsors/' . $sponsor->icon_url);
            }
            $sponsor->update([
                'name' => $request->name,
                'logo_url' => $name_icon
            ]);
            return \redirect('super/sponsors')->with(['success' => 'Sponsor updated successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSponsor $sponsor)
    {
        if (Auth::guard('admin')->check()) {
            AdminSponsor::destroy($sponsor->id);
            return \redirect()->back()->with(['success' => 'Sponsor deleted successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        } 
    }
}
