@extends('admin.main')
@section('admin-name', 'suwarno')
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

<div class="modal fade" id="matchModal" tabindex="-1" role="dialog" aria-labelledby="matchModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="mdlText">Set Date</h3>
            </div>
            <div class="modal-body" style="text-align: center;">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="mdlText">Date</td>
                            <td>
                                <div class="input-group date" id="datetimepicker1">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker-here" name="start_date"
                                        data-language="en" data-date-format="yyyy-mm-dd"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="mdlText">Time</td>
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
          <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
        </li>
        <li class="nav-item padPills">
            <a class="nav-link" id="pills-match-tab" data-toggle="pill" href="#pills-match" role="tab" aria-controls="pills-match" aria-selected="false">Match</a>
        </li>
        <li class="nav-item padPills">
          <a class="nav-link" id="pills-bracket-tab" data-toggle="pill" href="#pills-bracket" role="tab" aria-controls="pills-profile" aria-selected="false">Bracket</a>
        </li>
        <li class="nav-item padPills">
          <a class="nav-link" id="pills-participant-tab" data-toggle="pill" href="#pills-participant" role="tab" aria-controls="pills-contact" aria-selected="false">Participants</a>
        </li>
    </ul>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block p-5">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
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
                            <div class="tab-pane fade" id="pills-match" role="tabpanel" aria-labelledby="pills-match-tab">
                                <div class="row">
                                <div class="col-md-12">
                                    <h3 class="titleMatch">Match List</h3>
                                    <a href="{{ URL::route('match.create') }}" class="badge badge-primary">Create</a>
                                    <h4 class="titleMatch">Round 1</h4>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Match</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Time</th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">0 - 3</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td >
                                                <h4 class="padMatch">May 26, 2020</h4>
                                                <label class="fontMatch" for="">6:30 PM</label>
                                            </td>
                                            <td style="padding-top : 25px;">
                                                <a href="{{ URL::route('match.score') }}" class="btn btn-setScore">Set Score</a>
                                            </td>
                                            </tr>

                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">VS</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td><h4 class="padMatch">TBD</h4></td>
                                            <td style="padding-top : 25px;">
                                                <a href="{{ URL::route('match.time') }}" class="btn btn-setDate">Set Date</a>
                                            </td>
                                            </tr>

                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">VS</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td><h4 class="padMatch">TBD</h4></td>
                                            <td style="padding-top : 25px;"><button type="button" class="btn btn-setDate">Set Date</button></td>
                                            </tr>

                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">VS</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td><h4 class="padMatch">TBD</h4></td>
                                            <td style="padding-top : 25px;"><button type="button" class="btn btn-setDate">Set Date</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <h4 class="titleMatch">Round 2</h4>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Match</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Time</th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">0 - 3</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td >
                                                <h4 class="padMatch">May 26, 2020</h4>
                                                <label class="fontMatch" for="">6:30 PM</label>
                                            </td>
                                            <td style="padding-top : 25px;"><button type="button" class="btn btn-setScore">Set Score</button></td>
                                            </tr>

                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">VS</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td><h4 class="padMatch">TBD</h4></td>
                                            <td style="padding-top : 25px;"><button type="button" class="btn btn-setDate">Set Date</button></td>
                                            </tr>

                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">VS</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td><h4 class="padMatch">TBD</h4></td>
                                            <td style="padding-top : 25px;"><button type="button" class="btn btn-setDate">Set Date</button></td>
                                            </tr>

                                            <tr>
                                            <td><h4 class="padMatch">Secret</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">VS</h4></td>
                                            <td><img id="imgMatch" class="card-img-top imgMatch" src="{{ URL::asset('assets/img/navi.png')}}"></td>
                                            <td><h4 class="padMatch">Navi</h4></td>
                                            <td><h4 class="padMatch">TBD</h4></td>
                                            <td style="padding-top : 25px;"><button type="button" class="btn btn-setDate">Set Date</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-bracket" role="tabpanel" aria-labelledby="pills-bracket-tab">
                                <div id="bracket">ini bracket</div>
                            </div>
                            <div class="tab-pane fade" id="pills-participant" role="tabpanel" aria-labelledby="pills-participant-tab">
                                <div class="row">
                                    <h5 class="leftSlot">Team ( {{ $join }} / {{ $events->participant }})</h5>
                                </div>
                                @forelse ($join2 as $team)
                                <!--Baris 1-->
                                <div class="row" style="padding-top: 2%; text-align: center;">
                                    <div class="col-md-2">
                                        <div class="card" style="border-radius: 10px;">
                                            <div class="card-img-top" style=" background-color: black;">
                                                <img id="imgTeam" class="card-img-top imgTeam" src="{{ asset('images/team_logo/'. $team->logo_url) }}" alt="Card image cap">
                                            </div>
                                            <div class="card-title">
                                              <h5 id="teamName" class="card-title titleTeam">
                                                  {{ $team->name }}
                                              </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p><strong>tidak ada pendaftar!!</strong></p>
                                @endforelse
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
