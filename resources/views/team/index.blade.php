@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
        @endif
        <div class="container-fluid">
            <div class="col-md-6 colPanelTeam">
                <!-- PANEL DEFAULT -->
                <a href="{{ URL::route('team-create') }}">
                    <div class="panel-team">
                        <div class="panel-Create">
                            <img class="imgPanelteam" alt="" src="{{ asset('assets/img/Create Team.png') }}">
                            <h3>Create</h3>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title">Create new team and invite</h3>
                            <h3 class="panel-title">your friend to get some fun</h3>
                        </div>
                    </div>
                </a>
                <!-- END PANEL DEFAULT -->
            </div>
            <div class="col-md-6 colPanelTeam">
                <!-- PANEL DEFAULT -->
                <a href="{{ URL::route('team-invitation') }}">
                    <div class="panel-team">
                        <div class="panel-Invitation">
                            <img class="imgPanelteam" alt="" src="{{ asset('assets/img/ICON/teamReq.png') }}">
                            <h3>Team Invitations</h3>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title">You can see the team</h3>
                            <h3 class="panel-title">that invited you to join</h3>
                        </div>
                    </div>
                </a>
                <!-- END PANEL DEFAULT -->
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <!--Footer-->
	@include('layouts.footer')
</div>
<!-- END MAIN -->
@endsection
