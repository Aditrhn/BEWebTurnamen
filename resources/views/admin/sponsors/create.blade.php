@extends('admin.main')
@section('title','Game Create')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Create Sponsors</h3>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 pt-3 pb-3" style="background-color: white; border-radius: 10px;">
                        <form action="{{ URL::route('sponsors.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Sponsors Name</label>
                                <input type="text" placeholder="Input name of sponsor"
                                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class=" form-group">
                                    <label for="file-multiple-input" class=" form-control-label">Logo</label>
                                    <div>
                                        <input type="file" id="icon_url" name="logo_url" multiple=""
                                            class="form-control-file border rounded">
                                    </div>
                                </div>
                                @error('logo_url')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="row">                                
                                <div class="col-md-2">
                                    <input class="btn btn-success" type="submit" value="Save Changes"
                                        style="width: 100%;">
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ url('super/sponsors') }}" class="btn btn-outline-primary">Go back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card-footer text-muted">
        <a href="{{ url('super/game') }}" class="btn btn-outline-primary">Go back</a>
    </div> --}}
</div><!-- .content -->

@endsection
