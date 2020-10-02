@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-6 colPanelTeam">
                <!-- PANEL DEFAULT -->
                <a href="{{ URL::route('team-create') }}">
                    <div class="panel-team">
                        <div class="panel-Create">
                            <img class="imgPanelteam" alt="" src="assets/img/Create Team.png">
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
                <!-- PANEL NO CONTROLS -->
                <a href="{{ URL::route('team-search')}}">
                    <div class="panel-team">
                        <div class="panel-Create">
                            <img class="imgPanelteam" alt="" src="assets/img/Search Team.png">
                            <h3>Find Team</h3>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title">Search your favorite team</h3>
                            <h3 class="panel-title">and join with them</h3>
                        </div>
                    </div>
                </a>
                <!-- END PANEL NO CONTROLS -->
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection