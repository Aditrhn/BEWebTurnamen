@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="col-md-5" style="color: white; padding-left: 60px;">
        <h3>Overview</h3>
        <div class="panel-myteam">
          <img src="{{ asset('assets/img/favicon.png') }}" style="padding-top: 30px; padding-left: 15px;">
        </div>
      </div>
      <div class="col-md-7" style="color: white; padding-left: 60px;">
        <h3>Member</h3>
        <div class="panel-team-member">
          <div class="panel-heading padding-top-30 padding-bottom-30">
            <center>
            <img src="{{ asset('assets/img/user3.png') }}" width="15%"  style="border-radius: 20px; align-items: center; ">
            <img src="{{ asset('assets/img/user3.png') }}" width="15%"  style="border-radius: 20px; align-items: center; ">
            <img src="{{ asset('assets/img/user3.png') }}" width="15%"  style="border-radius: 20px; align-items: center; ">
            <img src="{{ asset('assets/img/user3.png') }}" width="15%"  style="border-radius: 20px; align-items: center; ">
            <img src="{{ asset('assets/img/user3.png') }}" width="15%"  style="border-radius: 20px; align-items: center;">
            </center>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="col-md-5" style="color: white; padding-left: 60px;">
        <h3>Team Static</h3>
        <div class="panel-statistic">
        
        </div>
      </div>
      <div class="col-md-7" style="color: white; padding-left: 60px;">
        <h3>Description</h3>
        <div class="panel-description">
          
        </div>
      </div>
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
@endsection