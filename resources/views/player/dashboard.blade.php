@extends('layouts.main')
@section('main')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<!--carousel-->
				<div class="container-fluid">
					<div class="row">
						<div class="row">
							<div class="col-md-9" >
								<h3 class="head-text">
									Tournament By Game</h3>
							</div>
							<!-- Control

							<div class="col-md-3">
								<div class="controls team-control-btn pull-right">
									<a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel"
										data-slide="prev"></a>
									<a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel"
											data-slide="next"></a>
								</div>

							</div> -->
						</div>
						<div class="col-md-12"><!--Class utama Carousel "carousel-landing"-->
							<div id="Carousel" class="carousel slide">					 
							<!-- Carousel items -->
								<div class="carousel-inner">
									<div class="item active">
										<div class="row rowDashboard">
												<div class="case-landing landing1" style="background-image: url('https://duniaesports.org/wp-content/uploads/2019/12/t_5dd64b08483f2.jpg');">
													<div class="case-landing__overlay">
													   <h2 class="case-landing__title">Mobile Legend</h2>
													</div>
												</div>
												<div class="case-landing landing1" style="background-image: url('https://pantau.tekape.id/wp-content/uploads/2020/08/t_5e607879bbfa8.jpg');">
													<div class="case-landing__overlay">
													   <h2 class="case-landing__title">Free Fire</h2>
													</div>
												</div>
												<div class="case-landing landing1" style="background-image: url('https://pbs.twimg.com/profile_images/1083705443132690433/6j9H0Dxl_400x400.jpg');">
													<div class="case-landing__overlay">
													   <h2 class="case-landing__title">PUBG</h2>
													</div>
												</div>
											
										</div><!--.row-->
									</div>
									<!--
									<div class="item">
										<div class="row">
											<div class="case-landing landing1">
												<div class="case-landing__overlay">
													<h2 class="case-landing__title">Apex Legends</h2>
												</div>
											</div>
											<div class="case-landing landing1">
												<div class="case-landing__overlay">
													<h2 class="case-landing__title">Apex Legends</h2>
												</div>
											</div>
											<div class="case-landing landing1">
												<div class="case-landing__overlay">
													<h2 class="case-landing__title">Apex Legends</h2>
												</div>
											</div>
										</div>
									</div>
									-->
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
							<!-- Controls Carousel
							<div class="col-md-3">
								<div class="controls team-control-btn pull-right">
									<a class="left glyphicon glyphicon-triangle-left team_columns_carousel_control_icons" href="#Carousel-Feature"
										data-slide="prev"></a>
									<a class="right glyphicon glyphicon-triangle-right team_columns_carousel_control_icons" href="#Carousel-Feature"
											data-slide="next"></a>
								</div>
							</div> -->
						</div>
						<div class="col-md-12"> <!--Class utama Carousel "carousel-landing"-->
							<div id="Carousel-Feature" class="carousel slide">					 
							<!-- Carousel items -->
								<div class="carousel-inner">
									<div class="item active">
										<div class="item active">
											<div class="row rowDashboard">
												<div class="case-landing landing2" style="background-image: url('https://duniaesports.org/wp-content/uploads/2019/12/t_5dd64b08483f2.jpg');">
													<div class="case-landing__overlay">
													   <h2 class="case-landing__title">Mobile Legend Squad Yogyakarta</h2>
													</div>
												</div>
												<div class="case-landing landing2" style="background-image: url('https://pantau.tekape.id/wp-content/uploads/2020/08/t_5e607879bbfa8.jpg');">
													<div class="case-landing__overlay">
													   <h2 class="case-landing__title">Free Fire Kualifikasi Daerah</h2>
													</div>
												</div>
												<div class="case-landing landing2" style="background-image: url('https://pbs.twimg.com/profile_images/1083705443132690433/6j9H0Dxl_400x400.jpg');">
													<div class="case-landing__overlay">
													   <h2 class="case-landing__title">PUBG Nasional Invitation</h2>
													</div>
												</div>
											
											</div><!--.row-->
										</div>
									</div>
									<!--.item
									<div class="item">
										<div class="row">
											<div class="case-landing landing1">
												<div class="case-landing__overlay">
													<h2 class="case-landing__title">Apex Legends</h2>
												</div>
											</div>
											<div class="case-landing landing1">
												<div class="case-landing__overlay">
													<h2 class="case-landing__title">Apex Legends</h2>
												</div>
											</div>
											<div class="case-landing landing1">
												<div class="case-landing__overlay">
													<h2 class="case-landing__title">Apex Legends</h2>
												</div>
											</div>
										</div>
									</div>
									-->
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
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
									</th>
									<th>
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
									</th>
									<th>
										<h4 class="text-versus">VS</h4>
									</th>
									<th>
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
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
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
									</th>
									<th>
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
									</th>
									<th>
										<h4 class="text-versus">VS</h4>
									</th>
									<th>
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
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
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
									</th>
									<th>
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
									</th>
									<th>
										<h4 class="text-versus">VS</h4>
									</th>
									<th>
										<img class="table-matchticker-img" alt="" src="assets/img/ML.png">
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
			</div>
			<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->
@endsection