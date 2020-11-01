@extends('admin.main')
@section('title','Payment Player')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Team Lists</h3>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div style="background-color: white;" class="rounded">

                        <label for="table-stat" class="pb-4 pt-3 ml-2"><strong>List tim</strong></label>

                        <div class="table-stats order-table ov-h" id="table-stat">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Member</th>
                                        {{-- <th>Deskripsi</th> --}}
                                        <th>Game</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0 ?>
                                    @forelse($team as $teams)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teams->team_name }}</td>
                                            <td>{{ $member[$i] }}/{{ $teams->max_member }}</td>
                                            {{-- <td>{{ $teams->description }}</td> --}}
                                            <td>{{ $teams->game_name }}</td>
                                        </tr>
                                    <?php $i++ ?>
                                    @empty
                                        <p><strong>Data masih kosong</strong></p>
                                    @endforelse
                                    <tr>

                                    </tr>
                                </tbody> 
                            </table>
                            {{ $team->links() }}
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
