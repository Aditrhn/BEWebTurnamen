@extends('admin.main')
@section('title','Matches')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Lottery Matches</h3>
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
                        <form action="{{ URL::route('temporary-event.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="round">
                                        <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Round">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="match_number">
                                        <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Match Number">
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-5">
                                    <div class="form-group" id="match_number">
                                        <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="TEAM A">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <center>
                                        <h2>VS</h2>
                                    </center>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group" id="match_number">
                                        <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="TEAM B">
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary float-right mt-3" id="btnsubmit_editprofile" href="#"
                                role="button">Save &
                                Continue</a>
                            <!-- /.card-right -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
@push('tooltip')
    <!-- Date Picker -->
    <script src="{{ URL::asset('js/admin/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('js/admin/i18n/datepicker.en.js') }}"></script>
    <script>
        $('#start-date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $('#end-date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });

    </script>
    <script src="assets/js/main.js"></script>
@endpush
