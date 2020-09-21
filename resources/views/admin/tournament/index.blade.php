@extends('admin.main')
@section('main')
<div class="container" style="padding-top: 10px">
  {{-- @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <div type="button" class="close" data-dismiss="alert">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
      </svg>
    </div>
  @endif --}}
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

  <div class="card">
    <div class="card-header text-center">
      Featured
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Status</th>
          <th scope="col">Winner</th>
          <th scope="col">Participant</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($event as $events)
        <tr>
          <td scope="row">{{ $loop->iteration }}</td>
          <td>{{ $events->title }}</td>
          <td>{{ $events->status }}</td>
          <td>{{ $events->winner_id }}</td>
          <td>{{ $events->participant }}</td>
          <td>
            <a href="#" class="badge">
              <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Detail"></i>
            </a>
            <a href="{{ URL::route('event.edit',$events->id) }}" class="badge">
              <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
            </a>            
            <form action="{{ URL::route('event.destroy',$events->id) }}" method="POST" class="badge">
              @method('delete')
              @csrf
              <button class="badge badge-outline-danger">
                <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
              </button>
            </form>
          </td>
        </tr>
        @empty
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
        @endforelse
      </tbody>
    </table>
      {{-- <div class="card-body">
        <h5 class="card-title">{{ $games->name }}</h5>
        <p class="card-text">{{ $games->platform }}.</p>          
      </div> --}}
    
    <div class="card-body text-center">
      <a href="{{ URL::route('event.create') }}" class="btn btn-primary">Go to make a data!!</a>
    </div>
    <div class="card-footer text-muted text-center">
      2 days ago
    </div>
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