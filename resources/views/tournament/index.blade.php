@extends('layouts.main')
@section('main')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- carousel -->
            <div class="row">
                <div class="col-lg-12">
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
                </div>
            </div>
            <!-- /.carousel -->
            <!-- Card -->
            <h1 class="text-center">GAMES TOURNAMENT</h1>
            <div class="menu-box">
                <div class="container-fluid">
                     <div class="row">
                            {{-- <div class="col-lg-2 col-xs-6 col-lg-offset-1 text-center">
                                <div class="box">
                                    <img src="{{ asset('assets/img/bars-white.png') }}" alt="">
                                 </div>
                            </div>

                             <div class="col-lg-2 col-xs-6  text-center">
                                <div class="box">
                                    <img src="{{ asset('assets/img/apex legends.png') }}" alt="">
                                 </div>
                            </div>

                             <div class="col-lg-2 col-xs-6 text-center">
                                <div class="box">
                                    <img src="{{ asset('assets/img/valorant.png') }}" alt="">
                                 </div>
                            </div>

                            <div class="col-lg-2 col-xs-6 text-center">
                                <div class="box">
                                    <img src="{{ asset('assets/img/dota2.png') }}" alt="">
                                 </div>
                            </div> --}}

                             <div class="col-lg-2 col-xs-6 text-center">
                                <div class="box">
                                    <img src="{{ asset('assets/img/ML.png') }}" alt="">
                                 </div>
                            </div>

                    </div>
                </div>
            </div>

            <!-- End Card -->
            <!-- TOURNAMENT BANNER -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product">
                            <div class="img-container">
                                <img src="{{ asset('assets/img/maxresdefault.jpg') }}">
                            </div>
                            <div class="product-info">
                                <a href="tournament-overview.html">
                                    <div class="product-content">
                                        <div class="col-lg-8 col-xs-12">
                                            <h1>PROGAMERS NONGSKI I MLBB ONLINE TOURNAMENT</h1>
                                        </div>
                                        <div class="prizepool col-lg-4 col-xs-12">
                                            <h3 class="panel-title">Prizepool</h3>
                                            <h4>IDR 10.000.000</h4>
                                        </div>
                                        <div class="col-lg-8 col-xs-12">
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
                                        <div class="col-lg-4 col-xs-12 buttons">
                                            <a class="button buy btn-success" href="tournament-overview.html">OPEN</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
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
                                        <div class="prizepool col-md-4">
                                            <h3 class="panel-title margin-right-40">Prizepool</h3>
                                            <h4 class="margin-top-30">IDR 10.000.000</h4>
                                        </div>
                                        <div class="col-md-8">
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
                                        <div class="col-md-4 buttons">
                                            <a class="button buy btn-success" href="tournament-overview.html">OPEN</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- END TOURNAMENT BANNER -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection
