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
        @if ($sukses = Session::get('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
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
              <input class="form-control" placeholder="Username or email" name="email" type="text">
              @if ($errors->has('email'))
              <span class="error">
                {{ $errors->first('email') }}
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
            <span class="checkbox">
              {{-- <label>
              <input disabled name="remember" type="checkbox" value="Remember me"> Remember Me
              </label> --}}
              <a href="" class="pull-right" style="margin-bottom: 20px">Forgot Password?</a>
            </span>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <br>
            <p>Not a member yet ?  <a href="{{URL::route('register')}}" class="primary">Sign Up</a></p>
            
            <div class="text-center">

              <a class="btn btn-primary social-login-btn social-google" href="/auth/google" style="text-align:center;"><i class="fa fa-google-plus text-white" style="font-size: 36px; padding:20px;"></i></a>
            </div>

          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
