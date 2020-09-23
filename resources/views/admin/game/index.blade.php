@extends('admin.main')
@section('main')
<div class="row m-0">
  <div class="col-sm-12">
      <div class="float-left">
          <div class="page-title">
              <h3 class="pt-2">Games</h3>
          </div>
      </div>
      <div class="float-right">
          <a class="btn btn-success mr-3" href="{{ URL::route('game.create') }}"><i class="pe-7s-plus pe-2x pe-va"></i> Create</a>
      </div>
  </div>
</div>
<div class="content">
  <div style="background-color: white;" class="rounded">
      <label for="table-stat" class="pb-4 pt-3 ml-2"><strong>Game list</strong></label>
      <div class="table-stats order-table ov-h" id="table-stat">
          <table class="table ">
              <thead>
                  <tr>
                      
                      <th class="Avatar">Game</th>
                      <th></th>
                      <th>Game Platform</th>
                      <th>Latest Update</th>      
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($game as $games)
                  <tr>
                      <td class="avatar">
                          <div class="round-img">
                              <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                          </div>
                      </td>
                      <td>{{ $games->name }}</td>
                      <td>  <span class="name">{{ $games->platform }}</span> </td>
                      <td> <span class="product">{{ $games->updated_at }}</span> </td>
                      <td>
                          
                          <a href="{{ URL::route('game.edit',$games->id) }}" class="badge">
                            <span class="badge badge-complete">Edit</span>
                          </a>            
                          <form action="{{ URL::route('game.destroy',$games->id) }}" method="POST" class="badge">
                            @method('delete')
                            @csrf
                            <button class="badge badge-outline-danger">
                              <span class="badge badge-complete">Delete</span>
                            </button>
                          </form>
                      </td>
                  </tr>
                @empty
                  Kosong
                @endforelse
              </tbody>
          </table>
      </div>
  </div>
</div><!-- .content -->

<!-- alert -->
<div class="card">
  <div class="card-header text-center">
    Alert Notification
  </div>
  <div class="card-body">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div type="button" class="close" data-dismiss="alert">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg>
      </div>
      {{ session('success') }}
    </div>
    @endif
  </div>
</div>

@endsection
@push('tooltip')
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
@endpush