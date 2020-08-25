@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
        <div class="col-md-6" style="top: 100px; margin-top: 10px;">
          <!-- PANEL DEFAULT -->
          <a href="{{ URL::route('team.create') }}">
            <div class="panel-team">
              <div class="panel-heading" style="padding-top: 20px;">
                <img alt="" src="{{ asset('assets/img/Create Team.png') }}">
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
        <div class="col-md-6" style="top: 100px; margin-top: 10px;">
          <!-- PANEL NO CONTROLS -->
          <a href="{{ URL::route('team.find') }}">
            <div class="panel-team">
              <div class="panel-heading" style="padding-top: 20px;">
                <img alt="" src="{{ asset('assets/img/Search Team.png') }}">
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
@endsection