@extends('admin.main')
@section('title','Tournament Edit')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Edit Tournament</h3>
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
                        <form action="{{ URL::route('event.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" class=" form-control-label">Tournament Name</label>
                                <input type="text" name="title" id="company" placeholder="Enter your tournament name"
                                    class="form-control" value="{{ $tempevent->title }}">
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
                            <select name="game" id="select" class="form-control">
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
                                    class="form-control" value="{{ $tempevent->participant }}">
                                @error('participant')
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
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="col col-md-3">
                                <label for="banner" class=" form-control-label">Banner</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="banner" class="form-control-file">
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
                                    <input type="text" class="form-control" name="start_date"
                                        value="{{ $tempevent->start_date }}">
                                </div>
                                @error('start_date')
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
                        <small class="form-text text-muted">(MM/DD/YYYY)</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class=" form-control-label">End Date</label>
                        <div class="input-group date" id="datetimepicker2">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" name="end_date"
                                value="{{ $tempevent->end_date }}">
                        </div>
                        <small class="form-text text-muted">(MM/DD/YYYY)</small>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12">
                    <label for="textarea-input" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-12">
                    <textarea name="description" id="textarea-input" rows="9" placeholder="Enter your description..."
                        class="form-control">{{ $tempevent->description }}</textarea>
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
        <div class="col-md-12 pt-3" style="background-color: white; border-radius: 10px;">
            <h4><strong>Details</strong></h4>
            <h5 class="mt-4">Registration Fee</h5>
            <div class="row mt-3">
                <div class="col-md-2 pb-2">
                    <button type="button" class="btn btn-outline-primary btn-md" style="width: 100%;">Free</button>
                </div>
                <div class="col-md-2 pb-2">
                    <button type="button" class="btn btn-outline-primary btn-md " style="width: 100%;">Paid</button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="fee" name="fee" class="form-control" placeholder="fee">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="prizepool" class=" form-control-label">Prizepool</label>
                <input type="text" id="prizepool" name="prizepool" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="row form-group pb-4">
                <div class="col col-md-12">
                    <label for="rules" class=" form-control-label">Rules</label>
                </div>
                <div class="col-12 col-md-12    ">
                    <textarea name="rules" id="rules" rows="5" class="form-control"></textarea>
                </div>
            </div>

        </div>
        <div class="col-md-12 pt-3" style="background-color: white; border-radius: 10px;">
            <h4><strong>Structure</strong></h4>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="size" class=" form-control-label">Size</label>
                        <input type="text" id="bracket_size" name="size" class="form-control">
                        <span class="help-block"></span></div>
                </div>
                <div class="col-md-6">
                    <div class=""><label for="bracket_type" class=" form-control-label">Format</label></div>
                    <div class="">
                        <select name="bracket_type" id="bracket_type" class="form-control">
                            <option value="0">Please select</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 pt-3 mt-3" style="background-color: white; border-radius: 10px;">
            <h4><strong>Registration</strong></h4>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" form-control-label">Registration Opening</label>
                        <div class="input-group date" id="datetimepicker3">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="registration_open">
                        </div>
                        <small class="form-text text-muted">ex. 99/99/9999</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" form-control-label">Registration Closing</label>
                        <div class="input-group date" id="datetimepicker4">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="registration_close">
                        </div>
                        <small class="form-text text-muted">ex. 99/99/9999</small>
                    </div>
                </div>
            </div>
            <div class="row form-group pb-4">
                <div class="col col-md-12"><label for="form_message" class=" form-control-label">Terms and
                        Agreement</label></div>
                <div class="col-12 col-md-12"><textarea name="form_message" id="form_message" rows="5"
                        class="form-control"></textarea></div>
            </div>
        </div>
        <div class="col-md-12">
            <input class="btn btn-success" type="submit" name="action" value="save">
            &nbsp;
            <input class="btn btn-success" type="submit" name="action" value="publish">
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->
@endsection
@push('tooltip')

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.en-CA.min.js">
    </script>
    <script>
        $('#datetimepicker1').datepicker({
            weekStart: 0,
            todayBtn: "linked",
            language: "es",
            orientation: "bottom auto",
            keyboardNavigation: false,
            autoclose: true
        });
        $('#datetimepicker2').datepicker({
            weekStart: 0,
            todayBtn: "linked",
            language: "es",
            orientation: "bottom auto",
            keyboardNavigation: false,
            autoclose: true
        });
        $('#datetimepicker3').datepicker({
            weekStart: 0,
            todayBtn: "linked",
            language: "es",
            orientation: "bottom auto",
            keyboardNavigation: false,
            autoclose: true
        });
        $('#datetimepicker4').datepicker({
            weekStart: 0,
            todayBtn: "linked",
            language: "es",
            orientation: "bottom auto",
            keyboardNavigation: false,
            autoclose: true
        });

    </script>
    <script src="assets/js/main.js"></script>
@endpush
