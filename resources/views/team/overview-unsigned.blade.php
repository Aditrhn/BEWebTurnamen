@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- PANEL DETAILS -->
            <div class="panel panel-default">
                <div class="col-lg-4 col-xs-12">
                    <!-- PANEL HEADLINE -->
                    <h3>Overview</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="overview">
                            <div class="overview">
                                <div class="col-lg-5 col-sm-4">
                                    @if ($team->logo_url != null)
                                    <img src="{{ asset('images/team_logo/'.$team->logo_url) }}" alt="">
                                    @else
                                    <p>Tidak ada team!!</p>
                                    @endif
                                </div>
                                <div class="team-overview col-lg-7 col-sm-8">
                                    <h3 style="text-align: center">{{$team->name}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12">
                    <h3>Team Roaster
                        <span>
                            <form action="{{ URL::route('team.join') }}" method="POST">
                                @csrf
                                <input type="hidden" name="teamId" value="{{ $team->id }}">
                                <button class="btn btn-primary pull-right" id="btnAddfriend"
                                    type="submit">Join Team</button>
                            </form>
                        </span>
                    </h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="member">
                    <!-- PANEL NO PADDING -->
                            <div class="member">
                                @forelse ($member as $members)
                                <div class="col-lg-2 col-xs-6 col-lg-offset-1" style="margin-left: 17px">
                                    @if ($members->ava_url != null)
                                        <img src="{{ asset('images/avatars/'.$members->ava_url) }}">
                                    @else
                                        <img src="{{ asset('images/avatars/default.png') }}">
                                    @endif
                                    <h4>{{ $members->name }}</h4>
                                    @if ($members->role == 1)
                                        <p>Captain</p>
                                    @else

                                    @endif
                                </div>
                                @empty
                                    <p>There are no member</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL NO PADDING -->
                </div>
                <!-- END PANEL HEADLINE -->
                <div class="col-lg-4 col-xs-12">
                    <h3>Team Info</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="team-static">
                            <div class="team-static">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="team-info-game">
                                        <div class="row">
                                            <h4 class="pull-left col-lg-12">Game Focus</h4>
                                        </div>
                                        <img src="assets/img/ML.png"alt="">
                                        {{-- <img src="{{ asset('images/game_icon/'.$team->icon_url) }}"alt=""> --}}
                                        <h4 style="text-align: center">{{ $team->game_name }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="team-info-support">
                                        <div class="row">
                                            <h4 class="pull-left col-lg-12">Supported</h4>
                                        </div>
                                        <div class="col-lg-6 col-xs-6">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-xs-6">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-xs-6" style="margin-top: 10px;">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-xs-6" style="margin-top: 10px;">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
                <div class="col-lg-8 col-xs-12">
                    <!-- PANEL NO PADDING -->
                    <h3>Description</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="description">
                            <p>{{ $team->description }}</p>
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
            </div>
            <!-- PANEL RULES -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
