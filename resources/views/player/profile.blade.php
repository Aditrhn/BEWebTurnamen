@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="col-md-12" style="background-color: #35356C; border-radius: 20px; box-shadow: 7px 7px 10px 2px #22224F ">
        <div class="row">
          <div class="col-xs-6 col-sm-4"><img src="{{ asset('assets/img/apple-icon.png') }}" width="40%" style="margin-top: 5%; margin-bottom: 5%; border-radius: 10px; margin-left: 10%;"></div>
          <div class="col-xs-6 col-sm-4" style="margin-left: -10%; ">
            <b><h2 style="color: white;">{{ Auth::guard('player')->user()->name }}</h2></b>
            <br>
            @if (Auth::guard('player')->user()->address !== null)
            <p style="color: white;">{{ Auth::guard('player')->user()->address }}</p>
            @else
            <p style="color: white;">Alamat kusung!!!</p>    
            @endif
            <br>
            @if (Auth::guard('player')->user()->address !== null)
            <p style="color: white;">{{ Auth::guard('player')->user()->contact }}</p>
            @else
            <p style="color: white;">Contact kusung!!!</p>    
            @endif
          </div>
          <!-- Optional: clear the XS cols if their content doesn't match in height -->
          
          <div class="col-xs-6 col-sm-4" >
            <button type="button" class="btn btn-primary" style="margin-top: 35%;margin-bottom: 5%; display:inline-block; text-align:center;">Add Friend</button>
          </div>
        </div>
      </div>
      <!-- Collapse -->
      <div class="row">
        <div class="col-sm-12">
          <div class="wrapper_bu" style="position:relative;">
            <div class="image">
              <a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse"
                data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseOne">
                <div id="bu1">
                  <img alt="" src="">
                  <div class="title" id="c1">Overview</div>
                </div>
              </a>
            </div>
            <div class="image">
              <a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse"
              data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseTwo">
                <div id="bu2">
                  <img alt="" src="" class="img-responsive imgtransform">
                  <div class="title" id="c2">Tournament</div>
                </div>
              </a>
            </div>
          </div>
          <div class="panel-group" id="accordion1">
            <!-- PANEL BRACKET -->
            <div class="panel panel-default">
              <div id="collapseOne" class="panel-collapse collapse">
                <div class="col-md-5">
                  <!-- PANEL HEADLINE -->
                  <h4>Bio</h4>
                  <div class="panel panel-headline" style="border-radius: 15px;">
                    <div class="panel-body">
                    <div class="row" style="margin-left: 5%;">
                    <br>
                    <p>Name Abraham Claire</p>
                    <br>
                    <p>Country Indonesia</p>
                    <br>
                    <p>Gender Male</p>
                    <br>
                    <p>Email nongski@nongski.com</p>
                    <br>
                    <p>Phone n/a</p>
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
                    <div class="panel" style="border-radius: 15px;">
                    <div class="panel-heading padding-top-30 padding-bottom-30">
                    <center>
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
                    <img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
                    <img src="{{ asset('assets/img/favicon.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
                    </center>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <h4>Status</h4>
                    <div class="panel" style="border-radius: 15px;">
                    <div class="panel-heading padding-top-30 padding-bottom-30">
                    <p>It is a long  established fact theme that machine</p>
                    </div>
                  </div>
                  </div>
                  </div>
                  <!-- END PANEL NO PADDING -->
                  <!-- PANEL NO PADDING -->
                  <h4 style="margin-bottom: -4%;">Teams</h4>
                  <div class="panel" style="margin-top: 5%; border-radius: 15px;">
                    <div class="panel-heading padding-top-30 padding-bottom-30">
                    <div class="row">
                      <div class="col-md-5" style="background-color: #25254F; margin-left: 5%; border-radius: 15px;">
                      <div class="row">
                        <div class="col-md-5">
                        <img src="assets/img/c9.png" width="70%" height="70%" >
                        <a class="btn btn-primary" href="#" role="button" style="margin-top: 20%; border-radius: 10px; border: none; color: white;width: 90px;display:inline-block; text-align:center;font-size: 10px">View Team</a>
                        </div>
                        <div class="col-md-7">
                        <b><h4 style="font-weight: bold;">Cloud 9</h4></b>
                        <h5>It is a long established fact theme that machine</h5>
                        </div>
                      </div>			
                      </div>
                      &nbsp;
                      <div class="col-md-5" style="background-color: #25254F; margin-left: 5%; border-radius: 15px;">
                      <div class="row">
                        <div class="col-md-5">
                        <img src="assets/img/navi.png" width="70%" height="70%" >
                        <a class="btn btn-primary" href="#" role="button" style="margin-top: 20%; border-radius: 10px; border: none; color: white;width: 90px; text-align: center; font-size: 10px;display:inline-block; text-align:center">View Team</a>
                        </div>
                        <div class="col-md-7">
                        <b><h4 style="font-weight: bold;">Cloud 9</h4></b>
                        <h5>It is a long established fact theme that machine</h5>
                        </div>
                      </div>	
                      </div>
                    </div>
                    </div>
                  </div>
                  <!-- END PANEL NO PADDING -->
                  </div>
                  <!-- END PANEL HEADLINE -->
              </div>
            </div>
            <!-- PANEL OVERVIEW -->
            <div class="panel panel-default" style="background-color: transparent;">
              <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel panel-default" style="background-color: transparent; border: none;">
                  <div id="collapseTwo" class="panel-collapse collapse in">
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
                          <td>Game Platform Kusung!!</td>
                          <td>Name Turney Kusung!!</td>
                          <td>August 13, 2020 @3:00 am</td>
                          <td>Liquor</td>
                          <td>164 participants</td>
                          <td>winner</td>
                        </tr>
                      @endforelse
                      </tbody>
                    </table>
                    </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
            <!-- PANEL RULES -->
            <div class="panel panel-default">
              <div id="collapseThree" class="panel-collapse collapse">
                <div class="col-md-4">
                  <!-- PANEL HEADLINE -->
                  <div class="panel panel-headline">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span>1. </span>Format</h3>
                      <h3 class="panel-title"><span>2. </span>Join Tournament</h3>
                      <h3 class="panel-title"><span>3. </span>Prizes</h3>
                    </div>
                  </div>
                </div>
                <!-- END PANEL HEADLINE -->
                <div class="col-md-8">
                  <!-- PANEL HEADLINE -->
                  <div class="panel panel-headline">
                    <div class="panel-body">
                      <h3>1. Format</h3>
                      <br>
                      <p>Game</p>
                      <p>Mobile Legends</p>
                      <br>
                      <p>Team</p>
                      <p>5 VS 5 + 1 Substitutes</p>
                      <hr>
                      <h3>2. Join Tournament</h3>
                      <br>
                      <p>Type</p>
                      <p>Public</p>
                      <br>
                      <p>Entry Fee</p>
                      <p>Free</p>
                      <hr>
                      <h3>3. Prizes</h3>
                      <br>
                      <p>Winner</p>
                      <p>Rp. 5.000.000,00</p>
                      <p>Runner Up</p>
                      <p>Rp. 3.500.000,00</p>
                      <p>Third</p>
                      <p>Rp. 1.500.000,00</p>
                      <hr>
                    </div>
                  </div>
                  <!-- END PANEL NO PADDING -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- /.Collapse -->
      
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