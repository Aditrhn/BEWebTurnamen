@extends('layouts.main')
@section('asset-toastr')
<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
@endsection
@section('main')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="row rowSucces">
					<img alt="" src="assets/img/ICON/succes.png">
					<h3 class="fontSucces">Yey ! Your payment was successfull</h3>
					<h5 class="fontSucces">Your payment information has been sent to your email</h5>

					<button class="btn btn-xs btn-primary btnPaymentsucces" id="btnTeamview" href="#">Done</button>
				</div>
			</div>
		</div>
	<!-- END MAIN CONTENT -->
</div>
		<!-- END MAIN -->
@endsection
