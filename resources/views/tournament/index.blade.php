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
            <div class="row">
                <div class="col-md-12">
                    <div class="controls team-control-btn pull-right">
                        <a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel"
                            data-slide="prev"></a>
                        <a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel" data-slide="next"></a>
                    </div>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-md-12 carousel-landing"><!--Class utama Carousel "carousel-landing"-->
                    <div id="Carousel" class="carousel slide">
                    <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item active">

                                <div class="menu-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @forelse ($game as $games)
                                                <div class="col-lg-2 col-xs-6 text-center">
                                                    <a data-toggle="pill" href="#menu-game">
                                                        <div class="box" id="box-game">
                                                            <img src="{{ URL::asset('images/game_icon/'. $games->icon_url) }}" alt="" style="height: 80px; object-fit: cover; object-position:center center;">
                                                        </div>
                                                    </a>
                                                </div>
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">

                                <div class="menu-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @forelse ($game as $games)
                                                <div class="col-lg-2 col-xs-6 text-center">
                                                    <a data-toggle="pill" href="#menu-game">
                                                        <div class="box" id="box-game">
                                                            <img src="{{ URL::asset('images/game_icon/'. $games->icon_url) }}" alt="" style="height: 80px; object-fit: cover; object-position:center center;">
                                                        </div>
                                                    </a>
                                                </div>
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Card -->
            <!-- TOURNAMENT BANNER -->
            <div class="tab-content">
                {{--  MENU GAME!  --}}
                <div id="menu-game" class="tab-pane fade in active">
                    <div class="row">
                        @forelse ($tournament as $tournaments)
                        <div class="col-lg-12">
                            <div id="menu-game" class="product">
                                <div class="img-container">
                                    @if ($tournaments->banner_url)
                                    <img src="{{ asset('images/events/'.$tournaments->banner_url) }}">
                                    @else
                                    <img src="{{ asset('assets/img/maxresdefault.jpg') }}">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <a href="tournament-overview.html">
                                        <div class="product-content">
                                            <div class="col-lg-8 col-xs-12">
                                                <h1>{{ $tournaments->title }}</h1>
                                            </div>
                                            <div class="prizepool col-lg-4 col-xs-12">
                                                <h3 class="panel-title">Prizepool</h3>
                                                <h4>IDR {{ $tournaments->prize_pool }}</h4>
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
                                                                {{ $tournaments->fee }}
                                                            </td>
                                                            <td>
                                                                {{ $tournaments->participant }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($tournaments->start_date)->translatedFormat('d F') }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($tournaments->start_date)->translatedFormat('h:i') }} WIB
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-4 col-xs-12 buttons">
                                                <a class="button buy btn-success" href="{{ URL::route('tournament.overview',$tournaments->id) }}">OPEN</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div id="menu-error" class="product">
                                    <h1>Tidak Ada Turnamen!!</h1>
                                </div>
                            </div>
                        </div>
                        @endforelse
                        {{ $tournament->links() }}
                    </div>
                </div>
                {{--  GAME!  --}}
                <div id="[game]" class="tab-pane fade in">
                    <div class="row">
                        @forelse ($tournament as $tournaments)
                        <div class="col-lg-12">
                            <div id="menu-game" class="product">
                                <div class="img-container">
                                    @if ($tournaments->banner_url)
                                    <img src="{{ asset('images/events/'.$tournaments->banner_url) }}">
                                    @else
                                    <img src="{{ asset('assets/img/maxresdefault.jpg') }}">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <a href="tournament-overview.html">
                                        <div class="product-content">
                                            <div class="col-lg-8 col-xs-12">
                                                <h1>{{ $tournaments->title }}</h1>
                                            </div>
                                            <div class="prizepool col-lg-4 col-xs-12">
                                                <h3 class="panel-title">Prizepool</h3>
                                                <h4>IDR {{ $tournaments->prize_pool }}</h4>
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
                                                                {{ $tournaments->fee }}
                                                            </td>
                                                            <td>
                                                                {{ $tournaments->participant }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($tournaments->start_date)->translatedFormat('d F') }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($tournaments->start_date)->translatedFormat('h:i') }} WIB
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-4 col-xs-12 buttons">
                                                <a class="button buy btn-success" href="{{ URL::route('tournament.overview',$tournaments->id) }}">OPEN</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div id="menu-error" class="product">
                                    <h1>Tidak Ada Turnamen!!</h1>
                                </div>
                            </div>
                        </div>
                        @endforelse
                        {{ $tournament->links() }}
                    </div>
                </div>
            </div>
            <!-- END TOURNAMENT BANNER -->
        </div>
        <!--Footer-->
		@include('layouts.footer')
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection
