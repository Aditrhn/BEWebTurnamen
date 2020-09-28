@extends('admin.main')
@section('title','Tournament Create')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Tournament</h3>
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
                ["Team 1", "Team 2"], /* first matchup */
                ["Team 3", "Team 4"] /* second matchup */   
            ],
            results: [
                [
                    [6, 2],
                    [3, 4]
                ], /* first round */
                [
                    [4, ],
                    [2, 1]
                ] /* second round */
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
