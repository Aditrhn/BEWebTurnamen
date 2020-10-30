<nav class="navbar navbar-default navbar-fixed-top">
  <div class="brand">
    <a href="index.html"><img src="{{ asset('assets/img/gameski.png') }}" class="img-responsive logo"></a>
  </div>
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
    </div>
    <form class="navbar-form navbar-left" action="{{ URL::route('search') }}" method="GET">
      <div class="input-group">
        <input type="text" value="" class="form-control" placeholder="Search dashboard..." name="cari">
        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><img src="{{ asset('assets/img/ICON/search.png') }}" alt=""></button></span>
      </div>
    </form>
    <div id="navbar-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
            <i class="lnr lnr-alarm"></i>
            <span class="badge bg-danger">5</span>
          </a>
          <ul class="dropdown-menu notifications">
            <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 friend request</a></li>
            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>You've been invited to Na'Vi</a></li>
            <li><a href="#" class="more">See all notifications</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <ul class="dropdown-menu">
            <li><a href="#">Basic Use</a></li>
            <li><a href="#">Working With Data</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Troubleshooting</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if (Auth::guard('player')->user()->ava_url != null)
                <img src="{{ URL::asset('images/avatars/'.Auth::guard('player')->user()->ava_url) }}" class="avatar" alt="Avatar">
                @else
                <img src="{{ asset('images/avatars/default.png') }}" class="avatar" alt="Avatar">
                @endif
                <span>{{ Auth::guard('player')->user()->name }}</span>
                <i class="icon-submenu lnr lnr-chevron-down"></i>
            </a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('profile') }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
            <li><a href="{{URL::route('logout')}}"><i class="lnr lnr-exit" class="more"></i> <span>Logout</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
