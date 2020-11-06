@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Jumbotron -->
            <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(20, 20, 20, 0.6) 0%,rgba(20, 20, 20, 0.6) 100%), url({{URL::asset('images/events/'. $event->banner_url)}});">
                <h1>{{ $event->title }}</h1>
                <p>{{ $game->name }}</p>
                <!-- <p><a class="btn btn-primary btn-lg">JOIN</a></p> -->
            </div>
            <!-- /.Jumbotron -->
            <!-- Nav Pills -->
            <div class="col-md-12">
                <ul class="nav nav-pills tournamentPils">
                    <li class="active pillsOverview"><a data-toggle="pill" href="#overview">Overview</a></li>
                    <li class="pillsBracket"><a data-toggle="pill" href="#bracket" class="pillsFriend">Bracket</a></li>
                    <li class="pillsRules"><a data-toggle="pill" href="#rules" class="pillsFriend">Rules</a></li>
                </ul>
            </div>
            <!--Konten Pills-->
            <div class="tab-content">
                <div id="overview" class="tab-pane fade in active">
                    <!-- PANEL OVERVIEW -->

                        <div class="col-md-8">
                            <!-- PANEL HEADLINE -->
                            <div class="panel panel-headline">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <h4>Rules</h4>
                                    </div>
                                    <div class="col-md-8">
                                        <p style="text-align: justify">{{ $event->rules }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- PANEL HEADLINE -->
                            <div class="panel panel-headline">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <h4>Prizes</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Total Prizes</p>
                                    </div>
                                    <div class="col-md-8">
                                        <h2>IDR {{ $prize_pool }}</h2>
                                        <h4><a data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseThree"></a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- PANEL HEADLINE -->
                            <div class="panel panel-headline">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <h4>Schedule</h4>
                                    </div>
                                    <div class="col-md-3" id="turneyoverview">
                                        <p>Sign up starts</p>
                                        <p>Sign up ends</p>
                                        <p>Starts</p>
                                        <p>Ends</p>
                                        <h4><a data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseThree"></a></h4>
                                    </div>
                                    <div class="col-md-5">
                                        <p>{{\Carbon\Carbon::parse($event->registration_open)->translatedFormat('D, j M Y, H:i') }} WIB</p>
                                        <p>{{\Carbon\Carbon::parse($event->registration_close)->translatedFormat('D, j M Y, H:i') }} WIB</p>
                                        <p>{{\Carbon\Carbon::parse($event->start_date)->translatedFormat('D, j M Y, H:i') }} WIB</p>
                                        <p>{{\Carbon\Carbon::parse($event->end_date)->translatedFormat('D, j M Y, H:i') }} WIB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                        <div class="col-md-4">
                            <!-- PANEL NO PADDING -->
                            <div class="panel">
                                <div class="panel-heading padding-top-10 padding-bottom-10">
                                    <i class="lnr lnr-user fa-2x"></i><span class="panel-title">Teams</span>
                                </div>
                            </div>
                            <!-- END PANEL NO PADDING -->
                            <!-- PANEL NO PADDING -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <p><span class="panel-title">Join Tournament</span></p>
                                    <div class="time">
                                        <p>Sign ups open {{\Carbon\Carbon::parse($event->registration_open)->translatedFormat('D, j M Y, H:i') }} WIB</p>
                                    </div>
                                </div>
                                {{-- <button class="col-md-12 btn btn-success btn-block btn-lg" type="button"  id="pay-button">JOIN TOURNAMENT</a> --}}
                                    @if ($contract !== null)
                                        @if ($event->regis_status == '0')
                                            <form action="{{ URL::route('tournament.join',$event->id) }}" method="POST">
                                                @csrf
                                                {{ csrf_field() }}
                                                <button class="col-md-12 btn btn-success btn-block btn-lg" id="btn-join" type="submit">JOIN TOURNAMENT</button>
                                            </form>
                                        @else
                                            <button class="col-md-12 btn btn-success btn-block btn-lg" id="btn-join" >Registration is closed</button>
                                        @endif
                                    @else
                                        <button class="col-md-12 btn btn-success btn-block btn-lg" id="btn-join" >Please create or join team first</button>
                                    @endif
                            </div>
                            <!-- END PANEL NO PADDING -->
                        </div>
                        <!-- END PANEL HEADLINE -->

                    <!-- End Panel Friend List -->
                </div>

                <div id="bracket" class="tab-pane fade">
                    <!-- PANEL BRACKET -->
                    <div class="panel panel-headline">
                        <section id="bracket">
                            <div class="container-fluid">
                                <div class="split split-one">
                                    <div class="round round-one current">
                                        <div class="round-details">Round 1<br/><span class="date">March 16</span></div>
                                        <ul class="matchup">
                                            <li class="team team-top">Duke<span class="score">76</span></li>
                                            <li class="team team-bottom">Virginia<span class="score">82</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Wake Forest<span class="score">64</span></li>
                                            <li class="team team-bottom">Clemson<span class="score">56</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">North Carolina<span class="score">68</span></li>
                                            <li class="team team-bottom">Florida State<span class="score">54</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">NC State<span class="score">74</span></li>
                                            <li class="team team-bottom">Maryland<span class="score">92</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Georgia Tech<span class="score">78</span></li>
                                            <li class="team team-bottom">Georgia<span class="score">80</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Auburn<span class="score">64</span></li>
                                            <li class="team team-bottom">Florida<span class="score">63</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Kentucky<span class="score">70</span></li>
                                            <li class="team team-bottom">Alabama<span class="score">59</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Vanderbilt<span class="score">64</span></li>
                                            <li class="team team-bottom">Gonzaga<span class="score">68</span></li>
                                        </ul>
                                    </div>  <!-- END ROUND ONE -->

                                    <div class="round round-two">
                                        <div class="round-details">Round 2<br/><span class="date">March 18</span></div>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                    </div>  <!-- END ROUND TWO -->

                                    <div class="round round-three">
                                        <div class="round-details">Round 3<br/><span class="date">March 22</span></div>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                    </div>  <!-- END ROUND THREE -->
                                </div>

                                <div class="champion">
                                        <div class="semis-l">
                                            <div class="round-details">west semifinals <br/><span class="date">March 26-28</span></div>
                                            <ul class ="matchup championship">
                                                <li class="team team-top">&nbsp;<span class="vote-count">&nbsp;</span></li>
                                                <li class="team team-bottom">&nbsp;<span class="vote-count">&nbsp;</span></li>
                                            </ul>
                                        </div>
                                        <div class="final">
                                            <i class="fa fa-trophy"></i>
                                            <div class="round-details">championship <br/><span class="date">March 30 - Apr. 1</span></div>
                                            <ul class ="matchup championship">
                                                <li class="team team-top">&nbsp;<span class="vote-count">&nbsp;</span></li>
                                                <li class="team team-bottom">&nbsp;<span class="vote-count">&nbsp;</span></li>
                                            </ul>
                                        </div>
                                        <div class="semis-r">
                                            <div class="round-details">east semifinals <br/><span class="date">March 26-28</span></div>
                                            <ul class ="matchup championship">
                                                <li class="team team-top">&nbsp;<span class="vote-count">&nbsp;</span></li>
                                                <li class="team team-bottom">&nbsp;<span class="vote-count">&nbsp;</span></li>
                                            </ul>
                                        </div>
                                </div>

                                <div class="split split-two">


                                    <div class="round round-three">
                                        <div class="round-details">Round 3<br/><span class="date">March 22</span></div>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                    </div>  <!-- END ROUND THREE -->

                                    <div class="round round-two">
                                        <div class="round-details">Round 2<br/><span class="date">March 18</span></div>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        </ul>
                                    </div>  <!-- END ROUND TWO -->
                                    <div class="round round-one current">
                                        <div class="round-details">Round 1<br/><span class="date">March 16</span></div>
                                        <ul class="matchup">
                                            <li class="team team-top">Minnesota<span class="score">62</span></li>
                                            <li class="team team-bottom">Northwestern<span class="score">54</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Michigan<span class="score">68</span></li>
                                            <li class="team team-bottom">Iowa<span class="score">66</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Illinois<span class="score">64</span></li>
                                            <li class="team team-bottom">Wisconsin<span class="score">56</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Purdue<span class="score">36</span></li>
                                            <li class="team team-bottom">Boise State<span class="score">40</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Penn State<span class="score">38</span></li>
                                            <li class="team team-bottom">Indiana<span class="score">44</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Ohio State<span class="score">52</span></li>
                                            <li class="team team-bottom">VCU<span class="score">80</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">USC<span class="score">58</span></li>
                                            <li class="team team-bottom">Cal<span class="score">59</span></li>
                                        </ul>
                                        <ul class="matchup">
                                            <li class="team team-top">Virginia Tech<span class="score">74</span></li>
                                            <li class="team team-bottom">Dartmouth<span class="score">111</span></li>
                                        </ul>
                                    </div>  <!-- END ROUND ONE -->
                                </div>
                            </div>
                        </section>
                    </div>

                </div>

                <div id="rules" class="tab-pane fade">
                    <!-- PANEL RULES -->
                    <div class="col-md-4">
                        <!-- PANEL HEADLINE -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">1. Format</h3>
                                <h3 class="panel-title">2. Join Tournament</h3>
                                <h3 class="panel-title">3. Prizes</h3>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL HEADLINE -->
                    <div class="col-md-8">
                        <!-- PANEL HEADLINE -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3>1. Format</h3>
                                <p>Game</p>
                                <p>{{ $game->name }}</p>
                                <br>
                                <p>Total Team</p>
                                <p>{{ $event->participant }} teams</p>
                                <hr>
                                <h3>2. Join Tournament</h3>
                                <p>Type</p>
                                <p>Public</p>
                                <br>
                                <p>Entry Fee</p>
                                @if ($event->fee == "free")  
                                    <p>{{ $event->fee }}</p>
                                @else
                                    <p>IDR {{ $fee }}</p>
                                @endif
                                <hr>
                                <h3>3. Prizes</h3>
                                <p>Prizepool</p>
                                <p>Rp {{ $prize_pool }}</p>
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
            <!--End Konten Pills-->
        </div>
        <!--Footer-->
		@include('layouts.footer')
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
@push('wizard')
<script src="{{ asset('assets/scripts/wizard-steps.js') }}"></script>
<script>
	$("#c1,#c2,#c3").click(function(){

    $("#c1,#c2,#c3.selectedcategoryServices").removeClass("selectedcategoryServices");
     $(this).addClass('selectedcategoryServices');

 });

	</script>
	<script src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js"></script>
	<script>
		$("#slick").ddslick({
			width:"100%",
			imagePosition: "left",
			selectText: "Select your payment method",
			onSelected: function(data){
				$("#selected").html(data.selectedData.value);
			}
		})
	</script>
@endpush
