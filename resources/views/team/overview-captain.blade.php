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
                                    <img src="{{ asset('images/team_logo/'.$team->logo_url) }}" alt="">
                                </div>
                                <div class="team-overview col-lg-7 col-sm-8">
                                    <h4>{{ $team->name }}</h4>
                                    <div class="overview-button">
                                        <a class="btn btn-primary" href="#" role="button">Request</a>
                                        <a class="btn btn-danger" href="#" role="button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12">
                    <h3>Team Roaster
                        <span>
                            <a href="" class="btn btn-primary pull-right">Edit team</a>
                            <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#inviteFriend">Invite Friend</a>
                        </span>
                    </h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="member">
                    <!-- PANEL NO PADDING -->
                            <div class="member">
                                @forelse ($member as $members)
                                <div class="col-lg-2 col-xs-6 col-lg-offset-1">
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
                    <!-- PANEL HEADLINE -->
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
            <!-- The modal -->
            <div class="modal fade" id="inviteFriend" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header title-friend">
                            <button type="button" class="close btn-friend-close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                            <label for=""> Add Friend </label>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!--Friend List-->
                                <div class="friend-list">
                                    @forelse ($friends as $friend)
                                        <div class="col-xs-12 friend-modal">
                                            <div class="col-xs-3">
                                                @if ($friend->ava_url != null)
                                                    <img class="img-friend" src="{{ asset('images/avatars/'.$friend->ava_url) }}">
                                                @else
                                                    <img class="img-friend" src="{{ asset('images/avatars/default.png') }}">
                                                @endif
                                            </div>
                                            <div class="col-xs-4 friend-modal text-friend">
                                                <h4>{{ $friend->name }}</h4>
                                            </div>
                                            <form action="{{ URL::route('team.friendInvite') }}" method="POST">
                                                @csrf
                                                <div class="col-xs-5 friend-btn">
                                                    <input type="hidden" name="friendId" value="{{ $friend->id }}">
                                                    <input type="hidden" name="teamId" value="{{ $team->id }}">
                                                    <button type="submit" class="btn btn-primary nextBtn pull-right">Add Friend</button>
                                                </div>
                                            </form>
                                        </div>
                                    @empty
                                        <div class="panel-friend not-found" style="color: #fff">
                                            <h4>There are no friend</h4>
                                        </div>
                                    @endforelse
                                </div>
                                <!--End Friend List-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
