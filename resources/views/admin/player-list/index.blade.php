@extends('admin.main')
@section('title','Payment Player')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Player Lists</h3>
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

                        <label for="table-stat" class="pb-4 pt-3 ml-2"><strong>List player</strong></label>

                        <div class="table-stats order-table ov-h" id="table-stat">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>E-mail</th>
                                        <th>No. Hp</th>
                                        <th>Gender</th>
                                        <th>Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($player as $players)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $players->name }}</td>
                                            <td>{{ $players->email }}</td>
                                            <td>{{ $players->contact }}</td>
                                            <td>{{ $players->gender }}</td>
                                            <td>{{ $players->city }}</td>
                                        </tr>
                                    @empty
                                        <p><strong>Data masih kosong</strong></p>
                                    @endforelse
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                            {{ $player->links() }}
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
