@extends('admin.main')
@section('admin-name', 'suwarno')
@section('title','Tournament Create')
@section('main')
<!-- Modal -->
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
                                        data-language="en" data-date-format="yyyy-mm-dd" />
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
                <h3 class="pt-2">{{ $events->title }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="col-md-12" style="background-color: black; text-align: center;">
        <img class="bannerOverview" src="{{ asset('assets/img/ML.png') }}" alt="">
    </div>
    <ul class="nav nav-pills mb-3 padNav" id="pills-tab" role="tablist">
        <li class="nav-item padPills">
            <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab"
                aria-controls="pills-home" aria-selected="true">Overview</a>
        </li>
        <li class="nav-item padPills">
            <a class="nav-link" id="pills-match-tab" data-toggle="pill" href="#pills-match" role="tab"
                aria-controls="pills-match" aria-selected="false">Match</a>
        </li>
        <li class="nav-item padPills">
            <a class="nav-link" id="pills-bracket-tab" data-toggle="pill" href="#pills-bracket" role="tab"
                aria-controls="pills-profile" aria-selected="false">Bracket</a>
        </li>
        <li class="nav-item padPills">
            <a class="nav-link" id="pills-participant-tab" data-toggle="pill" href="#pills-participant" role="tab"
                aria-controls="pills-contact" aria-selected="false">Participants</a>
        </li>
    </ul>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block p-5">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                aria-labelledby="pills-overview-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Tournament Name</label>
                                        <h5>{{ $events->title }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Game</label>
                                        <h5>{{ $events->name }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Fee</label>
                                        <h5>{{ $events->fee }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Prizepool</label>
                                        <h5>{{ $events->prize_pool }}</h5>
                                    </div>
                                </div>

                                <div class="row padRow">
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Registration Opening</label>
                                        <h5>{{ App\Model\Event::getDetailedDate($events->registration_open) }}
                                        </h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Registration Closing</label>
                                        <h5>{{ App\Model\Event::getDetailedDate($events->registration_close) }}
                                        </h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">Start Date</label>
                                        <h5>{{ App\Model\Event::getDetailedDate($events->start_date) }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="labelOverview" for="">End Date</label>
                                        <h5>{{ App\Model\Event::getDetailedDate($events->end_date) }}</h5>
                                    </div>
                                </div>

                                <div class="row padRule">
                                    <div class="col-md-6">
                                        <label class="labelOverview" for="">Rules</label>
                                        <h5>{{ $events->rules }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labelOverview" for="">Term and Agreement</label>
                                        <h5>{{ $events->form_message }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-match" role="tabpanel"
                                aria-labelledby="pills-match-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="titleMatch">Match List</h3>
                                        <a href="{{ URL::route('match.create',$events->id) }}"
                                            class="badge badge-primary">Create</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
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
                                                @foreach($matches as $match)
                                                    <tr>
                                                        <td>
                                                            <h4 class="padMatch">{{ $match->team_a }}</h4>
                                                        </td>
                                                        <td><img id="imgMatch" class="card-img-top imgMatch"
                                                                src="{{ asset('assets/img/navi.png') }}">
                                                        </td>
                                                        <td>
                                                            <h4 class="padMatch">
                                                                @if ($match->score_a && $match->score_b != null)
                                                                    {{$match->score_a}} - {{$match->score_b}}
                                                                @else
                                                                    VS
                                                                @endif
                                                            </h4>
                                                        </td>
                                                        <td><img id="imgMatch" class="card-img-top imgMatch"
                                                                src="{{ asset('assets/img/navi.png') }}">
                                                        </td>
                                                        <td>
                                                            <h4 class="padMatch">{{ $match->team_b }}</h4>
                                                        </td>
                                                        @if($match->date != null)
                                                        <td>
                                                            <h4 class="padMatch">
                                                                {{ $match->date }}
                                                            </h4>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <h4 class="padMatch">
                                                                TBD
                                                            </h4>
                                                        </td>
                                                        @endif
                                                        @if ($match->score_a && $match->score_b != null)
                                                        <td style="padding-top : 25px;">&nbsp;</td>
                                                        @else
                                                        <td style="padding-top : 25px;">
                                                            <a href="{{ URL::route('match.score',$match->id) }}"
                                                                class="btn btn-setScore">Set Score</a>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-bracket" role="tabpanel"
                                aria-labelledby="pills-bracket-tab">
                                <div id="bracket"></div>
                            </div>
                            <div class="tab-pane fade" id="pills-participant" role="tabpanel"
                                aria-labelledby="pills-participant-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="leftSlot" for="">Team ( {{ $join }} /
                                            {{ $events->participant }})</label>
                                    </div>
                                </div>
                                <!--Baris 1-->
                                <div class="row" style="padding-top: 2%; text-align: center;">
                                    @forelse ($join2 as $joins)
                                        <div class="col-md-2">
                                            <div class="card" style="border-radius: 10px;">
                                                <div class="card-img-top" style=" background-color: black;">
                                                    <img id="imgTeam" class="card-img-top imgTeam"
                                                        src="{{ asset('images/team_logo/'. $joins->logo_url) }}"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="card-title">
                                                    <h5 id="teamName" class="card-title titleTeam">
                                                        {{ $joins->name }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h5 style="text-align: center">No participants yet..</h5>
                                    @endforelse
                                </div>
                                <!--Baris 2-->
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bracket.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>
    <script>
        var single = {
            teams: [
                @foreach($matches as $match)
                    ["{{$match->team_a}}", "{{$match->team_b}}"],
                @endforeach
                @if(count($matches) % 2 != 0)
                    [null, null]
                @endif
            ],
            results: [
                [
                    @foreach($rounds as $round)
                    [
                        @foreach($round as $matches)
                            [{{$matches['score_a']}},{{$matches['score_b']}}],
                        @endforeach
                    ],
                    @endforeach
                ]
            ]
        };
        var double = {
            teams : [
            ["Team 1", "Team 2"],
            ["Team 3", "Team 4"]
            ],
            results : [
                [      /* WINNER BRACKET */
                    [
                        [1,2], 
                        [3,4]
                    ]       /* second round */
                ], 
                [              /* LOSER BRACKET */
                    [
                        [7,8]
                    ]   /* second round */
                ]
            ]
        }
        var bracket = {
            teamWidth: 100,
            scoreWidth: 50,
            matchMargin: 75,
            roundMargin: 85,
            @if ($events->bracket_type == '2')
            init: double,
            @elseif($events->bracket_type == '1')
            init:single,
            @endif
            skipConsolationRound: true,
            onMatchClick: onclick
        };

        function onclick() {
            $('#largeModal').modal('show');
            console.log("Hello!");
        }

        $(function () {
            $('#bracket').bracket(bracket)
        })
    </script>
@endpush
