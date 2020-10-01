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
                        <form action="{{ URL::route('profile.update',Auth::guard('player')->check()) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_token() }}
                            @method('put')
                            @csrf
                            {{-- Name --}}
                            <div class="form-group" id="scrollform-teamcreate">
                                <label for="name">Name</label>
                                <input type="full_name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" value="{{ Auth::guard('player')->user()->name }}">
                            </div>
                            {{-- Address --}}
                            <div class="form-group" id="scrollform-teamcreate">
                                <label for="address">Location</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" name="address" value="{{ Auth::guard('player')->user()->address }}">
                            </div>
                            {{-- Contact --}}
                            <div class="form-group" id="scrollform-teamcreate">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="exampleInputEmail1" name="contact" value="{{ Auth::guard('player')->user()->contact }}">
                            </div>
                            {{-- City --}}
                            <div class="form-group" id="scrollform-teamcreate">
                                <label for="city">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleInputEmail1" name="city" value="{{ Auth::guard('player')->user()->city }}">
                            </div>
                            <div class="form-group" id="scrollform-teamcreate">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control @error('gender') is-invalid @enderror" id="exampleInputEmail1" name="gender" value="{{ Auth::guard('player')->user()->gender }}">
                            </div>

                            {{-- Avatar --}}
                            <label for="upload_avatar" id="avatar" > Avatar</label>
                            <div class="input-group" id="upload_avatar">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupavatar"
                                        aria-describedby="inputGroupFileAddon01">
                                </div>
                            </div>
                            {{-- Status --}}
                            <div class="form-group" id="formgroup-teamcreate">
                                <label for="status" id="scrollform-teamcreate">Status</label>
                                <input type="status" class="form-control" id="description-teamcreate" name="status" value="{{ Auth::guard('player')->user()->status }}">
                            </div>
                            <div class="col-md-6" id="button-editprofile">
                                <button class="btn btn-primary" id="btnsubmit_editprofile" type="submit"
                                >Save</button>
                                <a class="btn btn-primary" id="btnsubmit_editprofile" href="{{ URL::route('profile') }}" role="button"
                                >Cancel</a>
                            </div>
                        </form>
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
