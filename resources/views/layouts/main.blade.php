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
	<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
	<link rel="icon" type="{{ asset('image/png') }}" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		@include('layouts.header')
		@include('layouts.sidebar')
		<!-- MAIN -->
		@yield('main')
		{{-- <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12" style="background-color: #35356C; border-radius: 20px; box-shadow: 7px 7px 10px 2px #22224F ">
						<div class="row">
							<div class="col-xs-6 col-sm-4"><img src="{{ asset('assets/img/apple-icon.png') }}" width="40%" style="margin-top: 5%; margin-bottom: 5%; border-radius: 10px; margin-left: 10%;"></div>
							<div class="col-xs-6 col-sm-4" style="margin-left: -10%; ">
								<b><h2 style="color: white;">Huda</h2></b>
								<br>
								<p style="color: white;">Magelang</p>
								<br>
								<p style="color: white;">1980 </p>
		
							</div>
							<!-- Optional: clear the XS cols if their content doesn't match in height -->
							
							<div class="col-xs-6 col-sm-4" >
								<button type="button" class="btn btn-primary" style="margin-top: 35%;margin-bottom: 5%;display:inline-block; text-align:center;">Chat</button> &ensp;&ensp;&ensp;
								<button type="button" class="btn btn-primary" style="margin-top: 35%;margin-bottom: 5%; display:inline-block; text-align:center;">Add Friend</button>
							</div>
						</div>
					</div>
					<!-- Collapse -->
					<div class="col-sm-12">
						<div class="wrapper_bu" style="position:relative;">
							<div class="image">
								<a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse"
									data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseOne">
									<div class="title_bu" id="bu1" style="margin-left: 20px;">
										<img alt="" src="">
										<div class="title">Overview</div>
									</div>
								</a>
							</div>
							
							<div class="image">
								<a class="panel-heading accordion-toggle collapsed left" data-toggle="collapse"
								data-parent="#accordion1,#accordion2,#accordion3" data-target="#collapseTwo">
									<div class="title_bu" id="bu2">
										<img alt="" src="" class="img-responsive imgtransform">
										<div class="title" >Tournament</div>
									</div>
								</a>
							</div>
						</div>
						<div class="panel-group" id="accordion1" style="background-color: transparent;">
							<div class="panel panel-default">
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="col-md-5">
										<!-- PANEL HEADLINE -->
										<h4>Bio</h4>
										<div class="panel panel-headline" style="border-radius: 15px;">
											<div class="panel-body">
												<div class="row" style="margin-left: 5%;">
												<br>
												<p>Name Abraham Claire</p>
												<br>
												<p>Country Indonesia</p>
												<br>
												<p>Gender Male</p>
												<br>
												<p>Email nongski@nongski.com</p>
												<br>
												<p>Phone n/a</p>
												<br>
												</div>
											</div>
										</div>
										<!-- PANEL HEADLINE -->
									</div>
									<!-- END PANEL HEADLINE -->
									<div class="col-md-7">
										<!-- PANEL NO PADDING -->
										<div class="row">
											<div class="col-md-6">
												<h4>Friends</h4>
											<div class="panel" style="border-radius: 15px;">
											<div class="panel-heading padding-top-30 padding-bottom-30">
												<center>
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center; ">
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
												<img src="{{ asset('assets/img/user3.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
												<img src="{{ asset('assets/img/favicon.png') }}" width="20%"  style="border-radius: 50px; align-items: center;">
												</center>
											</div>
										</div>
										</div>
										<div class="col-md-6">
											<h4>Status</h4>
											<div class="panel" style="border-radius: 15px;">
											<div class="panel-heading padding-top-30 padding-bottom-30">
												<p>It is a long  established fact theme that machine</p>
											</div>
										</div>
										</div>
									</div>
										<!-- END PANEL NO PADDING -->
										<!-- PANEL NO PADDING -->
										<h4 style="margin-bottom: -4%;">Teams</h4>
										<div class="panel" style="margin-top: 5%; border-radius: 15px;">
											<div class="panel-heading padding-top-30 padding-bottom-30">
												<div class="row">
													<div class="col-md-5" style="background-color: #25254F; margin-left: 5%; border-radius: 15px;">
														<div class="row">
															<div class="col-md-5">
																<img src="{{ asset('assets/img/c9.png') }}" width="70%" height="70%" >
																<a class="btn btn-primary" href="#" role="button" style="margin-bottom: 5%; border-radius: 10px; border: none; color: white;width: 100px;">View Team</a>
															</div>
															<div class="col-md-7">
																<b><h4 style="font-weight: bold;">Cloud 9</h4></b>
																<h5>It is a long established fact theme that machine</h5>
															</div>
														</div>			
													</div>
													&nbsp;
													<div class="col-md-5" style="background-color: #25254F; margin-left: 5%; border-radius: 15px;">
														<div class="row">
															<div class="col-md-5">
																<img src="{{ asset('assets/img/navi.png') }}" width="70%" height="70%" >
																<a class="btn btn-primary" href="#" role="button" style="margin-bottom: 5%; border-radius: 10px; border: none; color: white;width: 100px;">View Team</a>
															</div>
															<div class="col-md-7">
																<b><h4 style="font-weight: bold;">Cloud 9</h4></b>
																<h5>It is a long established fact theme that machine</h5>
															</div>
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
							<div class="panel panel-default" style="background-color: transparent; border: none;">
								<div id="collapseTwo" class="panel-collapse collapse in">
									<div class="container-fluid" >
										<div class="table-responsive">          
										<table class="table" style="background-color: transparent;">
											<thead>
											<tr>
												<th>Game</th>
												<th>Name</th>
												<th>Date</th>
												<th>Team</th>
												<th>Participants</th>
												<th>Status</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Mobile Legend</td>
												<td>ML Nongski Tournament</td>
												<td>August 13, 2020 @3:00 am</td>
												<td>Liquor</td>
												<td>164 participants</td>
												<td>winner</td>
											</tr>
											<tr>
												<td>Mobile Legend</td>
												<td>ML Nongski Tournament</td>
												<td>August 13, 2020 @3:00 am</td>
												<td>Liquor</td>
												<td>164 participants</td>
												<td>winner</td>
											</tr>
												<tr>
												<td>Mobile Legend</td>
												<td>ML Nongski Tournament</td>
												<td>August 13, 2020 @3:00 am</td>
												<td>Liquor</td>
												<td>164 participants</td>
												<td>winner</td>
											</tr>
											<tr>
												<td>Mobile Legend</td>
												<td>ML Nongski Tournament</td>
												<td>August 13, 2020 @3:00 am</td>
												<td>Liquor</td>
												<td>164 participants</td>
												<td>winner</td>
											</tr>
											</tbody>
										</table>
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
		</div> --}}
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
	<script src="{{ asset('assets/vendor/toastr/toastr.min.js') }}"></script>
</body>

</html>
