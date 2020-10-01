@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row" id="rowcreate">
                <div class="col-md-6">
                    <div class="form-group" id="scrollform-teamcreate">
                        <label for="exampleInputEmail1">Team Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1" id="scrollform-teamcreate">Team TAG</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>

                </div>
            </div>
            <label for="scrollform" id="scrollform-teamcreate">Game</label>
            <div id="custom-select">
                <select>
                    <option>Mobile Legend</option>
                    <option>PUBG</option>
                    <option>Apex Legend</option>
                    <option>DOTA</option>
                    <option>Point Blank</option>
                </select>
            </div>
            <div class="form-group" id="formgroup-teamcreate">
                <label for="exampleInputEmail1" id="scrollform-teamcreate">Description</label>
                <input type="email" class="form-control" id="description-teamcreate">
            </div>
            <a class="btn btn-primary" id="btnsubmitteamcreate" href="#" role="button">Submit</a>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
