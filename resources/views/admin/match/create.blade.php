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
                            {{-- <div class="form-group">
                                <label for="title" class=" form-control-label">Tournament Name</label>
                                <input type="text" name="title" id="company" placeholder="Enter your tournament name"
                                    class="form-control">
                                @error('title')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="participant" class=" form-control-label">Size Teams</label>
                                        <input type="test" name="participant" id="city" placeholder="Enter your size team"
                                            class="form-control">
                                        @error('participant')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-right float-right text-right">
                                <input class="btn btn-primary" type="submit" value="Save and Continue"
                                    style="width: 100%;">
                            </div>
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
