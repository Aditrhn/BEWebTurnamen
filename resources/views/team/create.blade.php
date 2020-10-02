@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <form action="{{ URL::route('team-create-success') }}" method="POST">
                @csrf
                <div class="row" id="rowcreate">
                    <div class="col-md-6">
                        <div class="form-group" id="scrollform-teamcreate">
                            <label for="exampleInputEmail1">Team Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="teamName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="upload_avatar" id="avatar"> Team Logo (optional)</label>
                        <div class="input-group" id="upload_logo_team">
                            <div class="custom-file" id="browse">
                                <input type="file" class="custom-file-input @error('ava_url') is-invalid @enderror"
                                    id="inputGroupavatar" aria-describedby="inputGroupFileAddon01"
                                    value="{{ asset('/images/avatar/'. Auth::guard('player')->user()->ava_url) }}"
                                    name="logo_url">

                            </div>
                        </div>
                    </div>
                </div>
                <label for="scrollform" id="scrollform-teamcreate">Game</label>
                <div id="custom-select">
                    <select name="teamGame">
                        @forelse($games as $item)
                            <option>{{ $item->name }}</option>
                        @empty
                            <p>Belum ada game yang bisa dipilih.</p>
                        @endforelse
                    </select>
                </div>
                <div class="form-group" id="formgroup-teamcreate">
                    <label for="exampleInputEmail1" id="scrollform-teamcreate">Description</label>
                    <input type="text" class="form-control" id="description-teamcreate" name="teamDesc">
                </div>
                <button class="btn btn-primary" id="btnsubmitteamcreate" href="#" role="button" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
