@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Container -->
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="{{ URL::route('team.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- {{-- Team Name --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="team-name">Team Name</label>
                        <input type="text" class="form-control" id="team-name" name="teamName"
                            value="{{ $team->name }}">
                    </div>
                    <!-- {{-- Team Logo --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="team-logo">Team Logo</label>
                        <input type="file" class="custom-file-input" id="teamLogo"
                            aria-describedby="inputGroupFileAddon01"
                            value="{{ asset('/images/team_logo/'. $team->logo_url) }}"
                            name="logo_url">
                        <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                    </div>
                    <!-- {{-- Description --}} -->
                    <div class="form-group" id="scrollform-edit-team">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="teamDesc" id="description-edit-team" cols="3" rows="7"
                            value="">{{ $team->description }}</textarea>
                    </div>
                    <!-- Advanced Option -->
                    <div class="panel-group">
                        <div class="form-group" id="scrollform-edit-team">
                            <div class="checkbox">
                                <label data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    <p style="margin : 0px">Advanced Setting</p>
                                </label>
                            </div>
                        </div>
                        <div id="collapseOne" aria-expanded="false" class="collapse">
                            <div class="input-group-btn">
                                <button class="btn btn-primary pull-right" type="button" onclick="education_fields();"
                                    style="margin-bottom: 10px">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                                    Sponsor</button>
                            </div>
                            @if($count == 0)
                                <div class="well">
                                    <div class="form-group" id="scrollform-edit-team">
                                        <div class="checkbox" id="enableSponsor">
                                            <label><input type="checkbox" id="sponsor" value="">Enable Sponsor</label>
                                            <p>Sponsor #1</p>
                                        </div>
                                    </div>
                                    <!-- {{-- Sponsor Name --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-nama-sponsor">Sponsor Name</label>
                                        <input type="text"
                                            class="form-control @error('sponsorName') is-invalid @enderror"
                                            id="namaSponsor" name="sponsorName" value="">
                                    </div>
                                    <!-- {{-- Sponsor Logo --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-sponsor-logo">Sponsor Logo</label>
                                        <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                            aria-describedby="inputGroupFileAddon01" value="" name="sponsor_url">
                                        <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            @else
                                @foreach($sponsor as $sponsors)
                                    <?php $i = 1 ?>
                                    <div class="well">
                                        <div class="form-group" id="scrollform-edit-team">
                                            <div class="checkbox" id="enableSponsor">
                                                <label><input type="checkbox" id="sponsor" value="">Enable
                                                    Sponsor</label>
                                                <p>Sponsor #{{ $i }}</p>
                                            </div>
                                        </div>
                                        <!-- {{-- Sponsor Name --}} -->
                                        <div class="form-group" id="scrollform-edit-team">
                                            <label for="team-nama-sponsor">Sponsor Name</label>
                                            <input type="text"
                                                class="form-control @error('sponsorName') is-invalid @enderror"
                                                id="namaSponsor" name="sponsorName" value="{{ $sponsors->name }}">
                                        </div>
                                        <!-- {{-- Sponsor Logo --}} -->
                                        <div class="form-group" id="scrollform-edit-team">
                                            <label for="team-sponsor-logo">Sponsor Logo</label>
                                            <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                                aria-describedby="inputGroupFileAddon01"
                                                value="{{ $sponsors->logo_url }}" name="sponsor_url">
                                            <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <?php $i++ ?>
                                @endforeach
                            @endif
                            <div id="sponsor_fields">

                            </div>
                        </div>
                    </div>
                    <!-- BUTTON -->
                    <div class="col-md-6" id="button-editprofile">
                        <input type="hidden" name="teamId" value="{{ $team->id }}">
                        <button class="btn btn-primary" id="btnsubmit_editprofile" type="submit">Save</button>
                        <a class="btn btn-primary" id="btnsubmit_editprofile"
                            href="{{ URL::route('team') }}" role="button">Cancel</a>
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
<script>
    var room = 1;
    function education_fields() {

        room++;
        var objTo = document.getElementById('sponsor_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="well"><div class="form-group" id="scrollform-edit-team"><div class="checkbox" id="enableSponsor"><label><input type="checkbox" id="sponsor" value="">Enable Sponsor</label><p>Sponsor #' +
            room +
            '</p></div></div><div class="form-group" id="scrollform-edit-team"><label for="team-nama-sponsor">Sponsor Name</label><input type="text"class="form-control"id="namaSponsor" name="sponsorName" value=""></div><div class="form-group" id="scrollform-edit-team"><label for="team-sponsor-logo">Sponsor Logo</label><input type="file" class="custom-file-input" id="teamSponsorLogo" aria-describedby="inputGroupFileAddon01" value="" name="ava_url"><p>*Biarkan kosong jika tidak ingin mengganti gambar</p></div><div class="clear"></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+
            room +
            ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Delete Sponsor</button></div></div></div></div><div class="clear"></div></div>';

        objTo.appendChild(divtest)
    }

    function remove_education_fields(rid) {
        room-1;
        $('.removeclass' + rid+room).remove();
    }

</script>
@endsection
