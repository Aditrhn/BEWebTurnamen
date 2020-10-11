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
<<<<<<< Updated upstream
                            <div class="well">
                                <div class="form-group" id="scrollform-edit-team">
                                    <div class="checkbox" id="enableSponsor">
                                        <label><input type="checkbox" id="sponsor" value="" name="enable_sponsor1">Enable
                                            Sponsor</label>
                                        <p>Sponsor #1</p>
=======
                            @if($count == 0)
                            <div class="col-lg-6 col-xs-12">
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
>>>>>>> Stashed changes
                                    </div>
                                </div>
<<<<<<< Updated upstream
                                <!-- {{-- Sponsor Name --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-nama-sponsor">Sponsor Name</label>
                                    <input type="text" class="form-control @error('sponsorName') is-invalid @enderror"
                                        id="namaSponsor" name="sponsorName1"
                                        @if ($count > 0 && $count <= 4) value="{{ $sponsor[0]->name }}" @endif">
                                </div>
                                <!-- {{-- Sponsor Logo --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-sponsor-logo">Sponsor Logo</label>
                                    <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                        aria-describedby="inputGroupFileAddon01" 
                                        @if ($count > 0 && $count <= 4) value="{{ $sponsor[0]->name }}" @endif  name="sponsor_url1">
                                    <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                </div>
                                @if ($count > 0 && $count <= 4)
                                    <input type="hidden" name="sponsor_id1" value="{{$sponsor[0]->id}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Delete Sponsor
                                        </button>
=======
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="well">
                                    <div class="form-group" id="scrollform-edit-team">
                                        <div class="checkbox" id="enableSponsor">
                                            <label><input type="checkbox" id="sponsor" value="">Enable Sponsor</label>
                                            <p>Sponsor #2</p>
                                        </div>
                                    </div>
                                    <!-- {{-- Sponsor Name --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-nama-sponsor">Sponsor Name</label>
                                        <input type="text"
                                            class="form-control @error('sponsorName') is-invalid @enderror"
                                            id="namaSponsor" name="sponsorName" value="">
>>>>>>> Stashed changes
                                    </div>
                                @else
                                
                                @endif
                                <div class="clear"></div>
                            </div>
                            <div class="well">
                                <div class="form-group" id="scrollform-edit-team">
                                    <div class="checkbox" id="enableSponsor">
                                        <label><input type="checkbox" id="sponsor" value="" name="enable_sponsor2">Enable
                                            Sponsor</label>
                                        <p>Sponsor #2</p>
                                    </div>
                                </div>
<<<<<<< Updated upstream
                                <!-- {{-- Sponsor Name --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-nama-sponsor">Sponsor Name</label>
                                    <input type="text" class="form-control @error('sponsorName') is-invalid @enderror"
                                        id="namaSponsor" name="sponsorName2"
                                        @if ($count > 1 && $count <= 4) value="{{ $sponsor[1]->name }}" @endif>
                                </div>
                                <!-- {{-- Sponsor Logo --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-sponsor-logo">Sponsor Logo</label>
                                    <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                        aria-describedby="inputGroupFileAddon01" 
                                        @if ($count > 1 && $count <= 4) value="{{ $sponsor[1]->name }}" @endif name="sponsor_url2">
                                    <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                </div>
                                @if ($count > 1 && $count <= 4)
                                    <input type="hidden" name="sponsor_id2" value="{{$sponsor[1]->id}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Delete Sponsor
                                        </button>
=======
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="well">
                                    <div class="form-group" id="scrollform-edit-team">
                                        <div class="checkbox" id="enableSponsor">
                                            <label><input type="checkbox" id="sponsor" value="">Enable Sponsor</label>
                                            <p>Sponsor #3</p>
                                        </div>
                                    </div>
                                    <!-- {{-- Sponsor Name --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-nama-sponsor">Sponsor Name</label>
                                        <input type="text"
                                            class="form-control @error('sponsorName') is-invalid @enderror"
                                            id="namaSponsor" name="sponsorName" value="">
>>>>>>> Stashed changes
                                    </div>
                                @endif
                                <div class="clear"></div>
                            </div>
                            <div class="well">
                                <div class="form-group" id="scrollform-edit-team">
                                    <div class="checkbox" id="enableSponsor">
                                        <label><input type="checkbox" id="sponsor" value="" name="enable_sponsor3">Enable
                                            Sponsor</label>
                                        <p>Sponsor #3</p>
                                    </div>
                                </div>
<<<<<<< Updated upstream
                                <!-- {{-- Sponsor Name --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-nama-sponsor">Sponsor Name</label>
                                    <input type="text" class="form-control @error('sponsorName') is-invalid @enderror"
                                        id="namaSponsor" name="sponsorName3"
                                        @if ($count > 2 && $count <= 4) value="{{ $sponsor[2]->name }}" @endif>
                                </div>
                                <!-- {{-- Sponsor Logo --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-sponsor-logo">Sponsor Logo</label>
                                    <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                        aria-describedby="inputGroupFileAddon01"
                                        @if ($count > 2 && $count <= 4) value="{{ $sponsor[2]->name }}" @endif name="sponsor_url3">
                                    <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                </div>
                                @if ($count > 2 && $count <= 4)
                                    <input type="hidden" name="sponsor_id3" value="{{$sponsor[2]->id}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Delete Sponsor
                                        </button>
=======
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="well">
                                    <div class="form-group" id="scrollform-edit-team">
                                        <div class="checkbox" id="enableSponsor">
                                            <label><input type="checkbox" id="sponsor" value="">Enable Sponsor</label>
                                            <p>Sponsor #4</p>
                                        </div>
                                    </div>
                                    <!-- {{-- Sponsor Name --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-nama-sponsor">Sponsor Name</label>
                                        <input type="text"
                                            class="form-control @error('sponsorName') is-invalid @enderror"
                                            id="namaSponsor" name="sponsorName" value="">
>>>>>>> Stashed changes
                                    </div>
                                @endif
                                <div class="clear"></div>
                            </div>
                            <div class="well">
                                <div class="form-group" id="scrollform-edit-team">
                                    <div class="checkbox" id="enableSponsor">
                                        <label><input type="checkbox" id="sponsor" value="" name="enable_sponsor4">Enable
                                            Sponsor</label>
                                        <p>Sponsor #4</p>
                                    </div>
                                </div>
<<<<<<< Updated upstream
                                <!-- {{-- Sponsor Name --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-nama-sponsor">Sponsor Name</label>
                                    <input type="text" class="form-control @error('sponsorName') is-invalid @enderror"
                                        id="namaSponsor" name="sponsorName4"
                                        @if ($count > 3 && $count <= 4) value="{{ $sponsor[3]->name }}" @endif>
                                </div>
                                <!-- {{-- Sponsor Logo --}} -->
                                <div class="form-group" id="scrollform-edit-team">
                                    <label for="team-sponsor-logo">Sponsor Logo</label>
                                    <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                        aria-describedby="inputGroupFileAddon01" 
                                        @if ($count > 3 && $count <= 4) value="{{ $sponsor[3]->name }}" @endif name="sponsor_url4">
                                    <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                </div>
                                @if ($count > 3 && $count <= 4)
                                    {{-- <form action="{{URL::route('teamSponsor.delete')}}" method="POST" id="form4"> --}}
                                        @csrf
                                        <input type="hidden" name="sponsor_id4" value="{{$sponsor[3]->id}}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="submit" form="form4">
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Delete Sponsor
                                            </button>
=======
                            </div>
                                @else
                                @foreach($sponsor as $sponsors)
                                    <?php $i = 1 ?>
                                    <div class="well">
                                        <div class="form-group" id="scrollform-edit-team">
                                            <div class="checkbox" id="enableSponsor">
                                                <label><input type="checkbox" id="sponsor" value="">Enable
                                                    Sponsor</label>
                                                <p>Sponsor #4</p>
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
>>>>>>> Stashed changes
                                        </div>
                                    {{-- </form> --}}
                                @endif
                                <div class="clear"></div>
                            </div>
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
            '</p></div></div><div class="form-group" id="scrollform-edit-team"><label for="team-nama-sponsor">Sponsor Name</label><input type="text"class="form-control"id="namaSponsor" name="sponsorName" value=""></div><div class="form-group" id="scrollform-edit-team"><label for="team-sponsor-logo">Sponsor Logo</label><input type="file" class="custom-file-input" id="teamSponsorLogo" aria-describedby="inputGroupFileAddon01" value="" name="ava_url"><p>*Biarkan kosong jika tidak ingin mengganti gambar</p></div><div class="clear"></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
            room +
            ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Delete Sponsor</button></div></div></div></div><div class="clear"></div></div>';

        objTo.appendChild(divtest)
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }

</script>
@endsection
