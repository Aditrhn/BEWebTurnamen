<!doctype html>
<html lang="en">

<head>
	<title>WEB TOURNAMENT</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
	<div class="sidenav">
		<div class="bg-image">
			<div class="login-main-text">
			</div>
		</div>
	</div>
	<div class="main">
		<div class="col-md-12 col-sm-12">
			<div class="div panel-body">
				<div class="login-form">
					<div class="panel-body">
						<h2>Login to website</h2>
						<br>
						<form accept-charset="UTF-8" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username or email" name="email" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<span class="checkbox">
								<label>
								<input name="remember" type="checkbox" value="Remember me"> Remember Me
								</label> 
								<a href="" class="pull-right">Forgot Password?</a>
							</span>
							{{-- <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> --}}
							<a href="{{ URL::route('dashboard') }}" class="btn btn-lg btn-primary btn-block" type="submit">Login</a>
							<br>
							<p>Not a member yet ?  <a href="{{ URL::route('signup') }}" class="primary">Sign Up</a></p>
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Javascript -->
	
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
</body>

</html>
