<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li>
          <a href="{{ URL::route('dashboard') }}" class="{{ Request::segment(1) === 'dashboard' ? 'active' :null }}">
            <img src="{{ asset('assets/img/ICON/dashboard.png') }}">
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ URL::route('profile') }}" class="{{ Request::segment(1) ==='profile' ? 'active' :null }}">
            <img src="{{ asset('assets/img/ICON/profil.png') }}">
            <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="{{ URL::route('tournament') }}" class="{{ Request::segment(1) ==='tournament' ? 'active' :null }}" class=""><img src="{{ asset('assets/img/ICON/Tournament.png') }}">
            <span>Tournament</span>
          </a>
        </li>
        <li>
          <a href="{{ URL::route('team') }}" class="{{ Request::segment(1) ==='team' ? 'active' :null }}">
            <img src="{{ asset('assets/img/ICON/team.png') }}">
            <span>Team</span>
          </a>
        </li>
        <li>
          <a href="{{ URL::route('friend') }}" class="{{ Request::segment(1) ==='friend' ? 'active' :null }}">
            <img src="{{ asset('assets/img/ICON/friend.png') }}">
            <span>Friend</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
