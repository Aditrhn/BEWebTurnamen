@extends('layouts.main')
@section('main')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-12" style="background-color: #35356C; border-radius: 20px; box-shadow: 7px 7px 10px 2px #22224F ">
                <div class="row">
                <div class="col-xs-6 col-sm-4">
                    @if (Auth::guard('player')->user()->ava_url != null)
                    <img src="{{ asset('images/avatars/'.Auth::guard('player')->user()->ava_url) }}" width="40%" style="margin-top: 5%; margin-bottom: 5%; border-radius: 10px; margin-left: 10%;" alt="Avatar">
                    @else
                    <img src="{{ asset('assets/img/apple-icon.png') }}" width="40%" style="margin-top: 5%; margin-bottom: 5%; border-radius: 10px; margin-left: 10%;">
                    @endif
                </div>
                <div class="col-xs-6 col-sm-4" style="margin-left: -10%; ">
                    <b><h2 style="color: white;">{{ Auth::guard('player')->user()->name }}</h2></b>
                    <br>
                    @if (Auth::guard('player')->user()->address !== null)
                    <p style="color: white;">{{ Auth::guard('player')->user()->address }}</p>
                    @else
                    <p style="color: white;">Somewhere on earth..</p>
                    @endif
                    <br>
                    @if (Auth::guard('player')->user()->contact !== null)
                    <p style="color: white;">{{ Auth::guard('player')->user()->contact }}</p>
                    @else
                    <p style="color: white;"> </p>
                    @endif
                </div>
                <!-- Optional: clear the XS cols if their content doesn't match in height -->
                <div class="col-xs-6 col-sm-4" id="btnaddfriend" style="margin-top: 20px">
                    <a href="{{ URL::route('profile.edit') }}" type="button" class="btn btn-primary pull-right">Edit Profile</a>
                </div>
                </div>
            </div>

        <!--Nav-Pills-->
            <div class="col-md-12">
                <ul class="nav nav-pills marginPils">
                    <li class="active pillsFriend"><a data-toggle="pill" href="#friendList">Tournament</a></li>
                    <li class="pillsRequest"><a data-toggle="pill" href="#menu1" class="pillsFriend">Overview</a></li>
                </ul>
            </div>
        <!--Nav-Pills Konten-->
            <div class="tab-content tabKonten thText">
                <div id="friendList" class="tab-pane fade in active">
                    <div class="col-md-12">
                        <div class="container-fluid" >
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
                                    @forelse ($game as $games)
                                        <tr>
                                            <td>{{ $games->platform }}</td>
                                            <td>{{ $games->name }}</td>
                                            <td>August 13, 2020 @3:00 am</td>
                                            <td>Liquor</td>
                                            <td>164 participants</td>
                                            <td>winner</td>
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

                <div id="menu1" class="tab-pane fade">
                    <div class="col-md-5">
                        <!-- PANEL HEADLINE -->
                        <h4>Bio</h4>
                        <div class="panel panel-headline" id="biopanel" >
                            <div class="panel-body">
                                <div class="row">
                                    @if (Auth::guard('player')->user()->name !== null)
                                    <p>Name <span>{{Auth::guard('player')->user()->name}}</span></p>
                                    @else
                                    <p>No Name</p>
                                    @endif
                                    <br>
                                    @if (Auth::guard('player')->user()->city !== null)
                                    <p>City <span>{{Auth::guard('player')->user()->city}}</span></p>
                                    @else
                                    <p>City <span>in Indonesia</span></p>
                                    @endif
                                    <br>
                                    @if (Auth::guard('player')->user()->gender !== null)
                                    <p>Gender <span>{{Auth::guard('player')->user()->gender}}</span></p>
                                    @else
                                    <p>Gender <span>Unknown</span></p>
                                    @endif
                                    <br>
                                    <p>E-mail <span>{{Auth::guard('player')->user()->email}}</p>
                                    <br>
                                    @if (Auth::guard('player')->user()->contact !== null)
                                    <p>Phone <span>{{Auth::guard('player')->user()->contact}}</span></p>
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
                                            @forelse ($friend as $friends)
                                                @if ($friends->ava_url != null)
                                                <img src="{{ asset('images/avatars/'.$friends->ava_url) }}" alt="{{ $friends->name }}">
                                                @else
                                                <img src="{{ asset('images/avatars/default.png') }}" alt="{{ $friends->name }}">
                                                @endif
                                            @empty
                                            <p style="text-align: justify; opacity: 50%">Making friend soon..</p>
                                            @endforelse
                                            {{-- @foreach ($friend as $item)
                                            <p>{{ $item->name }}</p>
                                            <img src="{{ asset('images/avatars/'.$item->ava_url) }}" >
                                            @endforeach --}}
                                            {{-- <img src="assets/img/user3.png" >
                                            <img src="assets/img/user3.png" >
                                            <img src="assets/img/user3.png" >
                                            <img src="assets/img/user3.png" >
                                            <img src="assets/img/user3.png" >
                                            <img src="assets/img/user3.png" >
                                            <img src="assets/img/user3.png" >
                                            <img src="assets/img/favicon.png" > --}}
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Status</h4>
                                <div class="panel">
                                    <div class="panel-heading padding-top-30 padding-bottom-30">
                                        @if (Auth::guard('player')->user()->status)
                                        <p>{{ Auth::guard('player')->user()->status }}</p>
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
                                <div class="row" >
                                    @forelse ($team as $item)
                                        <div class="col-md-5" id="teampanel" >
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="{{ asset('images/team_logo/'.$item->logo_url) }}">
                                                    <form action="{{ URL::route('team.view',$item->id) }}"
                                                            method="POST">
                                                        @csrf
                                                        <input type="hidden" name="teamId" value="{{ $item->id }}">
                                                        <button class="btn btn-primary" id="btnviewteam"
                                                            type="submit">View Team</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-7">
                                                    <b><h4 style="font-weight: bold;">{{ $item->name }}</h4></b>
                                                    <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">
                                                        {{ $item->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="panel-friend thText">
                                            <h4 style="text-align: justify; opacity: 50%; padding-left: 20px">You haven't join any team yet..</h4>
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
    </div>
<!-- END MAIN CONTENT -->
</div>
@endsection
@push('wizard')
<script src="assets/scripts/wizard-steps.js"></script>
<script>var Conclave = (function () {
  var buArr = [], arlen;
  return {
    init: function () {
      this.addCN(); this.clickReg();
    },
    addCN: function () {
      var buarr = ["holder_bu_center", "holder_bu_awayL1", "holder_bu_awayL2", "holder_bu_awayR1", "holder_bu_awayR2"];
      for (var i = 1; i <= buarr.length; ++i) {
        $("#bu" + i).removeClass().addClass(buarr[i - 1] + " holder_bu");
      }
    },
    clickReg: function () {
      $(".holder_bu").each(function () {
        buArr.push($(this).attr('class'))
      });

      $(".holder_bu").click(function (buid) {
        var me = this, id = this.id || buid, joId = $("#" + id), joCN = joId.attr("class").replace(" holder_bu", "");
        var cpos = buArr.indexOf(joCN), mpos = buArr.indexOf("holder_bu_awayL1");
        if (cpos != mpos) {
          tomove = cpos > mpos ? arlen - cpos + mpos : mpos - cpos;
          while (tomove) {
            var t = buArr.shift();
            buArr.push(t);
            for (var i = 1; i <= arlen; ++i) {
              $("#bu" + i).removeClass().addClass(buArr[i - 1] + " holder_bu");
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

  $("#c1,#c2").click(function(){

    $("#c1,#c2.selectedcategoryServices").removeClass("selectedcategoryServices");
    $(this).addClass('selectedcategoryServices');

  });

</script>
@endpush
