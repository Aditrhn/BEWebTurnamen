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
                                    <div class="form-group" id="match_number">
                                        <input type="full_name" class="form-control @error('match_number') @enderror"
                                            id="exampleInputEmail1" name="match_number" placeholder="Match Number">
                                        @error('match_number')
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
                            <div class="row mt-3">
                                <div class="col-md-5">
                                    <div class="form-group" id="match_number">
                                        <select name="" id="exampleInputEmail1" class="form-control">
                                            <option disabled selected>TEAM A</option>
                                            <option value="1">siapa</option>
                                            <option value="2">siapanya</option>
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
                                        <select name="" id="exampleInputEmail1" class="form-control">
                                            <option disabled selected>TEAM B</option>
                                            <option value="1">siapa</option>
                                            <option value="2">siapanya</option>
                                        </select>
                                        {{-- <input type="full_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="TEAM B"> --}}
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right mt-3" id="btnsubmit_editprofile"
                                role="button">Save &
                                Continue</button> cek {{ $event->id }}
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
                                    <th scope="col">Round</th>
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
                                        <td>{{ $match->round_number }}</td>
                                        <td>{{ $match->match_number }}</td>
                                        <td>{{ $match->team_a }}</td>
                                        <td>{{ $match->team_b }}</td>
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
