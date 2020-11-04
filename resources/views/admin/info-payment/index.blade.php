@extends('admin.main')
@section('title','Payment Player')
@section('main')
<div class="row m-0">
    <div class="col-sm-12">
        <div class="float-left">
            <div class="page-title">
                <h3 class="pt-2">Info Payment Players</h3>
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

                        <label for="table-stat" class="pb-4 pt-3 ml-2"><strong>List pembayaran</strong></label>

                        <!-- alert -->
                        @if(session('msg'))
                            <div class="alert alert-success alert-dismissible fade show position-relativ"
                                role="alert" style="z-index: 1">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('msg') }}
                            </div>
                        @endif

                        <div class="table-stats order-table ov-h" id="table-stat">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Team</th>
                                        <th>E-mail</th>
                                        <th>Kapten</th>
                                        <th>Tournament</th>
                                        <th>Active</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($info as $infos)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $infos->nama_team }}</td>
                                            <td>{{ $infos->mail }}</td>
                                            <td>{{ $infos->nama }}</td>
                                            <td>{{ $infos->nama_turney }}</td>
                                            <td>
                                                <form
                                                    action="{{ URL::route('info.update',$infos->id) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" name="team_id" value="{{ $infos->team_id }}">
                                                    <input type="hidden" name="event_id"
                                                        value="{{ $infos->event_id }}">
                                                    <select name="status">
                                                        <option value="0"
                                                            {{ $infos->info_pembayaran == 0 ? 'selected':'' }}>
                                                            0</option>
                                                        <option value="1"
                                                            {{ $infos->info_pembayaran ==1 ? 'selected':'' }}>
                                                            1</option>
                                                    </select>
                                                    <input type="hidden" name="join_date"
                                                        value="{{ $infos->join_date }}">
                                                    <input type="hidden" name="payment_due"
                                                        value="{{ $infos->payment_due }}">
                                                    <input type="hidden" name="gross_amount"
                                                        value="{{ $infos->gross_amount }}">
                                                    <input type="hidden" name="cancellation_note"
                                                        value="{{ $infos->cancellation_note }}">
                                                    <button class="btn btn-outline-info btn-sm" type="submit">
                                                        <i class="fa fa-dot-circle-o"></i>Konfirmasi</button>
                                                </form>
                                                <form
                                                    action="{{ URL::route('info.destroy',$infos->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-outline-danger btn-sm" type="submit">
                                                        <i class="fa fa-dot-circle-o"></i>Hapus</button>
                                                </form>
                                            </td>
                                            @if($infos->info_pembayaran == 1)
                                                <td>Sudah dibayar</td>
                                            @else
                                                <td>Belum dibayar</td>
                                            @endif
                                        </tr>
                                    @empty
                                        <p><strong>Data masih kosong</strong></p>
                                    @endforelse
                                    <tr>

                                    </tr>
                                </tbody>
                                {{ $info->links() }}
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
