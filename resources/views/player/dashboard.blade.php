@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <!--carousel-->
    <div class="container">
      <div class="row">
        <div class="row">
          <div class="col-md-9 head-text" >
            <h3>
              Tournament By Game</h3>
          </div>
          <div class="col-md-3">
            <!-- Controls -->
            <div class="controls team-control-btn pull-right">
              <a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel"
                data-slide="prev"></a>
              <a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel"
                  data-slide="next"></a>
            </div>
          </div>
        </div>
        <div class="col-md-12 carousel-landing">
          <div id="Carousel" class="carousel slide">					 
          <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="item active">
                <div class="row">
                  <div class="case-landing landing1">
                    <div class="case-landing__overlay">
                      <h2 class="case-landing__title">Apex Legends</h2>
                    </div>
                  </div>
                  <div class="case-landing landing1">
                    <div class="case-landing__overlay">
                      <h2 class="case-landing__title">Apex Legends</h2>
                    </div>
                  </div>
                  <div class="case-landing landing1">
                    <div class="case-landing__overlay">
                      <h2 class="case-landing__title">Apex Legends</h2>
                    </div>
                  </div>
                </div><!--.row-->
              </div>
              <!--.item-->
              <div class="item">
                <div class="row">
                  <div class="case-landing landing1">
                    <div class="case-landing__overlay">
                      <h2 class="case-landing__title">Apex Legends</h2>
                    </div>
                  </div>
                  <div class="case-landing landing1">
                    <div class="case-landing__overlay">
                      <h2 class="case-landing__title">Apex Legends</h2>
                    </div>
                  </div>
                  <div class="case-landing landing1">
                    <div class="case-landing__overlay">
                      <h2 class="case-landing__title">Apex Legends</h2>
                    </div>
                  </div>
                </div><!--.row-->
              </div>
              <!--.item-->
            </div>
          </div>
        </div> 
      </div>
    </div>
    <!--Carousel Feature Turnament-->
    <div class="container">
      <div class="row">
        <div class="row">
          <div class="col-md-9 head-text">
            <h3>
              Featured Tournament</h3>
          </div>
          <div class="col-md-3">
            <!-- Controls -->
            <div class="controls team-control-btn pull-right">
              <a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel-Feature"
                data-slide="prev"></a>
              <a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel-Feature"
                  data-slide="next"></a>
            </div>
          </div>
        </div>
        <div class="col-md-12 carousel-landing">
          <div id="Carousel-Feature" class="carousel slide">					 
          <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="item active">
                <div class="row">
                  <div class="case-landing landing1"></div>
                  <div class="case-landing landing1"></div>
                  <div class="case-landing landing1"></div>
                </div><!--.row-->
              </div>
              <!--.item-->
              <div class="item">
                <div class="row">
                  <div class="case-landing landing1"></div>
                  <div class="case-landing landing1"></div>
                  <div class="case-landing landing1"></div>
                </div><!--.row-->
              </div>
              <!--.item-->
            </div>
          </div>
        </div> 
      </div>
    </div>
    <!-- End Carousel -->
    <div class="panel panel-default" style="background-color: transparent; border: none;">
      <div id="collapseTwo" class="panel-collapse collapse in">
        <div class="container" >
          <div class="row">
            <div class="col-md-6 head-text">
              <h3>
                Matchticker</h3>
            </div>
          </div>
          <div class="table-responsive table-matchticker">          
          <table class="table table-matchticker-content">
            <tr>
              <th>
                <h3>8 PM</h3>
                <h4>02/03/2020</h4>
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <h4 class="text-versus">VS</h4>
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <h4>Nongski</h4>
                <h4>Tournament</h4>
              </th>
              <th>
                <h4 class="text-versus">Best Of 3</h4>
              </th>
            </tr>
          </table>
          <table class="table table-matchticker-content">
            <tr>
              <th>
                <h3>8 PM</h3>
                <h4>02/03/2020</h4>
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <h4 class="text-versus">VS</h4>
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <h4>Nongski</h4>
                <h4>Tournament</h4>
              </th>
              <th>
                <h4 class="text-versus">Best Of 3</h4>
              </th>
            </tr>
          </table>
          <table class="table table-matchticker-content">
            <tr>
              <th>
                <h3>8 PM</h3>
                <h4>02/03/2020</h4>
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <h4 class="text-versus">VS</h4>
              </th>
              <th>
                <img class="table-matchticker-img" alt="" src="{{ asset('assets/img/ML.png') }}">
              </th>
              <th>
                <h4>Nongski</h4>
                <h4>Tournament</h4>
              </th>
              <th>
                <h4 class="text-versus">Best Of 3</h4>
              </th>
            </tr>
          </table>
          </div>
          </div>
      </div>
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
@endsection