@extends('layouts.main')
@section('asset-toastr')
<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
@endsection
@section('main')
<!-- MAIN -->
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 style="color: grey;">Search Result for "{{ $cari }}"</h3>
            <div class="row">
                <div class="col-md-2" style="padding-top: 2%;">
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            <label for="">Filter</label>
                            <ul class="nav nav-pills2 nav-stacked">
                                <li><a data-toggle="pill" href="#player">Player</a></li>
                                <li><a data-toggle="pill" href="#teams">Team</a></li>
                                <li><a data-toggle="pill" href="#tournaments">Tournament</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <!--Konten Pills-->
                    <div class="tab-content">
                        <!--Players Search-->
                        <div id="player" class="tab-pane fade in active">
                            <div class="row">
                                @forelse($player as $players)
                                    <div class="col-md-3 friend-page">
                                        <div class="panel panel-headline panel-friend-detail">
                                            <a href="{{ URL::route('user-profile') }}">
                                                <div class="panel-body">
                                                    <img class="img-panel-friend" src="{{ asset('images/avatars/'.$players->ava_url) }}">
                                                    <h4 class="panel-friend">{{ $players->name }}</h4>
                                                    <form action="{{ URL::route('add-friend') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="buttons col-md-12 btnAdd">
                                                            <input type="hidden" name="id" value="{{ $players->id }}">
                                                            <button class="btn btn-xs btn-primary" id="btnAddfriend"
                                                                type="submit">Add Friend</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="panel-friend thText">
                                        <h4>Hasil Tidak Ditemukan.</h4>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <!--End Players Search-->

                        <!--Team Search-->
                        <div id="teams" class="tab-pane fade">
                            <div class="row">
                                @forelse($team as $teams)
                                    <div class="col-md-3 friend-page">
                                        <div class="panel panel-headline panel-friend-detail">
                                            <div class="panel-body">
                                                <img class="img-panel-friend"
                                                    src="{{ asset('images/team_logo/'.$teams->logo_url) }}">
                                                <h4 class="panel-friend">{{ $teams->name }}</h4>
                                                <div class="buttons col-md-12 btnAdd">
                                                    <a class="btn btn-xs btn-primary" id="btnTeamview" href="{{ URL::route('team.overview',$teams->id) }}">Team View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="panel-friend thText">
                                        <h4>Hasil Tidak Ditemukan.</h4>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <!--End Team Search-->

                        <!--Tournament Search-->
                        <div id="tournaments" class="tab-pane fade">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr class="thText">
                                                <th class="thTitle">Game</th>
                                                <th class="thTitle">Name</th>
                                                <th class="thTitle">Date</th>
                                                <th class="thTitle">Fee</th>
                                                <th class="thTitle">Participants</th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                @forelse ($tournament as $tournaments)
                                                <td><img alt="" id="imgGame" src="{{ asset('images/game_icon/'.$tournaments->logo) }}" class="find-image">
                                                </td>
                                                <td>
                                                    <h4 class="find-text">{{ $tournaments->name }}</h4>
                                                </td>
                                                <td>
                                                    <h4 class="find-text">{{ \Carbon\Carbon::parse($tournaments->date)->translatedFormat('M d, Y h:i')  }}</h4>
                                                    {{-- <h4 class="find-text">August 13, 2020 @3:00 am</h4> --}}
                                                </td>
                                                <td>
                                                    <h4 class="find-text">{{ $tournaments->fee }}</h4>
                                                </td>
                                                <td>
                                                    <h4 class="find-text">{{ $tournaments->participants }} Participants</h4>
                                                </td>
                                                @empty
                                                {{-- <div class="panel-friend thText"> --}}
                                                    <h4>Hasil Tidak Ditemukan.</h4>
                                                {{-- </div> --}}
                                                @endforelse
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!--End Tournament Search-->
                        </div>
                        <!--End Konten Pills-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
</div>
<!-- END MAIN -->
@endsection
