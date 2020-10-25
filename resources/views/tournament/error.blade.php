@extends('layouts.main')
@section('main')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row rowSucces">
				<img alt=""  src="assets/img/ICON/error.png">
				<h3 class="fontSucces">Oopps ! Something went wrong</h3>
				<h5 class="fontSucces">Your payment could not be processed</h5>

				<button class="btn btn-xs btn-primary btnPaymentsucces" id="btnRetry" href="#">Retry</button>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
