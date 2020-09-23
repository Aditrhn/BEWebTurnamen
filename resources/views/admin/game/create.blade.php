@extends('admin.main')
@section('main')
<div class="row m-0">
  <div class="col-sm-12">
      <div class="float-left">
          <div class="page-title">
              <h3 class="pt-2">Create Game</h3>
          </div>
      </div>
  </div>
</div>

<div class="content">
  <div class="col-md-12 pt-3 pb-3" style="background-color: white; border-radius: 10px;">
      <form action="{{ URL::route('game.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-group"><label for="name" class=" form-control-label">Game Name</label>
            <input type="text" placeholder="Input name of game" class="form-control @error('name') is-invalid @enderror" id="name" name="name" name="name" value="{{ old('name')}}">
            @error('name')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{-- <strong>{{ $message }}</strong> --}}
              {{ $message }}
              <div type="button" class="close" data-dismiss="alert">
                {{-- <span aria-hidden="true">&times;</span>               --}}
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
              </svg>
            </div>
            </div>
              {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
            @enderror
          </div>
        </div>
        <label for="platform" class=" form-control-label">Select Platform</label>
        <div class="mb-3">
              <select name="platform" id="platform" class="form-control">
                  <option value="0">Select game Platform</option>
                  <option value="1">Option #1</option>
                  <option value="2">Option #2</option>
                  <option value="3">Option #3</option>
              </select>
            </div>
            @error('platform')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{-- <strong>{{ $message }}</strong> --}}
                {{ $message }}
                <div type="button" class="close" data-dismiss="alert">
                  {{-- <span aria-hidden="true">&times;</span>               --}}
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                </svg>
              </div>
              </div>
                {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
              @enderror
      <div class="col-md-6">
          <div class=" form-group">
              <label for="file-multiple-input" class=" form-control-label">Banner</label>
              <div><input type="file" id="banner" name="banner" multiple="" class="form-control-file border rounded"></div>
          </div>
          @error('banner')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{-- <strong>{{ $message }}</strong> --}}
                {{ $message }}
                <div type="button" class="close" data-dismiss="alert">
                  {{-- <span aria-hidden="true">&times;</span>               --}}
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                </svg>
              </div>
              </div>
                {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
              @enderror
      </div>
      <div class="row">
          <div class="col-md-3">
              <input class="btn btn-success" type="submit" value="Save Changes" style="width: 100%;">
          </div>
      </div>
      </form>
  </div>
  <div class="card-footer text-muted">
    <a href="{{ url('game') }}" class="btn btn-outline-primary">Go back</a>
  </div>
</div><!-- .content -->

@endsection

