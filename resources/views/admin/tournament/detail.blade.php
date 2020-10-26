@extends('admin.main')
@section('title','Tournament Create')
@section('main')
<!-- Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="mdlText">Report Score</h3>
            </div>
            <div class="modal-body" style="text-align: center;">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Score</th>    
                        </tr>
                      </thead>
                    <tbody>
                      <tr>
                        <td class="mdlText">Cimindi</td>
                        <td>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="mdlText">Yudistira</td>
                        <td>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-block btn-primary">Submit Score</button>
            </div>
        </div>
    </div>
</div>
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
                                        <h5>{{$events->title}}</h5>
                                    </div>
                                    <div class="col-md-3">
                                      <label class="labelOverview" for="">Game</label>
                                    <h5>{{$events->name}}</h5>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="labelOverview" for="">Fee</label>
                                    <h5>{{$events->fee}}</h5>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="labelOverview" for="">Prizepool</label>
                                    <h5>{{$events->prize_pool}}</h5>
                                 </div>
                                </div>
            
                                <div class="row padRow">
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Registration Opening</label>
                                        <h5>{{App\Model\Event::getDetailedDate($events->registration_open)}}</h5>
                                    </div>
                                    <div class="col-md-3">
                                      <label class="labelOverview" for="">Registration Closing</label>
                                      <h5>{{App\Model\Event::getDetailedDate($events->registration_close)}}</h5>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="labelOverview" for="">Start Date</label>
                                    <h5>{{App\Model\Event::getDetailedDate($events->start_date)}}</h5>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="labelOverview" for="">End Date</label>
                                    <h5>{{App\Model\Event::getDetailedDate($events->end_date)}}</h5>
                                 </div>
                                </div>
            
                                <div class="row padRule">
                                    <div class="col-md-6">
                                        <label class="labelOverview" for="">Rules</label>
                                        <h5>{{$events->rules}}</h5>
                                    </div>
                                    <div class="col-md-6">
                                      <label class="labelOverview" for="">Term and Agreement</label>
                                      <h5>{{$events->form_message}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-bracket" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div id="bracket">ini bracket</div>
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
    <script src="assets/js/main.js"></script>
@endpush
