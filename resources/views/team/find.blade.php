@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="panel panel-default" style="background-color: transparent; border: none;">
      <div id="collapseTwo" class="panel-collapse collapse in">
        <div class="container-fluid" >
          <div class="row">
            <div class="col-md-12">
              <div class="panel-find-dropdown pull-right">
                <h4 style="padding-top: 18px;">Clear Filter</h4>
              </div>
              <div class="panel-find-dropdown pull-right">
                <h4>Registration</h4>
                <div class="dropdown">
                  <button class="btn-find-dropdown dropdown-toggle" type="button" data-toggle="dropdown">All
                  <span class="glyphicon glyphicon-triangle-bottom"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div> 
              </div>
              <div class="panel-find-dropdown pull-right">
                <h4>Game</h4>
                <div class="dropdown">
                  <button class="btn-find-dropdown dropdown-toggle" type="button" data-toggle="dropdown">All
                  <span class="glyphicon glyphicon-triangle-bottom"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div> 
              </div>
            </div>
          </div>
          
          <div class="table-responsive" style="background-color: #35346c; border-radius: 20px;">          
          <table class="table" style="background-color: transparent;">
            <thead>
            <tr>
              <th style="padding-left: 40px;">Game</th>
              <th>Team</th>
              <th></th>
              <th>Member</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">ML Nongski Tournament</td>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">Liquor</td>
              <td style="padding-top: 30px;">164 participants</td>
            </tr>
            <tr>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">ML Nongski Tournament</td>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">Liquor</td>
              <td style="padding-top: 30px;">164 participants</td>
            </tr>
            <tr>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">ML Nongski Tournament</td>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">Liquor</td>
              <td style="padding-top: 30px;">164 participants</td>
            </tr>
            <tr>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">ML Nongski Tournament</td>
              <td><img alt="" src="{{ asset('assets/img/ML.png') }}"  style="width: 80px; height: 80px;"></td>
              <td style="padding-top: 30px;">Liquor</td>
              <td style="padding-top: 30px;">164 participants</td>
            </tr>
            </tbody>
          </table>
          </div>
          </div>
      </div>
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
@endsection