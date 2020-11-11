@extends('layouts.main')
@section('notif')

@show
@section('main')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				@if(session('success'))
        		<div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
        		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		        <span aria-hidden="true">&times;</span>
        		    </button>
        		    {{ session('success') }}
				</div>
				@endif
				<!--carousel-->
				<div class="container-fluid">
					<div class="row">
						<div class="row">
							<div class="col-md-9" >
								<h3 class="head-text">
									Tournament By Game</h3>
							</div>
							<!-- Control-->

							<div class="col-md-3">
								<div class="controls team-control-btn pull-right">
									<a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel"
										data-slide="prev"></a>
									<a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel"
											data-slide="next"></a>
								</div>

							</div> 
						</div>
						<div class="carousel-landing">
							<div id="Carousel" class="carousel slide">
							<!-- Carousel items -->
								<div class="carousel-inner">
									<div class="item active" data-interval="false">
										<div class="col-md-12  rowDashboard">
											<?php $i = 1 ?>
											@forelse ($game as $games)
												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('{{ URL::asset('images/game_icon/'. $games->icon_url)}}'); background-color: black;">
														<div class="case-landing__overlay">
															<h2 class="case-landing__title">{{ $games->name }}</h2>
														</div>
													</div>
												</div>
												@if ($i == 3)
													<?php break; ?>
												@endif
												<?php $i++ ?>
											@empty
												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://duniaesports.org/wp-content/uploads/2019/12/t_5dd64b08483f2.jpg');">
														<div class="case-landing__overlay">
															<h2 class="case-landing__title">Mobile Legend</h2>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://id-test-11.slatic.net/p/88cd68df4f9451f7febafdc3543459e6.png');">
														<div class="case-landing__overlay">
															<h2 class="case-landing__title">Free Fire</h2>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://pbs.twimg.com/profile_images/1083705443132690433/6j9H0Dxl_400x400.jpg');">
														<div class="case-landing__overlay">
															<h2 class="case-landing__title">PUBG</h2>
														</div>
													</div>
												</div>
											@endforelse
										</div>
									</div>
									
									@if ($count > 3)
										<?php $sum = ceil($count/3); $k = 2 ?>
										@for ($i = 1; $i < $sum; $i++)
										<?php $j = 0 ?>
											<div class="item">
												<div class="col-md-12  rowDashboard">
													@foreach ($game as $key => $games)
														@if ($key <= $count-($count-$k))
															<?php continue; ?>
														@endif
														<div class="col-md-4">
															<div class="case-landing landing2" 
															style="background-image: url('{{ URL::asset('images/game_icon/'. $games->icon_url) }}'); 
															background-color: black;">
																<div class="case-landing__overlay">
																	<h2 class="case-landing__title">{{ $games->name }}</h2>
																</div>
															</div>
														</div>
														<?php $j++; $k++ ?>
														@if ($j == 3)
															<?php break; ?>
														@endif
													@endforeach
												</div>
											</div>
										@endfor
									@endif
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Carousel Feature Turnament-->
				<div class="container-fluid">
					<div class="row">
						<div class="row">
							<div class="col-md-9">
								<h3 class="head-text">
									Featured Tournament</h3>
							</div>
							<!-- Controls Carousel-->
							<div class="col-md-3">
								<div class="controls team-control-btn pull-right">
									<a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel-Feature"
										data-slide="prev"></a>
									<a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel-Feature"
											data-slide="next"></a>
								</div>
							</div> 
						</div>
						<div class="carousel-landing">
							<div id="Carousel-Feature" class="carousel slide">
							<!-- Carousel items -->
								<div class="carousel-inner">
									<div class="item active" data-interval="false">
										<div class="item active">
											<div class="col-md-12  rowDashboard">
												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://duniaesports.org/wp-content/uploads/2019/12/t_5dd64b08483f2.jpg');">
														<div class="case-landing__overlay">
														<h2 class="case-landing__title">Mobile Legend Nasional Invitation</h2>
														</div>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://id-test-11.slatic.net/p/88cd68df4f9451f7febafdc3543459e6.png');">
														<div class="case-landing__overlay">
														<h2 class="case-landing__title">Free Fire Kualifikasi Daerah</h2>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://pbs.twimg.com/profile_images/1083705443132690433/6j9H0Dxl_400x400.jpg');">
														<div class="case-landing__overlay">
														<h2 class="case-landing__title">PUBG Nasional Invitation</h2>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--.item -->
									<div class="item">
											<div class="col-md-12  rowDashboard">
												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://duniaesports.org/wp-content/uploads/2019/12/t_5dd64b08483f2.jpg');">
														<div class="case-landing__overlay">
														<h2 class="case-landing__title">Mobile Legend Squad Yogyakarta</h2>
														</div>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://id-test-11.slatic.net/p/88cd68df4f9451f7febafdc3543459e6.png');">
														<div class="case-landing__overlay">
														<h2 class="case-landing__title">Free Fire Kualifikasi Daerah</h2>
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="case-landing landing2" style="background-image: url('https://pbs.twimg.com/profile_images/1083705443132690433/6j9H0Dxl_400x400.jpg');">
														<div class="case-landing__overlay">
														<h2 class="case-landing__title">PUBG Nasional Invitation</h2>
														</div>
													</div>
												</div>
											</div><!--.row-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Carousel -->
				<div class="panel panel-default panel-matchticker">
					<div id="collapseTwo" class="panel-collapse collapse in">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6">
									<h3 class="head-Machticker">
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
				<!--Footer-->
				@include('layouts.footer')
			</div>
			<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->
@endsection


