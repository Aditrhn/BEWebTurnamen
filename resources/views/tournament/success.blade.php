@extends('layouts.main')
@section('main')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row rowSucces">
				<img alt=""  src="{{ asset('assets/img/ICON/succes.png') }}">
				<h3 class="fontSucces">Yey ! Your payment was successfull</h3>
				<h5 class="fontSucces">Your payment information has been sent to your email</h5>

				<a class="btn btn-xs btn-primary btnPaymentsucces" id="btnPaymentDone" href="{{ URL::route('tournament.overview',$tournament->id) }}">Done</a>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
	<!--Footer-->
	@include('layouts.footer')
</div>
<!-- END MAIN -->
@endsection
