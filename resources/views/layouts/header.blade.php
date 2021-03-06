<nav class="navbar navbar-default navbar-fixed-top">
  <div class="brand" style="padding: 25px 39px">
    <a href="{{URL::route('dashboard')}}"><img src="{{ asset('assets/img/gameski.png') }}" class="img-responsive logo" width="150px"></a>
  </div>
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-fullwidth"><i class="glyphicon glyphicon-align-justify"></i></button>
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
          <?php
            $friend = DB::table('friends')
              ->select('*')
              ->where([
                ['player_two', '=', Auth::guard('player')->user()->id],
                ['status', '=', '0']
                ])
              ->count();
            $team = DB::table('teams')
              ->join('contracts', 'contracts.teams_id', '=', 'teams.id')
              ->select('teams.id', 'teams.name', 'teams.logo_url')
              ->where([
                  ['contracts.players_id', '=', Auth::guard('player')->user()->id],
                  ['contracts.status', '=', '0']
              ])
              ->paginate(5);
            $teamc = $team->count();
          ?>
          <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
            <i class="lnr lnr-alarm"></i>
            @if ($friend != null && $teamc != null)
              <span class="badge bg-danger">{{ $teamc+$friend }}</span>
            @elseif ($friend == null && $teamc != null)
              <span class="badge bg-danger">{{ $teamc }}</span>
            @elseif ($friend != null && $teamc == null)
              <span class="badge bg-danger">{{ $friend }}</span>
            @else
            @endif
          </a>
          <ul class="dropdown-menu notifications">
            @if ($friend != null)
              <li><a href="{{ URL::route('friend') }}" class="notification-item"><span class="dot bg-danger"></span>You have {{ $friend }} friend request</a></li>
            @endif
            @forelse ($team as $teams)
              <li><a href="{{ URL::route('team-invitation') }}" class="notification-item"><span class="dot bg-success"></span>You've been invited to {{ $teams->name }}</a></li>
            @empty
            @endforelse
          </ul>
        </li>
        {{-- <li class="dropdown">
          <ul class="dropdown-menu">
            <li><a href="#">Basic Use</a></li>
            <li><a href="#">Working With Data</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Troubleshooting</a></li>
          </ul>
        </li> --}}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @guest
                    @if (Route::has('login'))
                        @if (Auth::guard('player')->user()->ava_url != null)
                        <img src="{{ URL::asset('images/avatars/'.Auth::guard('player')->user()->ava_url) }}" class="avatar" alt="Avatar">
                        @else
                        <img src="{{ asset('images/avatars/default.png') }}" class="avatar" alt="Avatar">
                        @endif
                        <span>{{ Auth::guard('player')->user()->name }}</span>
                        <i class="icon-submenu lnr lnr-chevron-down"></i>
                    {{-- <p style="color: red;">{{ Auth::guard('player')->user()->name }}</p> --}}
                    @endif
                @endguest
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
