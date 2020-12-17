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
    @if(session('msg'))
    <div class="alert alert-success alert-dismissible fade show position-relativ" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('msg') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ URL::route('event.update-and-store',$tempevent->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                {{-- <input type="hidden" name="id" value="{{ $tempevent->id }}"> --}}
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
                <select name="game_id" id="select" class="form-control">
                    {{-- <option value="{{ $games->id }}">{{ $games->name }}</option> --}}
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ $game->id  ? 'selected' : ''}}>{{ $game->name }}</option>
                    @endforeach
                    {{-- <select class="js-states browser-default select2" name="shopping_id" required id="shopping_id">
                        @foreach($games as $shopping)
                            <option value="{{ $shopping->id }}" {{$shopping->id  ? 'selected' : ''}}>{{ $shopping->name}}</option>
                        @endforeach
                    </select> --}}
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-6">
                <div class="form-group">
                    <label for="participant" class=" form-control-label">Size Teams</label>
                    <input type="number" name="participant" id="city" placeholder="Enter your size team"
                        class="form-control @error('participant') is-invalid @enderror" value="{{ $tempevent->participant }}">
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
                <div class="col col-md-12">
                    <label for="banner_url" class=" form-control-label">Banner
                        <span style="color: red; scale: 0.4%;">
                            @error('banner_url')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </span>
                    </label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="banner_url" class="form-control-file @error('banner_url') is-invalid @enderror" value="{{ old('banner_url') }}">
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
                            data-time-format='hh:ii:00' value="{{ $tempevent->start_date }}" />
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
            <small class="form-text text-muted">(MM/DD/YYYY)</small>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class=" form-control-label">End Date</label>
            <div class="input-group date" id="datetimepicker2">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" id="end-date" class="form-control datepicker-here" name="end_date" data-language="en"
                    data-date-format="yyyy-mm-dd" data-timepicker="true" data-time-format='hh:ii:00'
                    value="{{ $tempevent->end_date }}" />
            </div>
            <small class="form-text text-muted">(MM/DD/YYYY)</small>
        </div>
    </div>
</div>
<div class="row form-group pb-4">
    <div class="col col-md-12">
        <label for="textarea-input" class=" form-control-label">Description</label>
    </div>
    <div class="col-12 col-md-12">
        @if ($tempevent->description != null)
        <textarea name="description" id="textarea-input" rows="5" placeholder="Enter your description..."
        class="form-control">{{ $tempevent->description }}</textarea>
        @else
        <textarea name="description" id="textarea-input" rows="5" placeholder="Enter your description..."
        class="form-control">{{ old('description') }}</textarea>
        @endif
    </div>
    @error('description')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
</div>
</div>
</div>
<div class="card">
    <div class="card-body">
        <h4><strong>Details</strong></h4>
        <h5 class="mt-4">Registration Fee</h5>
        <div class="input-group mt-3">
            <div class="input-group-prepend" id="button-addon3">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active" onclick="myFunction()">
                        <input type="radio" name="fee-option" id="paid" checked> free
                    </label>
                    <label class="btn btn-secondary" onclick="myFunction1()">
                        <input type="radio" name="fee-option" id="free"> paid
                    </label>
                </div>
            </div>
            <input type="text" name="fee" id="fee_paid" class="form-control" placeholder="fee" readonly
                value="{{ $tempevent->fee }}">
        </div>

        <div class="form-group">
            <label for="prizepool" class=" form-control-label">Prizepool</label>
            @if ($tempevent->prize_pool != null)
            <input type="text" id="prize_pool" name="prize_pool" class="form-control @error('prize_pool') is-invalid @enderror"
            value="{{ $tempevent->prize_pool }}">
            @else
            <input type="text" id="prize_pool" name="prize_pool" class="form-control @error('prize_pool') is-invalid @enderror"
            value="{{ old('prize_pool') }}">
            @endif
            <span class="help-block"></span>
            @error('prize_pool')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
        </div>
        <div class="row form-group pb-4">
            <div class="col col-md-12">
                <label for="rules" class=" form-control-label">Rules</label>
            </div>
            <div class="col-12 col-md-12">
                @if ($tempevent->rules != null)
                <textarea name="rules" id="rules" rows="5" class="form-control @error('rules') is-invalid @enderror">{{ $tempevent->rules }}</textarea>
                @else
                <textarea name="rules" id="rules" rows="5" class="form-control @error('rules') is-invalid @enderror">{{ old('rules') }}</textarea>
                @endif
                @error('rules')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4><strong>Structure</strong></h4>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class=""><label for="bracket_model" class=" form-control-label">Elimination</label></div>
                <div class="">
                    <select name="bracket_model" id="bracket_model" class="form-control @error('bracket_model') is-invalid @enderror">
                        <option value="group">Group & Knockout Elimination</option>
                        <option value="knockout">Knockout Elimination Only</option>
                    </select>
                </div>
                @error('bracket_model')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <div class=""><label for="bracket_type" class=" form-control-label">Format</label></div>
                <div class="">
                    <select name="bracket_type" id="bracket_type" class="form-control @error('bracket_type') is-invalid @enderror" onchange="bracketType()">
                        @if ($tempevent->bracket_type == null)
                        <option value="1">Single Elimination</option>
                        <option value="2">Double Elimination</option>
                        @else
                            @if ($tempevent->bracket_type == "1")
                            <option selected value="1">Single Elimination</option>
                            <option value="2">Double Elimination</option>
                            @else
                            <option value="1">Single Elimination</option>
                            <option selected value="2">Double Elimination</option>
                            @endif
                        @endif
                    </select>
                </div>
                @error('bracket_type')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
            {{-- <input type="checkbox" name="comeback[0]" value="0" /> --}}
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" {{ $tempevent->comeback ? 'checked' : '' }} type="checkbox" value="1" id="comeback" name="comeback" disabled="true">
                    <label class="form-check-label" for="comeback">
                      Comeback from Loser Bracket
                    </label>
                  </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4><strong>Registration</strong></h4>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label class=" form-control-label">Registration Opening</label>
                    <div class="input-group date" id="datetimepicker3">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" id="reg-open" class="form-control datepicker-here" name="registration_open"
                            data-language="en" data-date-format="yyyy-mm-dd" data-timepicker="true"
                            data-time-format='hh:ii:00' value="{{ $tempevent->registration_open }}" />
                    </div>
                    <small class="form-text text-muted">ex. 2020-12-21</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class=" form-control-label">Registration Closing</label>
                    <div class="input-group date" id="datetimepicker4">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" id="reg-close" class="form-control datepicker-here" name="registration_close"
                            data-language="en" data-date-format="yyyy-mm-dd" data-timepicker="true"
                            data-time-format='hh:ii:00' value="{{ $tempevent->registration_close }}" />
                    </div>
                    <small class="form-text text-muted">ex. 2020-12-21</small>
                </div>
            </div>
        </div>
        <div class="row form-group pb-4">
            <div class="col col-md-12"><label for="form_message" class=" form-control-label">Terms and
                    Agreement</label></div>
            <div class="col-12 col-md-12"><textarea name="form_message" id="form_message" rows="5"
                    class="form-control">{{ $tempevent->form_message }}</textarea></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col float-left text-left">
        <input class="btn btn-warning" type="submit" name="action" value="save">
        &nbsp;
        <input class="btn btn-success" type="submit" name="action" value="publish">
    </div>
</div>
</form>
<div class="col float-right text-right">
    <form action="{{ URL::route('event.destroy',$tempevent->id) }}" method="POST" class="badge">
        @method('delete')
        @csrf
        <button class="btn btn-danger" style="border-color: transparent; padding: 0;">
            <span class="badge badge-danger">Delete</span>
        </button>
    </form>
    {{-- <a class="btn btn-danger" href="{{ URL::route('event.destroy') }}">delete</a> --}}
</div>
{{-- <div class="col float-rigth text-right">
    <button class="btn btn-danger">delete</button>
</div> --}}
</div><!-- .content -->
@endsection
@push('tooltip')

    <!-- Date Picker -->
    <script src="{{ asset('js/admin/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/i18n/datepicker.en.js') }}">
    </script>
    <script>

        $('#start-date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $('#end-date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $('#reg-open').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $('#reg-close').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });

        function myFunction() {
            var x = document.getElementById("fee_paid");
            x.readOnly = true;
            x.value = 0;
        }

        function myFunction1() {
            var x = document.getElementById("fee_paid");
            x.readOnly = false;
        }

        function bracketType(){
            var x = document.getElementById("bracket_type").value;
            var y = document.getElementById("comeback");
            if (x === "1") {
                y.disabled = true;
                y.checked = false;
            } else {
                y.disabled = false;
            }
        }

    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
