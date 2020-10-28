<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gameskii Admin - Login</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body>
    <div class="container">
      <img src="{{ asset('assets/img/navi.png') }} "width="100px">
        <div class="title mt-5">
            <h2>Log In</h2>
            <center>
              <form accept-charset="UTF-8" role="form" action="{{URL::route('super.postlogin')}}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                <div class="form-group mt-5">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="email" class="form-control" id="input_username" name="email">
                  @if ($errors->has('email'))
                    <span class="error">
                      {{ $errors->first('email') }}
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="input_password" name="password">
                  @if ($errors->has('password'))
                    <span class="error">
                      {{ $errors->first('password') }}
                    </span>
                  @endif
                </div>
                <span class="checkbox">
                  <label>
                  <input disabled name="remember" type="checkbox" value="Remember me"> Remember Me
                  </label>
                </span>
                <input class="btn btn-success mt-4" type="submit" value="Log In" id="submit_login">
              </fieldset>
              </form>
              <br>
              <br>
              <br>
              <h6 class="mt-5">© 2020 Nongski.i. All right reserved.</h6>
            </center>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="js/admin/main.js"></script>

</body>
</html>
