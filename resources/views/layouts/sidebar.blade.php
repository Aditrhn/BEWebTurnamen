<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="{{ URL::route('dashboard') }}" class=""><img src="{{ asset('assets/img/ICON/dashboard.png') }}"> <span>Dashboard</span></a></li>
        <li><a href="{{ URL::route('profile') }}" class=""><img src="{{ asset('assets/img/ICON/profil.png') }}"> <span>Profil</span></a></li>
        <li><a href="{{ URL::route('tournament') }}" class=""><img src="{{ asset('assets/img/ICON/Tournament.png') }}"> <span>Tournament</span></a></li>
        <li><a href="{{ URL::route('team') }}" class=""><img src="{{ asset('assets/img/ICON/team.png') }}"> <span>Team</span></a></li>
        <li><a href="{{ URL::route('profile') }}" class=""><img src="{{ asset('assets/img/ICON/friend_help.png') }}"> <span>Help</span></a></li>
        <li><a href="{{ URL::route('help') }}" style="margin-top: 50px;"><img src="{{ asset('assets/img/ICON/exit.png') }}"></i><span>Logout</span></a></li>
      </ul>
    </nav>
  </div>
</div>
<!-- END LEFT SIDEBAR -->