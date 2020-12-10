@extends('layouts.main')
@section('main')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-12"
                style="background-color: #35356C; border-radius: 20px; box-shadow: 7px 7px 10px 2px #22224F ">
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                        @if($player->ava_url !== null)
                            <img src="{{ URL::asset('images/avatars/'.$player->ava_url) }}"
                                width="40%"
                                style="margin-top: 5%; margin-bottom: 5%; border-radius: 10px; margin-left: 10%;"
                                alt="Avatar">
                        @else
                            <img src="{{ asset('images/avatars/default.png') }}" width="40%"
                                style="margin-top: 5%; margin-bottom: 5%; border-radius: 10px; margin-left: 10%;">
                        @endif
                    </div>
                    <div class="col-xs-6 col-sm-4" style="margin-left: -10%; ">
                        <b>
                            <h2 style="color: white;">{{ $player->name }}</h2>
                        </b>
                        <br>
                        @if($player->address !== null)
                            <p style="color: white;">{{ $player->address }}</p>
                        @else
                            <p style="color: white;">Somewhere on earth...</p>
                        @endif
                        <br>
                        @if ($check != null)
                            @if ($check->status == "1")
                                @if($player->contact !== null)
                                <p style="color: white;">{{ $player->contact }}</p>
                                @else
                                    <p style="color: white;">I don't have phone</p>
                                @endif
                            @endif
                        @else
                            <p style="color: white;">I don't have phone</p>
                        @endif
                    </div>
                    <!-- Optional: clear the XS cols if their content doesn't match in height -->
                    <div class="col-xs-6 col-sm-4" id="btnaddfriend" style="margin-top: 20px">
                        @if($check == null)
                            <form action="{{ URL::route('add-friend') }}" method="POST">
                                @csrf
                                <div class="buttons col-md-12 btnAdd">
                                    <input type="hidden" name="id" value="{{ $player->id }}">
                                    <button class="btn btn-primary pull-right" id="btnAddfriend" type="submit">Add
                                        Friend</button>
                                </div>
                            </form>
                        @elseif($checks != null)
                            <a href="#" type="button" class="btn btn-primary pull-right">Friend Request Sent</a>
                        @else
                            <form action="{{ URL::route('unfriend') }}" method="POST">
                                @csrf
                                <div class="buttons col-md-12 btnAdd">
                                    <input type="hidden" name="unfriend" value="{{ $player->id }}">
                                    <button class="btn btn-danger pull-right" id="btnUnfriend"
                                        type="submit">Unfriend</button>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>

            <!--Nav-Pills-->
            <div class="col-md-12">
                <ul class="nav nav-pills marginPils">
                    <li class="active pillsFriend"><a data-toggle="pill" href="#friendList">Overview</a></li>
                    <li class="pillsRequest"><a data-toggle="pill" href="#menu1" class="pillsFriend">Tournament</a></li>
                </ul>
            </div>
            <!--Nav-Pills Konten-->
            <div class="tab-content tabKonten thText">
                <div id="menu1" class="tab-pane fade">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Game</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Team</th>
                                            <th>Participants</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($history as $histories)
                                            <tr>
                                                <td>{{ $histories->game }}</td>
                                                <td>{{ $histories->name }}</td>
                                                <td>{{ $histories->date }}</td>
                                                <td>{{ $histories->team }}</td>
                                                <td>{{ $histories->participant }} </td>
                                                <td>{{ $histories->status }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" style="text-align: center">No matches yet..</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="friendList" class="tab-pane fade in active">
                    <div class="col-md-5">
                        <!-- PANEL HEADLINE -->
                        <h4>Bio</h4>
                        <div class="panel panel-headline" id="biopanel">
                            <div class="panel-body">
                                <div class="row">
                                    @if($player->name !== null)
                                        <p>Name <span>{{ $player->name }}</span></p>
                                    @else
                                        <p>No Name</p>
                                    @endif
                                    <br>
                                    @if($player->city !== null)
                                        <p>City <span>{{ $player->city }}</span></p>
                                    @else
                                        <p>City in <span>Indonesia</span></p>
                                    @endif
                                    <br>
                                    @if($player->gender !== null)
                                        <p>Gender <span>{{ $player->gender }}</span></p>
                                    @else
                                        <p>Gender <span>Unknown</span></p>
                                    @endif
                                    <br>
                                    <p>
                                        E-mail
                                        @if ($check != null)
                                            @if ($check->status == "1")
                                                <span>{{ $player->email }}
                                            @else
                                                <span>n/a</span>
                                            @endif
                                        @else
                                            <span>n/a</span>
                                        @endif
                                    </p>
                                    <br>
                                    @if ($check != null)
                                        @if ($check->status == "1")
                                            @if($player->contact !== null)
                                                <p>Phone <span>{{ $player->contact }}</span></p>
                                            @else
                                                <p>Phone <span>n/a</span></p>
                                            @endif
                                        @else
                                            <p>Phone <span>n/a</span></p>
                                        @endif
                                    @else
                                        <p>Phone <span>n/a</span></p>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- PANEL HEADLINE -->
                    </div>
                    <!-- END PANEL HEADLINE -->
                    <div class="col-md-7">
                        <!-- PANEL NO PADDING -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Friends</h4>
                                <div class="panel">
                                    <div class="panel-heading padding-top-30 padding-bottom-30" id="panelimg">
                                        <center>
                                            <?php $i = 0; ?>
                                            @forelse($friend as $friends)
                                                @if($friends->ava_url != null)
                                                    <a
                                                        @if($friends->id != Auth::guard('player')->user()->id)
                                                            href="{{ URL::route('user.profile',$friends->id) }}"
                                                            title="{{$friends->name}}"
                                                        @else
                                                            href="{{ URL::route('profile') }}"
                                                            title="{{Auth::guard('player')->user()->name}}"
                                                        @endif>>
                                                        <img src="{{ URL::asset('images/avatars/'.$friends->ava_url) }}"
                                                            alt="{{ $friends->name }}" style="margin-bottom: 10px">
                                                    </a>
                                                @else
                                                    <a
                                                        @if($friends->id != Auth::guard('player')->user()->id)
                                                            href="{{ URL::route('user.profile',$friends->id) }}"
                                                            title="{{$friends->name}}"
                                                        @else
                                                            href="{{ URL::route('profile') }}"
                                                            title="{{Auth::guard('player')->user()->name}}"
                                                        @endif>
                                                        <img src="{{ asset('images/avatars/default.png') }}"
                                                            alt="{{ $friends->name }}" style="margin-bottom: 10px">
                                                    </a>
                                                @endif
                                                @if ($i++ == 6)
                                                    <?php break; ?>
                                                @endif
                                            @empty
                                                <p style="text-align: justify; opacity: 50%">Making friend soon..</p>
                                            @endforelse
                                            @if ($friend != null && $count > 7)
                                                <button
                                                    type="button" id="btn-circle-profile" class="btn btn-primary btn-circle btn-lg"
                                                    data-target="#viewfriend" data-toggle="modal" style="margin-bottom: 10px">
                                                    <p style="margin-top: 7px;margin-right: 4px;">+{{$count-($i-1)}}</p>
                                                </button>
                                            @endif
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <!--View Friends-->
                            <div class="modal fade" id="viewfriend" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header title-friend">
                                            <button type="button" class="close btn-friend-close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                                            <label for=""> Friendlists </label>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!--Friend List-->
                                                <div class="friend-list">
                                                    @forelse ($friend as $key => $friends)
                                                        @if ($key < 6)
                                                            <?php continue; ?>
                                                        @endif
                                                        <div class="col-xs-12 friend-modal">
                                                            <div class="col-xs-4">
                                                                @if ($friends->ava_url != null)
                                                                    <img class="img-friend" src="{{ URL::asset('images/avatars/'.$friends->ava_url) }}">
                                                                @else
                                                                    <img class="img-friend" src="{{ URL::asset('images/avatars/default.png') }}">
                                                                @endif
                                                            </div>
                                                            <div class="col-xs-7 friend-modal text-friend">
                                                                <h4>{{ $friends->name }}</h4>
                                                            </div>
                                                            <div class="col-xs-1">
                                                                <?php
                                                                    $friendteam = DB::table('teams')
                                                                        ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
                                                                        ->select('teams.*')
                                                                        ->where('contracts.players_id', '=', $friends->id)
                                                                        ->first();
                                                                ?>
                                                                <form action="{{ URL::route('user.profile',$friends->id) }}" method="get">
                                                                    @csrf
                                                                    <div class="col-xs-5 friend-btn">
                                                                        <input type="hidden" name="friendId" value="{{ $friends->id }}">
                                                                        {{-- <input type="hidden" name="teamId" value="{{ $friendteam->id }}"> --}}
                                                                        <button type="submit" class="btn btn-primary nextBtn pull-right">View Profile</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="panel-friend not-found" style="color: #fff">
                                                            <h4>There are no friend</h4>
                                                        </div>
                                                    @endforelse
                                                </div>
                                                <!--End Friend List-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4>Status</h4>
                                <div class="panel">
                                    <div class="panel-heading padding-top-30 padding-bottom-30">
                                        @if($player->status)
                                            <p>{{ $player->status }}</p>
                                        @else
                                            <p style="text-align: justify; opacity: 50%">I'm too lazy to write status..</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PANEL NO PADDING -->
                        <!-- PANEL NO PADDING -->
                        <h4>Teams</h4>
                        <div class="panel">
                            <div class="panel-heading padding-top-30 padding-bottom-30">
                                <div class="row">
                                    @forelse($team as $item)
                                    <center>
                                        <div class="col-md-5" id="teampanel">
                                            <div class="col-md-12" style="margin-left: -5px;">
                                                @if ($item->logo_url != null)
                                                    <img id="team-profile" src="{{ URL::asset('images/team_logo/'.$item->logo_url) }}">
                                                @else
                                                    <img id="team-profile" src="{{ URL::asset('images/team_logo/default.png') }}">
                                                @endif
                                                <b><h4 style="font-weight: bold;">{{ $item->name }}</h4></b>
                                                <p id="descprofile">{{ $item->description }}</p>
                                                <form action="{{ URL::route('team.view',$item->id) }}"
                                                        method="get">
                                                    @csrf
                                                    <input type="hidden" name="teamId" value="{{ $item->id }}">
                                                    <button class="btn btn-primary" id="btnviewteam"
                                                        type="submit">View Team</button>
                                                </form>
                                            </div>
                                        </div>
                                    </center>
                                    @empty
                                        <div class="panel-friend thText">
                                            <h4 style="text-align: justify; opacity: 50%; padding-left: 20px">Haven't join any team yet..</h4>
                                        </div>
                                    @endforelse
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <!-- END PANEL NO PADDING -->
                    </div>
                </div>
            </div>
            <!--End Konten Pills-->
        </div>
        <!--Footer-->
		@include('layouts.footer')
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection
@push('wizard')
    <script src="assets/scripts/wizard-steps.js"></script>
    <script>
        var Conclave = (function () {
            var buArr = [],
                arlen;
            return {
                init: function () {
                    this.addCN();
                    this.clickReg();
                },
                addCN: function () {
                    var buarr = ["holder_bu_center", "holder_bu_awayL1", "holder_bu_awayL2",
                        "holder_bu_awayR1", "holder_bu_awayR2"
                    ];
                    for (var i = 1; i <= buarr.length; ++i) {
                        $("#bu" + i).removeClass().addClass(buarr[i - 1] + " holder_bu");
                    }
                },
                clickReg: function () {
                    $(".holder_bu").each(function () {
                        buArr.push($(this).attr('class'))
                    });

                    $(".holder_bu").click(function (buid) {
                        var me = this,
                            id = this.id || buid,
                            joId = $("#" + id),
                            joCN = joId.attr("class").replace(" holder_bu", "");
                        var cpos = buArr.indexOf(joCN),
                            mpos = buArr.indexOf("holder_bu_awayL1");
                        if (cpos != mpos) {
                            tomove = cpos > mpos ? arlen - cpos + mpos : mpos - cpos;
                            while (tomove) {
                                var t = buArr.shift();
                                buArr.push(t);
                                for (var i = 1; i <= arlen; ++i) {
                                    $("#bu" + i).removeClass().addClass(buArr[i - 1] +
                                        " holder_bu");
                                }
                                --tomove;
                            }
                        }
                    })
                },
                auto: function () {
                    for (i = 1; i <= 1; ++i) {
                        $(".holder_bu").delay(4000).trigger('click', "bu" + i).delay(4000);
                        console.log("called");
                    }
                }
            };
        })();

        $(document).ready(function () {
            window['conclave'] = Conclave;
            Conclave.init();
        });

        $("#c1,#c2").click(function () {

            $("#c1,#c2.selectedcategoryServices").removeClass("selectedcategoryServices");
            $(this).addClass('selectedcategoryServices');

        });

    </script>
@endpush
