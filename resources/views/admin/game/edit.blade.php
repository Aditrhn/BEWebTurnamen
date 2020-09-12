@extends('admin.game.main')
@section('main')
<div class="container" style="padding-top: 10px">
  <div class="card text-center">
    <div class="card-header">
      Edit Game!!
    </div>
    <div class="card-body">
      <form action="{{ URL::route('game.update',$game->id ) }}" method="post">
        {{ csrf_field() }}
        @method('put')
        <div class="col-md-4">
          <label for="name" class="form-label">Name Game</label>
          <input type="text" placeholder="Input name of game" class="form-control @error('name') is-invalid @enderror" id="platform" id="name" name="name" value="{{ $game->name}}">
          @error('name')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <div type="button" class="close" data-dismiss="alert">
              {{-- <span aria-hidden="true">&times;</span>               --}}
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
            </svg>
          </div>
          </div>
          @enderror
        </div>
        
        <div class="col-md-4">
          <label for="platform" class="form-label">Platform Game</label>
          <input type="text" placeholder="Input game of game" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" value="{{ $game->platform}}">
          @error('platform')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <div type="button" class="close" data-dismiss="alert">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
            </svg>
          </div>
          </div>
          @enderror
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
    </div>
    <div class="card-footer text-muted">
      <a href="{{ url('game') }}" class="btn btn-outline-primary">Go back</a>
    </div>
  </div>
</div>
@endsection