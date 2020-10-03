@extends('admin.main')
@section('title','Tournament Create')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">{{$events->title}}</h3>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="col-md-12" style="background-color: black; text-align: center;">
        <img class="bannerOverview" src="{{URL::asset('assets/img/ML.png')}}" alt="" >
    </div>
    <ul class="nav nav-pills mb-3 padNav" id="pills-tab" role="tablist">
        <li class="nav-item padPills">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
        </li>
        <li class="nav-item padPills">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-bracket" role="tab" aria-controls="pills-profile" aria-selected="false">Bracket</a>
        </li>
        <li class="nav-item padPills">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-partisipan" role="tab" aria-controls="pills-contact" aria-selected="false">Participants</a>
        </li>
    </ul>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block p-5">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Tournament Name</label>
                                        <h5>Nongski Tournament</h5>
                                    </div>
                                    <div class="col-md-3">
                                      <label class="labelOverview" for="">Game</label>
                                      <h5>Mobile Legend</h5>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="labelOverview" for="">Fee</label>
                                    <h5>Rp. 100.000</h5>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="labelOverview" for="">Prizepool</label>
                                    <h5>Rp. 1.000.000</h5>
                                 </div>
                                </div>
            
                                <div class="row padRow">
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Registration Opening</label>
                                        <h5>YY / MM / DD</h5>
                                    </div>
                                    <div class="col-md-3">
                                      <label class="labelOverview" for="">Registration Closing</label>
                                      <h5>YY / MM / DD</h5>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="labelOverview" for="">Start Date</label>
                                    <h5>YY / MM / DD</h5>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="labelOverview" for="">End Date</label>
                                    <h5>YY / MM / DD</h5>
                                 </div>
                                </div>
            
                                <div class="row padRule">
                                    <div class="col-md-6">
                                        <label class="labelOverview" for="">Rules</label>
                                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            Why do we use it?
                                            
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            </h5>
                                    </div>
                                    <div class="col-md-6">
                                      <label class="labelOverview" for="">Term and Agreement</label>
                                      <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        Why do we use it?
                                        
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-bracket" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div id="bracket"></div>
                            </div>
                            <div class="tab-pane fade" id="pills-partisipan" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="row">
                                    <h5 class="leftSlot">Team ( 30 / 30 )</h5>
                                </div>
                                <!--Baris 1-->
                                <div class="row" style="padding-top: 2%; text-align: center;">
                                    <div class="col-md-2">
                                        <div class="card" style="border-radius: 10px;">
                                            <div class="card-img-top" style=" background-color: black;">
                                                <img id="imgTeam" class="card-img-top imgTeam" src="{{ URL::asset('assets/img/ML.png')}}" alt="Card image cap">
                                            </div>
                                            <div class="card-title">
                                              <h5 id="teamName" class="card-title titleTeam">
                                                  Ole Team
                                              </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
@push('tooltip')
    <!-- Date Picker -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.bracket.min.js') }}"></script>
    <script>
        var minimalData = {
            teams: [
                // ["Team 1", "Team 2"],
                // ["Team 3", "Team 4"],
                // ["Team 5", "Team 6"],
                // ["Team 7", "Team 8"]
                @foreach($matches as $match)
                    ["{{$match->team_a}}", "{{$match->team_b}}"],
                @endforeach
                @if(count($matches) % 2 != 0)
                    [null, null] 
                @endif
            ],
            results: [
                [
                    @foreach($matches as $match)
                        [{{$match->score_a}}, {{$match->score_b}}],
                    @endforeach
                ],
                [
                    [1,2],
                    [0,3]
                ]
            ]
        }
        var resizeParameters = {
            teamWidth: 100,
            scoreWidth: 50,
            matchMargin: 75,
            roundMargin: 85,
            init: minimalData,
            skipConsolationRound: true,
            onMatchClick: onclick
        };

        function onclick() {
            console.log("Hello!"); 
        }

        $(function () {
            $('#bracket').bracket(resizeParameters)
        })
    </script>
    <script src="assets/js/main.js"></script>
@endpush
