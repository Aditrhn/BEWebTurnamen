@extends('admin.main')
@section('title','Matches')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">{{$event->title}}</h3>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ URL::route('event.show',$event->id) }}">back</a>
                    </div>
                    <div class="card-body card-block p-5">
                        <form action="{{ URL::route('match.store',$event->id) }}"
                            method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="round">
                                        <input type="full_name"
                                            class="form-control @error('round_number') is-invalid @enderror"
                                            id="exampleInputEmail1" name="round_number"
                                            value="{{ old('round_number') }}"
                                            placeholder="Round Number">
                                        @error('round_number')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group date" id="date">
                                            <input type="text" id="date" class="form-control datepicker-here" name="date"
                                            data-language="en" data-date-format="yyyy-mm-dd" data-timepicker="true"
                                            data-time-format='hh:ii:00' placeholder="date and time"/>
                                        @error('date')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($event->bracket_type == '2') 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="round">
                                        <select name="bracket" id="exampleInputEmail1" class="form-control @error('bracket') @enderror">
                                            <option disabled selected>bracket</option>
                                            <option value="1">winner bracket</option>
                                            <option value="2">loser bracket</option>
                                            <option value="3">final round</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row mt-3">
                                <div class="col-md-5">
                                    <div class="form-group" id="match_number">
                                        <select name="team_a" id="exampleInputEmail1" class="form-control @error('team_a') @enderror">
                                            <option disabled selected>TEAM A</option>
                                            {{-- @if ($team == $match)
                                                @foreach ($team as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($team as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif --}}
                                            @foreach ($team as $item)
                                                {{-- @if ($item == 'selected') --}}
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                {{-- @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif --}}
                                            @endforeach
                                        </select>
                                        {{-- <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="TEAM A"> --}}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <center>
                                        <h2>VS</h2>
                                    </center>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group" id="match_number">
                                        <select name="team_b" id="exampleInputEmail1" class="form-control">
                                            <option disabled selected>TEAM B</option>
                                            @foreach ($team as $item)
                                            {{-- @if ($item == 'selected') --}}
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            {{-- @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif --}}
                                            @endforeach
                                        </select>
                                        {{-- <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="TEAM B"> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <button type="submit">save</button> --}}
                            <button type="submit" class="btn btn-primary float-right mt-3" id="btnsubmit_editprofile"
                                role="button">Save &
                                Continue</button>
                            <!-- /.card-right -->
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body card-block p-5">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Round Number</th>
                                    <th scope="col">Match Number</th>
                                    <th scope="col">Team A</th>
                                    <th scope="col">Team B</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($match as $item)
                                    <tr>
                                        <th scope="row"></th>
                                        <th scope="row"></th>
                                        <td>{{ $item->round_number }}</td>
                                        <td>{{ $item->match_number }}</td>
                                        <td>{{ $item->team_a }}</td>
                                        <td>{{ $item->team_b }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            <p><strong>Tidak ada match!!</strong></p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
        $('#date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
    </script>
    <script src="assets/js/main.js"></script>
@endpush
