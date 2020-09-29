@extends('admin.main')
@section('title','Tournament Create')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">{{$events->title}}</h3>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block p-5">
                        <div id="bracket"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
@push('tooltip')
    <!-- Date Picker -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.bracket.min.js') }}"></script>
    <script>
        var minimalData = {
            teams: [
                // ["Team 1", "Team 2"],
                // ["Team 3", "Team 4"],
                // ["Team 5", "Team 6"],
                // ["Team 7", "Team 8"]
                @foreach($matches as $match)
                    ["{{$match->team_a}}", "{{$match->team_b}}"],
                @endforeach
                @if(count($matches) % 2 != 0)
                    [null, null] 
                @endif
            ],
            results: [
                [
                    [1,2],
                    [2,1],
                    [3,0]
                ],
                [
                    [1,2]
                ],
                [
                    [3,0]
                ]
            ]
        }
        var resizeParameters = {
            teamWidth: 100,
            scoreWidth: 50,
            matchMargin: 75,
            roundMargin: 85,
            init: minimalData
        };

        $(function () {
            $('#bracket').bracket(resizeParameters)
        })
    </script>
    <script src="assets/js/main.js"></script>
@endpush
