@extends('admin.main')
@section('main')
<div class="row m-0">
  <div class="col-sm-4">
      <div class="float-left">
          <div class="page-title">
              <h3 class="pt-2">My Tournament</h3>
          </div>
      </div>
  </div>
  <div class="col-sm-8">
      <div class="float-right">
          <div class="page-title">
              <ol class="text-right">
                  <a class="btn btn-success mr-3" href="{{ URL::route('event.create') }}"><i class="pe-7s-plus pe-2x pe-va"></i> Create</a>
              </ol>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 col-lg-4">
      <div class="card text-white bg-flat-color-1">
          <div class="card-body">
              <div class="card-center pt-1">
                  <i class="pe-7s-monitor pe-5x m-5 d-flex justify-content-center"></i>
              </div><!-- /.card-left -->

              <div class="card-right float-right text-right">
                  <a class="btn btn-success" href="#">Publised</a>
              </div><!-- /.card-right -->
          </div>
          <div class="card-text bg-light">
              <div class="text-dark pl-5 pr-5">
                  <h4 class="text-center m-3">Nongski MLBB Tournament</h4>
                  <h5 class="ml-4 mb-3"><i class="pe-2x pe-7s-joy pe-va mr-4"></i>Mobile Legends</h5>
                  <h5 class="ml-4 mb-3"><i class="pe-2x pe-7s-users pe-va mr-4"></i>16 Teams</h5>
                  <h5 class="ml-4 mb-3"><i class="pe-2x pe-7s-date pe-va mr-4"></i>September 05, 2020</h5>
                  <button class="col-sm-12 col-lg-12 btn btn-success text-center mb-5" href="#">VIEW</button>
              </div>
          </div>
      </div>
  </div>
</div><!-- .row -->
@endsection
@push('tooltip')
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
@endpush