@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul style="list-style-type: none">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ URL::route('team-store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{ csrf_token() }}
                <div class="row" id="rowcreate" style="margin-top: 0px">
                    <div class="col-md-6">
                        <div class="form-group" id="scrollform-teamcreate">
                            <label for="name">Team Name</label>
                            <input type="text" maxlength="20" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputEmail1" name="name" placeholder="Input your team name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="logo_url" id="avatar"> Team Logo (optional)</label>
                        <div class="input-group" id="upload_logo_team">
                            <div class="custom-file" id="browse" style="">
                                <input type="file" class="custom-file-input"
                                    id="inputGroupavatar" aria-describedby="inputGroupFileAddon01"
                                    value="{{ old('logo_url') }}"
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
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" id="desclabel">Description</label>
                    <textarea class="form-control" id="description-teamcreate" rows="3" name="teamDesc"></textarea>
                </div>
                <button class="btn btn-primary" id="btnsubmitteamcreate" href="#" role="button"
                    type="submit">Submit</button>
            </form>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <!--Footer-->
	@include('layouts.footer')
</div>
<!-- END MAIN -->
@endsection
