@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <!-- Container -->
    <div class="container-fluid">
		<div class="row" style="color: #fff; margin : 2%; font-size : 30px; text-align : center;">
		<label  for="">Team Invitation</label>
		</div>
        <div class="row">
			@forelse ($teams as $team)
				<div class="col-md-3 friend-page">
					<div class="panel panel-headline panel-friend-detail">
						<div class="panel-body">
							@if ($team->logo_url != null)
                  			  <img class="img-panel-friend" src="{{ asset('images/team_logo/'.$team->logo_url) }}">
                  			@else
                  			  <img class="img-panel-friend" src="{{ asset('images/avatars/default.png') }}">
                  			@endif
							<h4 class="panel-friend" data-toggle="modal">{{ $team->name }}</h4>
							<form action="{{ URL::route('team-accept') }}" method="POST">
								@csrf
								<div class="buttons col-md-6 btnRquest">
									<input type="hidden" name="teamAcc" value="{{ $team->id }}">
									<button class="btn btn-xs btn-primary" id="btnAccept" type="submit">Accept</button>
								</div>
							</form>
							<form action="{{ URL::route('team-decline') }}" method="POST">
								@csrf
								<div class="buttons col-md-6 btnRquest">
									<input type="hidden" name="teamDecline" value="{{ $team->id }}">
									<button class="btn btn-xs btn-unfriend" id="btnUnfriend" type="submit">Decline</button>
								</div>
							</form>
						</div>
					</div>
		    	</div>
			@empty
				<div class="panel-friend" style="color: #fff; margin : 15%; font-size : 30px; text-align : center;">
					<h4 style="opacity: 50%">No team invitation yet...</h4>
			  	</div>
			@endforelse
		</div>
    </div>
    <!-- End Container -->
  </div>
  <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection