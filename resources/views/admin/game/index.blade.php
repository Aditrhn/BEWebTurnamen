@extends('admin.main')
@section('title','Game')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Games</h3>
            </div>
        </div>
        <div class="float-right">
            <a class="btn btn-success mr-3" href="{{ URL::route('game.create') }}"><i
                    class="pe-7s-plus pe-2x pe-va"></i> Create</a>
        </div>
    </div>
</div>

<div class="content">
    <!-- alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show position-relativ" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div style="background-color: white;" class="rounded">
                        <label for="table-stat" class="pb-4 pt-3 ml-2"><strong>Game list</strong></label>
                        <div class="table-stats order-table ov-h" id="table-stat">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>

                                        <th class="Avatar">Game</th>
                                        <th></th>
                                        <th>Game Platform</th>
                                        <th>Latest Update</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($game as $games)
                                        <tr>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <img class="rounded-circle"
                                                        src="{{ asset('images/game_icon/'. $games->icon_url) }}"
                                                        alt="game_icon">
                                                </div>
                                            </td>
                                            <td>{{ $games->name }}</td>
                                            <td> <span class="name">{{ $games->platform }}</span> </td>
                                            <td> <span class="product">{{ $games->updated_at }}</span> </td>
                                            <td>
                                                <a href="{{ URL::route('game.edit',$games->id) }}"
                                                    class="badge">
                                                    <span class="badge badge-warning">Edit</span>
                                                </a>
                                                <form
                                                    action="{{ URL::route('game.destroy',$games->id) }}"
                                                    method="POST" class="badge">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="button button-outline-danger" style="border-color: transparent; padding: 0;">
                                                        <span class="badge badge-danger">Delete</span>
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
                </div>
            </div>
        </div>
    </div>

</div><!-- .content -->

@endsection
@push('tooltip')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    </script>
@endpush
