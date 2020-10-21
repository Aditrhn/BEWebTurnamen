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


                            <!-- alert -->
                            @if(session('msg'))
                                <div class="alert alert-success alert-dismissible fade show position-fixed ml-4"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('msg') }}
                                </div>
                            @endif


                        <label for="table-stat" class="pb-4 pt-3 ml-2"><strong>List pembayaran</strong></label>
                        <div class="table-stats order-table ov-h" id="table-stat">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Team player</th>
                                        <th>E-mail kapten</th>
                                        <th>Nama Kapten</th>
                                        <th>Tournament yang diikuti</th>
                                        <th>Active</th>
                                        <th>Status pembayaran</th>
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
                                                    {{-- <input type="hidden" name="info_pembayaran"
                                                        value="{{ $infos->info_pembayaran }}"> --}}
                                                    {{-- <input type="number" name="status" value="{{ $infos->info_pembayaran }}">
                                                    --}}
                                                    <select name="status">
                                                        <option value="0"
                                                            {{ $infos->info_pembayaran == 0 ? 'selected':'' }}>
                                                            0</option>
                                                        <option value="1"
                                                            {{ $infos->info_pembayaran ==1 ? 'selected':'' }}>
                                                            1</option>
                                                    </select>
                                                    {{-- <select name="status">
                                                        <option value="0" {{ old('status') == 0 ? "selected" : '' }}>0
                                                    </option>
                                                    <option value="1"
                                                        {{ old('status') == 1 ? "selected" : '' }}>
                                                        1</option>
                                                    </select> --}}
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
