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
                            <?php $j = 0 ?>
                            @for ($i = 1; $i <= 4; $i++)
                            <div class="col-lg-6 col-xs-12">
                                <div class="well">
                                    <div class="form-group" id="scrollform-edit-team">
                                        <div class="checkbox" id="enableSponsor">
                                            <label><input type="checkbox" id="sponsor" value="" name="enable_sponsor{{$i}}">Enable
                                                Sponsor</label>
                                            <p>Sponsor #{{$i}}</p>
                                        </div>
                                    </div>
                                    <!-- {{-- Sponsor Name --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-nama-sponsor">Sponsor Name</label>
                                        <input type="text" class="form-control @error('sponsorName') is-invalid @enderror" id="namaSponsor" name="sponsorName{{$i}}" 
                                        @if ($count > $j && $count <= 4) value="{{ $sponsor[$j]->name }}" @endif  >
                                    </div>
                                    <!-- {{-- Sponsor Logo --}} -->
                                    <div class="form-group" id="scrollform-edit-team">
                                        <label for="team-sponsor-logo">Sponsor Logo</label>
                                        <input type="file" class="custom-file-input" id="teamSponsorLogo"
                                            aria-describedby="inputGroupFileAddon01" 
                                            @if ($count > $j && $count <= 4) value="{{ $sponsor[$j]->name }}" @endif  name="sponsor_url{{$i}}">
                                        <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                                    </div>
                                    @if ($count > $j && $count <= 4)
                                        <input type="hidden" name="sponsor_id1" value="{{$sponsor[$j]->id}}">
                                    @endif
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <?php $j++ ?>
                            @endfor
                            <div id="sponsor_fields">
                            </div>
                        </div>
                    </div>
                    <!-- BUTTON -->
                    <div class="col-md-6" id="button-editprofile" style="padding-left: 0px">
                        <input type="hidden" name="teamId" value="{{ $team->id }}">
                        <button class="btn btn-primary" id="btnsubmit_editprofile" type="submit">Save</button>
                        <a class="btn btn-danger" id="btnsubmit_editprofile"
                            href="{{ URL::route('team') }}" role="button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- END MAIN CONTENT -->
    <!--Footer-->
	@include('layouts.footer')
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
@endsection
