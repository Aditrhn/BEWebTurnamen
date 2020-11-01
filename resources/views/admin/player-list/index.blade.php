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

                        <label for="table-stat" class="pb-4 pt-3 ml-2">
                            <strong>List player</strong>
                            <a href="{{ URL::route('players.export') }}" style="padding: 0%;" data-toggle="tooltip" data-placement="top" title="download as excel">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-excel-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                </svg>
                            </a>
                        </label>

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
                                {{-- {{ $info->links() }} --}}
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
