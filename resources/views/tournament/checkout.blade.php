@extends('layouts.main')
@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            {{-- <form action="{{ URL::route('tournament.payment') }}" method="POST">
                @csrf
                {{ csrf_field() }} --}}
                <div class="col-md-12">
                    <!-- PANEL HEADLINE -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>{{ $detail_payment->team_name }} </span>Team</h3>
                            <h3 class="panel-title"><span>{{ $detail_payment->event_title }} </span>Tournament</h3>
                            <h3 class="panel-title"><span>{{ $detail_payment->price }} </span>Prices</h3>
                            <h3 class="panel-title"><span>{{ $detail_payment->captain }} </span>Pendaftar</h3>
                        </div>
                    </div>
                </div>
                @if ($team->status == "0")
                <div class="col-md-4">
                    <button class="col-md-12 btn btn-success btn-block btn-lg" type="button"  id="pay-button">Pay Now</a>
                </div>
                @else
                <div class="col-md-4">
                    <button class="col-md-12 btn btn-success btn-block btn-lg" type="button" disabled>Joined</a>
                </div>
                @endif
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
@push('wizard')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-dvB9iWeAP20Q61Ip"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
            onSuccess: function(result){
                /* You may add your own js here, this is just example */ window.location = "../response"; document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2); 
            },
            // Optional
            onPending: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
@endpush
