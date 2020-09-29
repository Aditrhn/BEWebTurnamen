@extends('layouts.main')
@section('asset-toastr')
<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
@endsection
@section('main')
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<!-- Container -->
				<div class="container-fluid">
					<div class="col-md-12">
						<ul class="nav nav-pills marginPils">
							<li class="active pillsFriend"><a data-toggle="pill" href="#friendList">Friend List</a></li>
							<li class="pillsRequest"><a data-toggle="pill" href="#menu1" class="pillsFriend">Friend Request</a></li>
						</ul>
					</div>
					<!--Konten Pills-->
					<div class="tab-content tabKonten">
						<div id="friendList" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Atra</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Mystea</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">TehBotol</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Mang Ole</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
							</div>
							<!--Baris 2-->
							<div class="row">
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Odading</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Iron-men</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">IkanHui</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Makan</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
							</div>
							<!--Baris 3-->
							<div class="row">
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Tomat</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Goblog</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Odading</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
												<img class="img-panel-friend" src="assets/img/user3.png">
												<h4 class="panel-friend">Rasanya</h4>
												<div class="buttons col-md-12 btnAdd">
													<button class="btn btn-xs btn-primary" id="btnUnfriend" href="#">Unfriend</button>
												</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Panel Friend List -->
						</div>

						<div id="menu1" class="tab-pane fade">
							<div class="row">
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend" data-toggle="modal">Mystea</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend" data-toggle="modal">Atra</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">RRQ-Maniac</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend" data-toggle="modal">TehBotol</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Baris 2-->
							<div class="row">
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend" data-toggle="modal">Mystea</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">Atra</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">RRQ-Maniac</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">TehBotol</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Baris 3-->
							<div class="row">
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">Mystea</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">Atra</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">RRQ-Maniac</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 friend-page">
									<div class="panel panel-headline panel-friend-detail">
										<div class="panel-body">
											<img class="img-panel-friend" src="assets/img/user3.png">
											<h4 class="panel-friend">TehBotol</h4>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-primary" id="btnAccept" href="#">Accept</button>
											</div>
											<div class="buttons col-md-6 btnRquest">
												<button class="btn btn-xs btn-unfriend" id="btnUnfriend" href="#">Decline</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--End Konten Pills-->
				</div>
				<!-- End Container -->
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
@endsection