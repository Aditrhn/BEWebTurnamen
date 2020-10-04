@extends('layouts.main')
@section('asset-toastr')
<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
@endsection
@section('main')
<!-- MAIN -->
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <!-- Container -->
    <div class="container-fluid">
      <div class="col-md-12">
        <ul class="nav nav-pills marginPils">
          <li class="active pillsFriend"><a data-toggle="pill" href="#friendList">Friend List</a></li>
          <li class="pillsRequest"><a data-toggle="pill" href="#menu1" class="pillsFriend">Friend Request</a></li>
        </ul>
      </div>
      <!--Konten Pills-->
      <div class="tab-content tabKonten">
        <div id="friendList" class="tab-pane fade in active">
          <div class="row">
            @forelse ($friendlists as $item)
            <div class="col-md-3 friend-page">
              <div class="panel panel-headline panel-friend-detail">
                <div class="panel-body">
                  @if ($item->ava_url != null)
                    <img class="img-panel-friend" src="{{ asset('images/avatars/'.$item->ava_url) }}">
                  @else
                    <img class="img-panel-friend" src="{{ asset('images/avatars/default.png') }}">
                  @endif
                  <h4 class="panel-friend">{{ $item->name }}</h4>
                  <form action="{{ URL::route('unfriend') }}" method="POST">
                    @csrf
                    <div class="buttons col-md-12 btnAdd">
                      <input type="hidden" name="unfriend" value="{{ $item->id }}">
                      <button class="btn btn-xs btn-primary" id="btnUnfriend" type="submit">Unfriend</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @empty
            <div class="panel-friend not-found" style="color: #fff">
              <h4>Anda masih belum memiliki teman</h4>
            </div>
            @endforelse
          </div>
          <!-- End Panel Friend List -->
        </div>

        <div id="menu1" class="tab-pane fade">
          <div class="row">
            @forelse ($friend_requests as $item)
            <div class="col-md-3 friend-page">
              <div class="panel panel-headline panel-friend-detail">
                <div class="panel-body">
                  @if ($item->ava_url != null)
                    <img class="img-panel-friend" src="{{ asset('images/avatars/'.$item->ava_url) }}">
                  @else
                  <img class="img-panel-friend" src="{{ asset('images/avatars/default.png') }}">
                  @endif
                  <h4 class="panel-friend" data-toggle="modal">{{ $item->name }}</h4>
                  <form action="{{ URL::route('accept-friend') }}" method="POST">
                    @csrf
                    <div class="buttons col-md-6 btnRquest">
                      <input type="hidden" name="accept" value="{{ $item->id }}">
                      <button class="btn btn-xs btn-primary" id="btnAccept" type="submit">Accept</button>
                    </div>
                  </form>
                  <form action="{{ URL::route('decline-friend') }}" method="POST">
                    @csrf
                    <div class="buttons col-md-6 btnRquest">
                      <input type="hidden" name="decline" value="{{ $item->id }}">
                      <button class="btn btn-xs btn-unfriend" id="btnUnfriend" type="submit">Decline</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @empty
            <div class="panel-friend not-found" style="color: #fff">
              <h4>Belum ada permintaan pertemanan.</h4>
            </div>
            @endforelse
          </div>
        </div>
      </div>
      <!--End Konten Pills-->
    </div>
    <!-- End Container -->
  </div>
  <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection