@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Jumbotron -->
            <div class="jumbotron bg-cover text-white">
                <h1>NONGSKI</h1>
                <p>Tournament Dota 2 Batch 1</p>
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
                                        <h4>{{ $event->title }}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Tournament Format</p>
                                        <p>First Place</p>
                                        <p>Pause</p>
                                        <h4><a data-toggle="pill" data-target="#rules"> SEE RULES</a></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Single Bracket</p>
                                        <p>5 vs 5</p>
                                        <p>Twice/team</p>
                                    </div>
                                </div>
                            </div>
                            <!-- PANEL HEADLINE -->
                            <div class="panel panel-headline">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <h4>Mobile Legends</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Tournament Format</p>
                                        <p>First Place</p>
                                        <p>Pause</p>
                                        <h4><a data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseThree"> SEE RULES</a></h4>													</div>
                                    <div class="col-md-4">
                                        <p>Single Bracket</p>
                                        <p>5 vs 5</p>
                                        <p>Twice/team</p>
                                    </div>
                                </div>
                            </div>
                            <!-- PANEL HEADLINE -->
                            <div class="panel panel-headline">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <h4>Mobile Legends</h4>
                                    </div>
                                    <div class="col-md-4">
                                        @foreach ($team as $item)
                                        <p>{{ $item->name }}</p>
                                        @endforeach
                                        <p>First Place</p>
                                        <p>Pause</p>
                                        <h4><a data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseThree"> SEE RULES</a></h4>													</div>
                                    <div class="col-md-4">
                                        <p>Single Bracket</p>
                                        <p>5 vs 5</p>
                                        <p>Twice/team</p>
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
                                        <p>Sign ups open 25 Jul 2020, 17:26 WIB</p>
                                    </div>
                                </div>
                                {{-- <button class="col-md-12 btn btn-success btn-block btn-lg" type="button"  id="pay-button">JOIN TOURNAMENT</a> --}}
                                <form action="{{ URL::route('tournament.payment',$event->id) }}" method="POST">
                                    @csrf
                                    {{ csrf_field() }}
                                    <button class="col-md-12 btn btn-success btn-block btn-lg" type="submit">JOIN TOURNAMENT</button>
                                </form>
                                <!-- The modal -->
                                <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <div class="stepwizard">
                                                    <div class="stepwizard-row setup-panel">
                                                        <div class="stepwizard-step col-xs-2 col-xs-offset-1">
                                                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                                        </div>
                                                        <div class="stepwizard-step col-xs-2">
                                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                        </div>
                                                        <div class="stepwizard-step col-xs-2">
                                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                                                        </div>
                                                        {{-- <div class="stepwizard-step col-xs-2">
                                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                                                        </div>
                                                        <div class="stepwizard-step col-xs-2">
                                                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form">
                                                    <div class="setup-content" id="step-1">
                                                        <div class="form-group float-label-control">
                                                            <div class="bank">
                                                                <div class="bank-item">
                                                                    <div class="payment">
                                                                        <h4>Terms of Agreement</h4>
                                                                        <br>
                                                                        <p>Payment agreements are used in business relationships when one party agrees to pay another. Freelancers and independent contractors often use payment agreements with their clients to ensure that they will be paid fairly and on time. Many payment agreements also fall under other categories, such as service agreements.
                                                                        A car rental agreement is a type of payment agreement. Car rental agreements likely will cover insurance information, contain a description of the vehicle and its registration information, list the odometer reading, and note any existing wear and tear so the renter is not liable.
                                                                        </p>
                                                                        <p>
                                                                            A vendor agreement is another type of payment agreement used when a vendor at a fair or market must enter into an agreement with the hosting party. In a vendor agreement, the vendor may pay for their space up-front, but then keep any profits from the event, or may agree to pay a commission of their profits to the host.
                                                                            These agreements cover payments, but also line up terms and conditions of what is expected of both parties.
                                                                        </p>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <input name="remember" type="checkbox" value="Remember me" style="margin-top: 20px;" required>
                                                                I agree to the <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" value="Cancel" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                                            <input type="button" value="Accept" class="btn btn-primary nextBtn pull-right">
                                                        </div>
                                                    </div>
                                                    <div class="setup-content" id="step-2">
                                                        <div class="form-group float-label-control">
                                                            <label for="">Select Your Team	</label>
                                                            <select id="country" class="form-control">
                                                                @foreach ($team as $item)
                                                                <option>{{ $item->name }}</option>
                                                                @endforeach
                                                                {{-- <option>PUBGM</option>
                                                                <option>DOTA2</option>
                                                                <option>VALORANT</option>
                                                                <option>APEX</option>
                                                                <option>FREE FIRE</option>
                                                                <option>COC</option>
                                                                <option>POINT BLANK</option> --}}
                                                            </select>
                                                        </div>
                                                        <div class="form-group float-label-control">
                                                            <label for="">Nickname Ingame</label>
                                                            <input type="text" class="form-control" placeholder="Input Your Nickname" required="Fill this field">
                                                        </div>
                                                        <div class="form-group float-label-control">
                                                            <label for="">Game ID</label>
                                                            <input type="text" class="form-control" placeholder="Input Your Game ID" required="Fill this field">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" value="Back" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                                            <input type="button" value="Next" class="btn btn-primary nextBtn pull-right">
                                                        </div>
                                                    </div>
                                                    <div class="setup-content" id="step-3">
                                                        <div class="form-group float-label-control">
                                                            <label for="">Summary</label>
                                                            <div class="bank">
                                                                <div class="bank-item pb-3">
                                                                    <div class="col-md-4">
                                                                        <p>Total</p>
                                                                    </div>
                                                                    <div class="summary">
                                                                        <p>{{ $event->fee }}</p>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" value="Done" class="btn btn-primary nextBtn pull-right col-md-12" data-dismiss="modal" aria-label="Close" id="pay-button">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <div class="panel-heading">
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
            <!--End Konten Pills-->
        </div>
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
