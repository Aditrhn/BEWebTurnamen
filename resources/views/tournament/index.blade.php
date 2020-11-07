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
                            <img src="{{ URL::asset('assets/img/valor-banner.png') }}" style="width:100%" data-src="holder.js/900x500/auto/#7cbf00:#fff/text: " alt="First slide">
                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('assets/img/dota2-banner.png') }}" style="width:100%" data-src="" alt="Second    slide">
                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('assets/img/apex-banner.png') }}" style="width:100%" data-src="" alt="Third slide">
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
                        <div class="carousel-inner" data-interval="false">
                            <div class="item active">
                                <div class="menu-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-2 col-xs-6 text-center">
                                                <a data-toggle="pill" href="#menu-game" title="Show all">
                                                    <div class="box" id="box-game-default">
                                                        <img src="{{ URL::asset('assets/img/bars-white.png') }}" alt="" style="height: 60px; object-fit: cover; object-position:center center;">
                                                    </div>
                                                </a>
                                            </div>
                                            <?php $i = 1 ?>
                                            @forelse ($game as $games)
                                                <div class="col-lg-2 col-xs-6 text-center">
                                                    <a class="active" data-toggle="pill" href="#menu-game{{$i}}" title="{{ $games->name }}">
                                                        <div class="box" id="box-game active">
                                                            <img src="{{ URL::asset('images/game_icon/'. $games->icon_url) }}" alt="" style="height: 60px; object-fit: cover; object-position:center center;">
                                                        </div>
                                                    </a>
                                                </div>
                                                @if ($i++ == 5)
                                                    <?php break; ?>
                                                @endif
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($count > 5)
                                <?php $sum = ceil($count/5); $k = 1; $l = 4;?>
                                @for ($j = 1; $j < $sum; $j++)
                                    <div class="item">
                                        <div class="menu-box">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-2 col-xs-6 text-center">
                                                        <a data-toggle="pill" href="#menu-game" title="Show all">
                                                            <div class="box" id="box-game-default">
                                                                <img src="{{ URL::asset('assets/img/bars-white.png') }}" alt="" style="height: 60px; object-fit: cover; object-position:center center;">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    @foreach ($game as $key => $games)
                                                        @if ($key <= $count-($count-$l))
                                                            <?php continue; ?> 
                                                        @endif
                                                        <div class="col-lg-2 col-xs-6 text-center">
                                                            <a data-toggle="pill" href="#menu-game{{$i}}">
                                                                <div class="box" id="box-game-default" title="{{$games->name}}">
                                                                    <img src="{{ URL::asset('images/game_icon/'. $games->icon_url) }}" alt="" style="height: 60px; object-fit: cover; object-position:center center;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <?php $k++; $l++; $i++ ?>
                                                        @if ($k == 6)
                                                            <?php break; ?>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endif
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
                        <?php 
                            $fee = number_format($tournaments->fee);
                            $prize_pool = number_format($tournaments->prize_pool);
                            $join = DB::table('joins')
                                ->join('events', 'events.id', '=', 'joins.event_id')
                                ->where('events.id', '=', $tournaments->id)
                                ->count();
                            $slot = $tournaments->participant-$join;
                        ?>
                        <div class="col-lg-12">
                            <div id="menu-game" class="product">
                                <div class="img-container">
                                    @if ($tournaments->banner_url)
                                    <img src="{{ URL::asset('images/events/'.$tournaments->banner_url) }}">
                                    @else
                                    <img src="{{ URL::asset('assets/img/maxresdefault.jpg') }}">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <div class="product-content">
                                        <div class="col-lg-8 col-xs-12">
                                            <h1>{{ $tournaments->title }}</h1>
                                        </div>
                                        <div class="prizepool col-lg-4 col-xs-12">
                                            <h3 class="panel-title">Prizepool</h3>
                                            <h3>IDR {{ $prize_pool }}</h3>
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
                                                            IDR {{ $fee }}
                                                        </td>
                                                        <td>
                                                            @if ($slot == 0)
                                                                <p>Full</p>
                                                            @else
                                                                {{ $tournaments->participant-$join }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{\Carbon\Carbon::parse($tournaments->start_date)->translatedFormat('j F') }}
                                                        </td>
                                                        <td>
                                                            {{\Carbon\Carbon::parse($tournaments->start_date)->translatedFormat('h:i') }} WIB
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-4 col-xs-12 buttons">
                                            @if ($slot == null)
                                                <a class="button buy btn-danger" href="#" disabled style="opacity: 100%">CLOSED</a>
                                            @else
                                                <a class="button buy btn-success" href="{{ URL::route('tournament.overview',$tournaments->id) }}">OPEN</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="tab-content">
                                    <div id="" class="menu-error">
                                        <h1>Currently there are no tournament now...</h1>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                        {{ $tournament->links() }}
                    </div>
                </div>
                {{--  GAME!  --}}
                <?php $i = 1?>
                @forelse ($game as $games)
                    <?php
                        $gametournament = DB::table('events')->select('*')->where('game_id', '=', $games->id)->get();
                    ?>
                    <div id="menu-game{{$i}}" class="tab-pane fade in">
                        <div class="row">
                            @forelse ($gametournament as $gametournaments)
                            <?php 
                                $fee = number_format($gametournaments->fee);
                                $prize_pool = number_format($gametournaments->prize_pool);
                            ?>
                            <div class="col-lg-12">
                                <div id="menu-game" class="product">
                                    <div class="img-container">
                                        @if ($gametournaments->banner_url)
                                            <img src="{{ URL::asset('images/events/'.$gametournaments->banner_url) }}">
                                        @else
                                            <img src="{{ URL::asset('assets/img/maxresdefault.jpg') }}">
                                        @endif
                                    </div>
                                    <div class="product-info">
                                        <div class="product-content">
                                            <div class="col-lg-8 col-xs-12">
                                                <h1>{{ $gametournaments->title }}</h1>
                                            </div>
                                            <div class="prizepool col-lg-4 col-xs-12">
                                                <h3 class="panel-title">Prizepool</h3>
                                                <h3>IDR {{ $prize_pool }}</h3>
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
                                                                IDR {{ $fee }}
                                                            </td>
                                                            <td>
                                                                {{ $gametournaments->participant }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($gametournaments->start_date)->translatedFormat('j F') }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($gametournaments->start_date)->translatedFormat('h:i') }} WIB
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-4 col-xs-12 buttons">
                                                <a class="button buy btn-success" href="{{ URL::route('tournament.overview',$tournaments->id) }}">OPEN</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="tab-content">
                                        <div id="" class="menu-error">
                                            <h1>Currently there are no {{ $games->name }} tournament now... </h1>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                            {{ $tournament->links() }}
                        </div>
                    </div>
                    <?php $i++ ?>
                @empty
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div id="" class="menu-error">
                                <h1>Currently there are no tournament now...</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- END TOURNAMENT BANNER -->
        </div>
        <!--Footer-->
		@include('layouts.footer')
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection
@push('tooltip')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
