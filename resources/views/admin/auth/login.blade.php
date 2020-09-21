<form accept-charset="UTF-8" role="form" action="{{URL::route('super.postlogin')}}" method="POST">
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
    </span>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </fieldset>
</form>