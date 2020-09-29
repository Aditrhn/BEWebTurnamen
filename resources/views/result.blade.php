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
      <h3 style="color: grey;">Search Result for "PUBG"</h3>
      <div class="row">
        <div class="col-md-2" style="padding-top: 2%;">
          <div class="panel panel-headline">
            <div class="panel-body">
              <label for="">Filter</label>
              <ul class="nav nav-pills2 nav-stacked">
                <li ><a data-toggle="pill" href="#player">Player</a></li>
                <li ><a data-toggle="pill" href="#teams">Team</a></li>
                <li ><a data-toggle="pill" href="#tournaments">Tournament</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <!--Konten Pills-->
          <div class="tab-content">
            <!--Players Search-->
            <div id="player" class="tab-pane fade in active">
              <!--Baris 1-->
              <div class="row">
                @forelse ($players as $item)
                  <div class="col-md-3 friend-page">
                    <div class="panel panel-headline panel-friend-detail">
                      <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">{{ $item->name }}</h4>
                        <form action="{{ URL::route('add-friend') }}" method="POST">
                          @csrf
                          <div class="buttons col-md-12 btnAdd">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-xs btn-primary" id="btnAddfriend" type="submit">Add Friend</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                @empty
                <div class="panel-friend not-found">
                  <h4>Hasil Tidak Ditemukan.</h4>
                </div>
              @endforelse
            </div>
            </div>
            <!--End Players Search-->

            <!--Team Search-->
            <div id="teams" class="tab-pane fade">
              <!--Baris 1-->
              <div class="row">
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Odading</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">MangOle</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Rasanya</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Seperti</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Baris 2-->
              <div class="row">
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Anda</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Menjadi</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Iron-men</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Belilah</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Baris 3-->
              <div class="row">
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Odading</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">MangOle</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">Rasanya</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 friend-page">
                  <div class="panel panel-headline panel-friend-detail">
                    <div class="panel-body">
                        <img class="img-panel-friend" src="assets/img/user3.png">
                        <h4 class="panel-friend">AnjayBanget</h4>
                        <div class="buttons col-md-12 btnAdd">
                          <button class="btn btn-xs btn-primary" id="btnTeamview" href="#">Team View</button>
                        </div>
                    </div>
                  </div>
                </div>
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
                      <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                      <td><h4 class="find-text">ML Nongski Tournament</h4></td>
                      <td><h4 class="find-text">August 13, 2020 @3:00 am</h4></td>
                      <td><h4 class="find-text">Free</h4></td>
                      <td><h4 class="find-text">60 Participants</h4></td>
                    </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                        <td><h4 class="find-text">ML Nongski Tournament</h4></td>
                        <td><h4 class="find-text">August 13, 2020 @3:00 am</h4></td>
                        <td><h4 class="find-text">Paid</h4></td>
                        <td><h4 class="find-text">30 Participants</h4></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                        <td><h4 class="find-text">ML Nongski Tournament</h4></td>
                        <td><h4 class="find-text">August 13, 2020 @3:00 am</h4></td>
                        <td><h4 class="find-text">Paid</h4></td>
                        <td><h4 class="find-text">30 Participants</h4></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                        <td><h4 class="find-text">ML Nongski Tournament</h4></td>
                        <td><h4 class="find-text">August 13, 2020 @3:00 am</h4></td>
                        <td><h4 class="find-text">Free</h4></td>
                        <td><h4 class="find-text">60 Participants</h4></td>
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