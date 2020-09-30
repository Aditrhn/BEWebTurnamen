@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Container -->
        <div class="container-fluid">
            <div class="col-md-12">
                <ul class="nav nav-pills marginPils">
                    <li class="active pillsFriend"><a data-toggle="pill" href="#friendList">General</a></li>
                    <li class="pillsRequest"><a data-toggle="pill" href="#menu1" class="pillsFriend">Password</a></li>
                </ul>
            </div>
            <!--Konten Pills-->
            <div class="tab-content tabKonten">
                <div id="friendList" class="tab-pane fade in active">
                    <div class="col-md-12">
                        <div class="form-group" id="scrollform-teamcreate">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="full_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group" id="scrollform-teamcreate">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="user_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group" id="scrollform-teamcreate">
                            <label for="exampleInputEmail1">Location</label>
                            <input type="user_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group" id="scrollform-teamcreate">
                            <label for="exampleInputEmail1">City</label>
                            <input type="user_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <label for="upload_avatar" id="avatar" > Avatar</label>
                        <div class="input-group" id="upload_avatar">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupavatar"
                                    aria-describedby="inputGroupFileAddon01">
                            </div>
                        </div>
                        <div class="form-group" id="formgroup-teamcreate">
                            <label for="exampleInputEmail1" id="scrollform-teamcreate">Summary</label>
                            <input type="email" class="form-control" id="description-teamcreate">
                        </div>
                        <div class="col-md-6" id="button-editprofile">
                        <a class="btn btn-primary" id="btnsubmit_editprofile" href="#" role="button"
                            >Save</a>
                        <a class="btn btn-primary" id="btnsubmit_editprofile" href="#" role="button"
                            >Cancel</a>
                    </div>
                    </div>
                </div>

                <div id="menu1" class="tab-pane fade">
                    <div class="form-group" id="scrollform-teamcreate">
                        <label for="exampleInputEmail1">Recent Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group" id="scrollform-teamcreate">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group" id="scrollform-teamcreate">
                        <label for="exampleInputEmail1">Confirm New Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-md-6" id="button-editprofile">
                        <a class="btn btn-primary" id="btnsubmit_editprofile" href="#" role="button"
                            >Save</a>
                        <a class="btn btn-primary" id="btnsubmit_editprofile" href="#" role="button"
                            >Cancel</a>
                    </div>
                </div>
            </div>
            <!--End Konten Pills-->
        </div>
        <!-- End Container -->
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
