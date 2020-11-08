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
            <h3 style="color: grey;">Search Result for: {{ $cari }}</h3>
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
                                            <a href="{{ URL::route('user.profile',$players->id) }}">
                                                <div class="panel-body">
                                                    @if ($players->ava_url != null)
                                                      <img class="img-panel-friend" src="{{ URL::asset('images/avatars/'.$players->ava_url) }}">
                                                    @else
                                                      <img class="img-panel-friend" src="{{ URL::asset('images/avatars/default.png') }}">
                                                    @endif
                                                    <h4 class="panel-friend">{{ $players->name }}</h4>
                                                    <?php 
                                                        $status = DB::table('friends')
                                                            ->select('status')
                                                            ->where([
                                                                ['player_one', '=', $players->id],
                                                                ['player_two', '=', Auth::guard('player')->user()->id]
                                                            ])
                                                            ->orWhere([
                                                                ['player_one', '=', Auth::guard('player')->user()->id],
                                                                ['player_two', '=', $players->id]
                                                            ])->first();
                                                    ?>
                                                    @if ($status != null)
                                                        @if ($status->status == "1")
                                                        <form action="{{ URL::route('unfriend') }}" method="POST">
                                                            @csrf
                                                            <div class="buttons col-md-12 btnAdd">
                                                                <input type="hidden" name="unfriend" value="{{ $players->id }}">
                                                                <button class="btn btn-xs btn-danger" id="btnUnfriend"
                                                                    type="submit">Unfriend</button>
                                                            </div>
                                                        </form>
                                                        @elseif ($status->status == "0")
                                                            <a href="#" type="button" class="btn btn-xs btn-primary">Friend Request Sent</a>
                                                        @endif
                                                    @else
                                                        <form action="{{ URL::route('add-friend') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="buttons col-md-12 btnAdd">
                                                            <input type="hidden" name="id" value="{{ $players->id }}">
                                                            <button class="btn btn-xs btn-primary" id="btnAddfriend"
                                                                type="submit">Add Friend</button>
                                                        </div>
                                                        </form>
                                                    @endif
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
                                                @if ($teams->logo_url != null)
                                                    <img class="img-panel-friend" src="{{ URL::asset('images/team_logo/'.$teams->logo_url) }}">
                                                @else
                                                    <img class="img-panel-friend" src="{{ URL::asset('images/team_logo/default.png') }}">
                                                @endif
                                                <h4 class="panel-friend">{{ $teams->name }}</h4>
                                                <form action="{{ URL::route('team.view',$teams->id) }}"
                                                        method="get">
                                                    @csrf
                                                    <div class="buttons col-md-12 btnAdd">
                                                        <input type="hidden" name="teamId" value="{{ $teams->id }}">
                                                        <button class="btn btn-xs btn-primary" id="btnTeamview"
                                                            type="submit">Team View</button>
                                                    </div>
                                                </form>
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
                                            @forelse ($tournament as $tournaments)
                                            <tr>
                                                <td><img alt="" id="imgGame" src="{{ URL::asset('images/game_icon/'.$tournaments->logo) }}" class="find-image">
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
                                            </tr>
                                            @empty
                                                {{-- <div class="panel-friend thText"> --}}
                                                    <h4>Hasil Tidak Ditemukan.</h4>
                                                {{-- </div> --}}
<<<<<<< Updated upstream
=======
                                            </tr>
>>>>>>> Stashed changes
                                            @endforelse
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
    <!--Footer-->
	@include('layouts.footer')
</div>
<!-- END MAIN -->
@endsection
