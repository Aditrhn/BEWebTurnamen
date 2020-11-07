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
          <h3>Forgot Password ?</h3>
          <br>
          <p>Enter the email or phone number you used</p>
          <p>when you joined and we will send you confirmation</p>
          <br>
          <br>
          <form accept-charset="UTF-8" role="form" action="{{URL::route('post.login')}}" method="POST">
            {{ csrf_field() }}
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="Email or Phone" name="Eforget-password pagemailorPhone" type="text">
              @if ($errors->has('email'))
              <span class="error" style="color: red">
                {{ $errors->first('email') }}
              </span>
              @endif
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
            <br>
            
            <div class="text-center text-white">
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
