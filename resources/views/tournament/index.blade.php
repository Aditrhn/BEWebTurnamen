@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- carousel -->
      <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
        <!-- Indicators -->

        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

           <div class="carousel-inner">
          <div class="item active">
            <img src="{{ asset('assets/img/valor-banner.png') }}" style="width:100%" data-src="holder.js/900x500/auto/#7cbf00:#fff/text: " alt="First slide">
            <!-- <div class="container">
              <div class="carousel-caption">
                <h1>What is Lorem Ipsum?</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div> -->
          </div>
          <div class="item">
            <img src="{{ asset('assets/img/dota2-banner.png') }}" style="width:100%" data-src="" alt="Second    slide">
          </div>
          <div class="item">
            <img src="{{ asset('assets/img/apex-banner.png') }}" style="width:100%" data-src="" alt="Third slide">
          </div>
        </div>
           <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
      <!-- /.carousel -->
      <!-- Card -->
      <h1 class="title">GAMES TOURNAMENT</h1>
      <div class="row">
        <div class="col-md-12">
          <div class="case-study study1">
            <div class="case-study__overlay">
              <h2 class="case-study__title">Game Menu</h2>
              <a class="case-study__link" href="#">View Details</a>
            </div>
          </div>
          <div class="case-study study2">
            <div class="case-study__overlay">
              <h2 class="case-study__title">Apex Legends</h2>
              <a class="case-study__link" href="#">View Details</a>
            </div>
          </div>
          <div class="case-study study3">
            <div class="case-study__overlay">
              <h2 class="case-study__title">Valorant</h2>
              <a class="case-study__link" href="#">View Details</a>
            </div>
          </div>
          <div class="case-study study4">
            <div class="case-study__overlay">
              <h2 class="case-study__title">Mobile Legends</h2>
              <a class="case-study__link" href="#">View Details</a>
            </div>
          </div>
          <div class="case-study study5">
            <div class="case-study__overlay">
              <h2 class="case-study__title">Dota 2</h2>
              <a class="case-study__link" href="#">View Details</a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- End Card -->
      <!-- TOURNAMENT BANNER -->
      <div class="product">
        <div class="img-container">
          <img src="{{ asset('assets/img/maxresdefault.jpg') }}">
        </div>
        <div class="product-info">
          <a href="tournament-overview.html">
            <div class="product-content">
              <div class="col-md-8">
                <h1>PROGAMERS NONGSKI I MLBB ONLINE TOURNAMENT</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ariatur</p>
              </div>
              <div class="buttons col-md-4">
                <a href="{{ URL::route('tournament.overview') }}" class="button buy btn-success" href="tournament-overview.html">OPEN</a>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        Register
                      </th>
                      <th>
                        Slot
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Time
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="">
                      <td>
                        Free
                      </td>
                      <td>
                        60/64
                      </td>
                      <td>
                        8 Aug
                      </td>
                      <td>
                        16:00 WIB
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="{{ asset('assets/img/maxresdefault.jpg') }}">
        </div>
        <div class="product-info">
          <a href="tournament-overview.html">
            <div class="product-content">
              <div class="col-md-8">
                <h1>PROGAMERS NONGSKI I MLBB ONLINE TOURNAMENT</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ariatur</p>
              </div>
              <div class="buttons col-md-4">
                <a href="{{ URL::route('tournament.overview') }}" class="button buy btn-success" href="tournament-overview.html">OPEN</a>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        Register
                      </th>
                      <th>
                        Slot
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Time
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="">
                      <td>
                        Free
                      </td>
                      <td>
                        60/64
                      </td>
                      <td>
                        8 Aug
                      </td>
                      <td>
                        16:00 WIB
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- END TOURNAMENT BANNER -->
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
@endsection