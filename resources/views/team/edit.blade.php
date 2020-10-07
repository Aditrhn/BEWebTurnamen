@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Container -->
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="{{ URL::route('profile.update',Auth::guard('player')->check()) }}" method="POST" enctype="multipart/form-data">
                    <!-- {{-- Team Name --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="team-name">Name</label>
                        <input type="text" class="form-control" id="teamName" name="team-name" value="">
                    </div>
                    <!-- {{-- Team Tag --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="team-tag">Team Tag</label>
                        <input type="text" class="form-control" id="teamTag" name="address" value="">
                    </div>

                    <!-- {{-- Team Logo --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="team-logo">Team Logo</label>
                            <input type="file" class="custom-file-input" id="teamLogo" aria-describedby="inputGroupFileAddon01" value="" name="ava_url">
                            <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                    </div>
                    <!-- {{-- Description --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description-edit-team" cols="3" rows="10" value=""></textarea>
                    </div>
                    <!-- Advanced Option -->
                    <div class="panel-group">
                        <div class="form-group" id="scrollform-edit-team">
                            <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <input type="checkbox"/> Advanced Setting
                            </label>
                            </div>
                        </div>
                        <div id="collapseOne" aria-expanded="false" class="collapse">
                            <div id="sponsor_fields">

                            </div>
                            <div class="well">
                                <div class="form-group" id="scrollform-edit-team">
                                    <div class="checkbox" id="enableSponsor">
                                        <label><input type="checkbox" value="">Enable Sponsor</label>
                                        <p>Sponsor #1</p>
                                    </div>
                                </div>
                                <!-- {{-- City --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-city">City</label>
                                    <input type="text" class="form-control" id="teamCity" name="address" value="">
                                </div>
                                <!-- {{-- Sponsor Logo --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-sponsor-logo">Sponsor Logo</label>
                                    <input type="file" class="custom-file-input" id="teamSponsorLogo" aria-describedby="inputGroupFileAddon01" value="" name="ava_url">
                                    <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                </div>
                                <div class="clear"></div>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Aad More Sponsor</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BUTTON -->
                    <div class="col-md-6" id="button-editprofile">
                        <button class="btn btn-primary" id="btnsubmit_editprofile" type="submit"
                        >Save</button>
                        <a class="btn btn-primary" id="btnsubmit_editprofile" href="{{ URL::route('profile') }}" role="button"
                        >Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
@endsection