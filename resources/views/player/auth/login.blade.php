@extends('player.auth.main')
@section('up-main')
<div class="sidenav">
</div>
@endsection
@section('main')
<div class="main" id="panel-login">
  <div class="col-md-12 col-sm-12">
    <div class="div panel-body">
        {{-- notifikasi harus login ketika sudah logout --}}
        @if(session('success'))
        <div class="alert alert-danger alert-dismissible" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
        @endif
      <div class="login-form">
        <div class="panel-body">
          <h2>Login to website</h2>
          <br>
          <form accept-charset="UTF-8" role="form" action="{{URL::route('post.login')}}" method="POST">
            {{ csrf_field() }}
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="Email" name="email" type="text">
              @if ($errors->has('email'))
              <span class="error" style="color: red">
                {{ $errors->first('email') }}
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
            <span class="checkbox">
              {{-- <label>
              <input disabled name="remember" type="checkbox" value="Remember me"> Remember Me
              </label> --}}
              <a href="" class="pull-right" style="margin-bottom: 20px">Forgot Password?</a>
            </span>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <br>

            <div class="text-center text-white">
              <p style="padding-bottom: 10px">Or</a></p>
              <a class="btn btn-primary social-login-btn social-google d-block" href="{{ URL::route('auth.google') }}" style="text-align:center; display:block; position: center"><i class="fa fa-google text-white" style="font-size: 24px; padding: 10px;"></i><span style="font-size: 1.7em;">Sign in with Google</span></a>
              <p style="padding: 20px 0">Not a member yet ?  <a href="{{URL::route('register')}}" class="primary">Sign Up</a></p>
            </div>

          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
