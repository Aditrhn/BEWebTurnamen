@extends('player.auth.main')
@section('up-main')
<div class="sidenav">
  <div class="bg-image">
    <div class="login-main-text">
    </div>
  </div>
</div>
@endsection
@section('main')
<div class="main">
  <div class="col-md-12 col-sm-12">
    <div class="div panel-body">
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
              <label>
              <input name="remember" type="checkbox" value="Remember me"> Remember Me
              </label> 
              <a href="" class="pull-right">Forgot Password?</a>
            </span>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <br>
            <p>Not a member yet ?  <a href="{{URL::route('register')}}" class="primary">Sign Up</a></p>
          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection