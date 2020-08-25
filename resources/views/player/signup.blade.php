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
	<div class="side-image">
	</div>
	<div class="main">
		<div class="col-md-12 col-sm-12">
			<div class="div panel-body">
				<div class="login-form">
					<div class="panel-body">
						<h2>Sign Up</h2>
						<br>
						<form accept-charset="UTF-8" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Your name" name="email" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Your e-mail" name="email" type="email" value="" required>
							</div>
							<div class="radio">
								<label>
									<input name="remember" type="radio" value="Remember me" required>
									I'm a player
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="remember" type="radio" value="Remember me" required>
									I'm a event organizer
								</label>
							</div>
							<div class="checkbox">
								<label>
								<input name="remember" type="checkbox" value="Remember me"> 
								I agree to the <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a>
								</label> 
							</div>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
							<br>
							<p class="text-center">Have an account ?  <a href="{{ url('/') }}">Log in here</a></p>
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
