<!doctype html>
<html lang="en">

<head>
	<title>GAMESKII</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
    <!-- NAVBAR -->
    @include('layouts.header')
		<!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    @include('layouts.sidebar')
		<!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    @yield('main')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid" style="background-color: #35346c;">
				<div class="row copyright">
					<div class="col-md-4">
						<img class="img-footer" src="{{ asset('assets/img/gameski.png') }}" alt="">
						<div class="row" style="padding-top : 20px;">
							<img class="img-sosial" src="{{ asset('assets/img/ICON/instagram-white.png') }}" alt="">
							<img class="img-sosial" src="{{ asset('assets/img/ICON/facebook-white.png') }}" alt="">
							<img class="img-sosial" src="{{ asset('assets/img/ICON/whatsapp-white.png') }}" alt="">
						</div>
					</div>
					<div class="col-md-4">
						<h4>About Us</h4>
						<p style="text-align: center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
							when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
						</p>
						<p>Telp. 0812-2799-3505</p>
					</div>
					<div class="col-md-4">
						<h4>Support By :</h4>
						<img class="img-support" src="{{ asset('assets/img/gameski.png') }}" alt="">
						<img class="img-support" src="{{ asset('assets/img/gameski.png') }}" alt="">
						<img class="img-support" src="{{ asset('assets/img/gameski.png') }}" alt="">
						<img class="img-support" src="{{ asset('assets/img/gameski.png') }}" alt="">
					</div>
				</div>
				<p class="copyright-font">&copy; 2020 Gameskii.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->

	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
    {{-- <script src="{{ asset('assets/scripts/wizard-steps.js') }}"></script> --}}
    @stack('wizard')
</body>

</html>
