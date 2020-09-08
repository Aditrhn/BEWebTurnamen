@extends('player.auth.main')
@section('up-main')
<div class="side-image">
</div>
@endsection
@section('main')
<div class="main">
  <div class="col-md-12 col-sm-12">
    <div class="div panel-body">
      <div class="login-form">
        <div class="panel-body">
          <h2>Sign Up</h2>
          <br>
          <form accept-charset="UTF-8" role="form" action="{{URL::route('post.register')}}" method="POST">
            {{ csrf_field() }}
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="Your name" name="name" type="text">
              @if ($errors->has('name'))
                <span>
                  {{ $errors->first('name') }}
                </span>
              @endif
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Password" name="password" type="password">
              @if ($errors->has('password'))
                <span class="error">
                  {{ $errors->first('password') }}
                </span>
              @endif
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Your e-mail" name="email" type="email">
              @if ($errors->has('email'))
                <span>
                  {{ $errors->first('email') }}
                </span>
              @endif
            </div>
            {{-- <div class="radio">
              <label>
                <input name="remember" type="radio" value="Remember me">
                I'm a player
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="remember" type="radio" value="Remember me">
                I'm a event organizer
              </label>
            </div> --}}
            <div class="checkbox">
              <label>
              <input name="remember" type="checkbox" value="Remember me"> 
              I agree to the <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a>
              </label> 
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
            <br>
            <p class="text-center">Have an account ?  <a href="{{URL::route('login')}}">Log in here</a></p>
          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection