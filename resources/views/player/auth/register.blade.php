@extends('player.auth.main')
@section('up-main')
<div class="sidenav">
</div>
@endsection
@section('main')
<div class="main" id="panel-login">
  <div class="col-md-12 col-sm-12">
    <div class="div panel-body">
      <div class="login-form">
        <div class="panel-body">
          <h2>Sign Up</h2>
          <br>
          <form accept-charset="UTF-8" role="form" class="text-white" action="{{URL::route('post.register')}}" method="POST">
            {{ csrf_field() }}
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="Your name" name="name" type="text">
              @if ($errors->has('name'))
                <span style="color: red">
                  {{ $errors->first('name') }}
                </span>
              @endif
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Password" name="password" type="password">
              @if ($errors->has('password'))
                <span class="error" style="color: red">
                  {{ $errors->first('password') }}
                </span>
              @endif
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Your e-mail" name="email" type="email">
              @if ($errors->has('email'))
                <span style="color: red">
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
              <input disabled name="remember" type="checkbox" value="Remember me">
              I agree to the <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a>
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
            <br>

            <div class="text-center text-white">
              <p style="padding-bottom: 10px">Or</a></p>
              <a class="btn btn-primary social-login-btn social-google d-block" href="{{ URL::route('auth.google') }}" style="text-align:center; display:block;"><i class="fa fa-google text-white" style="font-size: 24px; padding: 10px;"></i><span style="font-size: 1.7em;">Sign up with Google</span></a>
              <p style="padding: 20px 0">Have an account ?  <a href="{{URL::route('login')}}" class="primary">Log in here</a></p>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
