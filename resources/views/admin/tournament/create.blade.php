@extends('admin.main')
@section('title','Tournament Create')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Create Tournament</h3>
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
                        <form action="{{ URL::route('temporary-event.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
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
                                    {{-- <div class="alert alert-danger">{{ $message }}
                            </div> --}}
                            @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select a Games</label>
                        </div>
                        <div class="col-12 col-md-12">
                            <select name="game_id" id="select" class="form-control">
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="participant" class=" form-control-label">Size Teams</label>
                                <input type="number" name="participant" id="city" placeholder="Enter your size team"
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
                    <div class="col-6">
                        <div class="form-group">
                            <div class="col col-md-3">
                                <label for="banner_url" class=" form-control-label">Banner</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input disabled type="file" id="file-input" name="banner_url" class="form-control-file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <div class="form-group">
                            <label class=" form-control-label">Start Date</label>
                            <div class="input-group">
                                <div class="input-group date" id="datetimepicker1">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" id="start-date" class="form-control datepicker-here" name="start_date"
                                        data-language="en" data-date-format="yyyy-mm-dd" data-timepicker="true"
                                        data-time-format='hh:ii:00' />
                                </div>
                                @error('start_date')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            @enderror
                        </div>
                        <small class="form-text text-muted">(YYYY-MM-DD)</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class=" form-control-label">End Date</label>
                        <div class="input-group date" id="datetimepicker2">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="end-date" class="form-control datepicker-here" name="end_date"
                            data-language="en" data-date-format="yyyy-mm-dd" data-timepicker="true"
                            data-time-format='hh:ii:00' />
                        </div>
                        <small class="form-text text-muted">(YYYY-MM-DD)</small>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12">
                    <label for="textarea-input" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-12">
                    <textarea name="description" id="textarea-input" rows="9" placeholder="Enter your description..."
                        class="form-control"></textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- <div class="alert alert-danger">{{ $message }}
            </div> --}}
            @enderror
        </div>
        <div class="card-right float-right text-right">
            <input class="btn btn-primary" type="submit" value="Save and Continue" style="width: 100%;">
        </div><!-- /.card-right -->
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
    <script src="{{ asset('js/admin/datepicker.min.js')}}"></script>
    <script src="{{ asset('js/admin/i18n/datepicker.en.js')}}"></script>
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
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
