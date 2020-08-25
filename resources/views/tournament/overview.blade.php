@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>NONGSKI</h1>
        <p>Tournament Dota 2 Batch 1</p>
        <p><a class="btn btn-primary btn-lg">JOIN</a></p>
      </div>
      <!-- /.Jumbotron -->
      <!-- Collapse -->
      <div class="row">
        <div class="col-sm-12">
          <div class="wrapper_bu" style="position:relative;">
            <div class="image">
              <a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse"
                data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseTwo">
                <div id="bu1">
                  <img alt="" src="">
                  <div class="title">Overview</div>
                </div>
              </a>
            </div>
            <div class="image">
              <a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse"
              data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseOne">
                <div id="bu2">
                  <img alt="" src="" class="img-responsive imgtransform">
                  <div class="title">Bracket</div>
                </div>
              </a>
            </div>
            <div class="image">
              <a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3"
              data-target="#collapseThree">
                <div id="bu3">
                  <img alt="" src="">
                  <div class="title">Rules</div>
                </div>
              </a>
            </div>
          </div>
          <div class="panel-group" id="accordion1">
            <!-- PANEL BRACKET -->
            <div class="panel panel-default">
              <div id="collapseOne" class="panel-collapse collapse">
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
            <!-- PANEL OVERVIEW -->
            <div class="panel panel-default">
              <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="col-md-8">
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
                        <h4>SEE RULES</h4>
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
                        <h4>SEE RULES</h4>
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
                        <h4>SEE RULES</h4>
                      </div>
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
                    <button class="col-md-12 btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#flipFlop">JOIN TOURNAMENT</button>
                    <!-- The modal -->
                    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <div class="stepwizard">
                              <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step col-xs-3"> 
                                  <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                </div>
                                <div class="stepwizard-step col-xs-3"> 
                                  <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                </div>
                                <div class="stepwizard-step col-xs-3"> 
                                  <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                </div>
                                <div class="stepwizard-step col-xs-3"> 
                                  <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-body">
                            <form role="form">
                              <div class="setup-content" id="step-1">
                                <div class="form-group float-label-control">
                                  <label for="">Select Your Team	</label>
                                  <input type="text" class="form-control" placeholder="Input Your Team" required>
                                </div>
                                <div class="form-group float-label-control">
                                  <label for="">Nickname Ingame</label>
                                  <input type="text" class="form-control" placeholder="Input Your Nickname" required>
                                </div>
                                <div class="form-group float-label-control">
                                  <label for="">Game ID</label>
                                  <input type="text" class="form-control" placeholder="Input Your Game ID" required>
                                </div>
                                <div class="modal-footer">
                                  <input type="button" value="Cancel" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                  <input type="button" value="Next" class="btn btn-primary nextBtn pull-right">
                                </div>
                              </div>
                              <div class="setup-content" id="step-2">
                                <div class="form-group float-label-control">
                                  <label for="">Select Payment Method</label>
                                  <div class="bank">
                                    <a href=""><p><span>See All</span></p></a>
                                    <div class="bank-item pb-3">
                                      <img
                                      src="assets/img/visa-card-logo-9.png"
                                      alt=""
                                      class="bank-image"
                                      />
                                      <div class="description">
                                      <h3>Visa Payment Method</h3>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group float-label-control">
                                  <label for="">Summary</label>
                                  <div class="bank">
                                    <div class="bank-item pb-3">
                                      <div class="col-md-4">
                                        <p>Total</p>
                                      </div>
                                      <div class="summary">
                                        <p>Rp. 100.000</p>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="button" value="Cancel" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                  <input type="button" value="Next" class="btn btn-primary nextBtn pull-right">
                                </div>
                              </div>
                              <div class="setup-content" id="step-3">
                                <div class="form-group float-label-control">
                                  <div class="bank">
                                    <div class="bank-item pb-3">
                                      <div class="payment">
                                      <h4>Your payment is in the process</h4>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <p>Please complete the payment process</p>
                                      <p>accourding to your payment method</p>
                                      <br>
                                      <p>Check your email for details</p>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="button" value="Cancel" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                  <input type="button" value="Next" class="btn btn-primary nextBtn pull-right">
                                </div>
                              </div>
                              <div class="setup-content" id="step-4">
                                <div class="bank">
                                  <div class="bank-item pb-3">
                                    <div class="payment">
                                    <h2>Yey!</h2>
                                    <br>
                                    <h3 class="panel-title">Your team is registered for Nongski Tournament</h3>
                                    <br>
                                    <br>
                                    <p>Your payment has been successful, </p>
                                    <p>for payment details check your email</p>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="button" value="Done" class="btn btn-primary nextBtn pull-right col-md-12">
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