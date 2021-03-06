@extends('layouts.main')
@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <form action="{{ URL::route('checkout',$detail_payment->id) }}" method="GET">
                @csrf
                {{ csrf_field() }}
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
                <div class="col-md-4">
                    <button class="col-md-12 btn btn-success btn-block btn-lg" type="submit"  id="pay-button">Pay Now</button>
                    {{-- <a href="{{ URL::route('checkout',$detail_payment->id) }}" class="col-md-12 btn btn-success btn-block btn-lg">Pay Now</a> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('wizard')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ \env('MIDTRANS_CLIENTKEY') }}"></script>
{{-- <script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('', {
          // Optional
            onSuccess: function(result){
                /* You may add your own js here, this is just example */ window.location = "../payment-success"; document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
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
</script> --}}
@endpush
