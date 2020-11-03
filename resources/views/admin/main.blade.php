<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - @yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <style>
        svg.bi.bi-file-earmark-excel-fill{
            font-size: 20px;
            color: black;

        }
        svg.bi.bi-file-earmark-excel-fill:hover{
            color: darkolivegreen;

        }
    </style>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="{{ asset('css/admin/datepicker.min.css') }}" />
    {{-- jquery bracket --}}
<link rel="stylesheet" href="{{ asset('css/jquery.bracket.min.css')}}">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::url() == url('super/overview') ? 'active' : '' }}">
                        <a href="{{URL::route('overview.index')}}"><i class="menu-icon fa fa-2x fa-pie-chart"></i>Overview </a>
                    </li>
                    <li class="{{ Request::url() == url('super/event') ? 'active' : '' }}">
                        <a href="{{URL::route('event.index')}}"><i class="menu-icon fa fa-2x fa-trophy"></i>Tournament</a>
                    </li>
                    <li class="{{ Request::url() == url('super/game') ? 'active' : '' }}">
                        <a href="{{URL::route('game.index')}}"><i class="menu-icon fa fa-2x fa-gamepad"></i>Games</a>
                    </li>
                    <li class="{{ Request::url() == url('super/sponsors') ? 'active' : '' }}">
                        <a href="{{URL::route('sponsors.index')}}"><i class="menu-icon fa fa-2x fa-gamepad"></i>Sponsors</a>
                    </li>
                    <li class="{{ Request::url() == url('super/info-payment') ? 'active' : '' }}">
                        <a href="{{URL::route('info.index')}}"><i class="menu-icon fa fa-2x fa-money"></i>Info Payment</a>
                    </li>
                    <li class="{{ Request::url() == url('super/player-list') ? 'active' : '' }}">
                        <a href="{{URL::route('list.player')}}"><i class="menu-icon fa fa-2x fa-money"></i>Player List</a>
                    </li>
                    <li class="{{ Request::url() == url('super/team-list') ? 'active' : '' }}">
                        <a href="{{URL::route('list.team')}}"><i class="menu-icon fa fa-2x fa-money"></i>Team List</a>
                    </li>
                    <hr class="bg-white" width="100%">
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{ asset('assets/img/gameski.png') }}" alt="Logo" width="150px"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/admin/logo2.png') }}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <?php 
                                $payment = DB::table('joins')
                                    ->select('*')
                                    ->where('status', '=', '0')
                                    ->count();
                            ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if ($payment != null)
                                    <span class="count bg-danger">{{ $payment }}</span>
                                @endif
                            </button>
                            @if ($payment != null)
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-money"></i>
                                    <p>{{ $payment }} new payment</p>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div style="width: 0px; height: 50%; border: 1px gray solid;">
                            </div>
                            <span class="ml-3 mr-2">@yield('admin-name')</span>
                            <img class="user-avatar rounded-circle" src="{{ asset('images/admin/admin.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ URL::route('super.logout') }}"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                @yield('main')
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        Copyright &copy; 2020 Nongski.i
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('js/admin/main.js') }}"></script>
    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <!--Flot Chart-->
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <!-- local -->
    <script src="{{ asset('js/admin/widgets.js') }}"></script>
    @stack('tooltip')
</body>

</html>
