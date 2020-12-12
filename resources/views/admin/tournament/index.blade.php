@extends('admin.main')
@section('title','Tournament')
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
                    <a class="btn btn-success mr-3" href="{{ URL::route('event.create') }}"><i
                            class="pe-7s-plus pe-2x pe-va"></i> Create</a>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    @if(session('delete'))
    <div class="alert alert-danger alert-dismissible fade show position-relativ" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('delete') }}
    </div>
    @endif
    @if(session('msg'))
    <div class="alert alert-success alert-dismissible fade show position-relativ" role="alert" style="z-index: 1">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('msg') }}
    </div>
    @endif
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="custom-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab"
                                        href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                        aria-selected="true">
                                        <h4>Published</h4>
                                    </a>
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab"
                                        href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile"
                                        aria-selected="false">
                                        <h4>Draft</h4>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content pt-4" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel"
                                    aria-labelledby="custom-nav-home-tab">
                                    <div class="row">
                                        @forelse ($myEvents as $myEvent)
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="card text-white bg-flat-color-6">
                                                <div class="card-body">
                                                    <div class="card-center pt-1">
                                                        <i
                                                            class="pe-7s-monitor pe-5x m-5 d-flex justify-content-center"></i>
                                                    </div><!-- /.card-left -->

                                                    <div class="card-right float-right text-right">
                                                        <a class="btn btn-primary" href="#">Publised</a>
                                                    </div><!-- /.card-right -->
                                                </div>
                                                <div class="card-text bg-light">
                                                    <div class="text-dark pl-5 pr-5">
                                                        <h4 class="text-center m-3">{{ $myEvent->judul }}</h4>
                                                        <h5 class="ml-4 mb-3"><i
                                                                class="pe-3x pe-7s-joy pe-va mr-4"></i>{{ $myEvent->nama }}
                                                        </h5>
                                                        <h5 class="ml-4 mb-3"><i
                                                                class="pe-3x pe-7s-users pe-va mr-4"></i>{{ $myEvent->peserta }} Teams</h5>
                                                        <h5 class="ml-4 mb-3"><i
                                                                class="pe-3x pe-7s-date pe-va mr-4"></i>{{\Carbon\Carbon::parse($myEvent->tgl_mulai)->translatedFormat('M d, Y') }}
                                                        </h5>
                                                        <a class="col-sm-12 col-lg-12 btn btn-primary text-center mb-5"
                                                    href="{{URL::route('event.show',$myEvent->aidi)}}">VIEW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <h3>Nothing to see here</h3>
                                        @endforelse
                                        <!--/.col-->
                                    </div><!-- /# column -->

                                </div>
                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel"
                                    aria-labelledby="custom-nav-profile-tab">
                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel"
                                        aria-labelledby="custom-nav-home-tab">
                                        <div class="row">
                                            @forelse ($myTempEvents as $myTempEvent)
                                            <div class="col-sm-12 col-lg-4">
                                                <div class="card text-white bg-flat-color-4">
                                                    <div class="card-body">
                                                        <div class="card-center pt-1">
                                                            <i
                                                                class="pe-7s-monitor pe-5x m-5 d-flex justify-content-center"></i>
                                                        </div><!-- /.card-left -->

                                                        <div class="card-right float-right text-right">
                                                            <a class="btn btn-warning" href="#">Draft</a>
                                                        </div><!-- /.card-right -->

                                                    </div>
                                                    <div class="card-text bg-light">
                                                        <div class="text-dark pl-5 pr-5">
                                                            <h4 class="text-center m-3">{{ $myTempEvent->judul }}</h4>
                                                            <h5 class="ml-4 mb-3"><i
                                                                    class="pe-3x pe-7s-joy pe-va mr-4"></i>{{ $myTempEvent->nama }}
                                                            </h5>
                                                            <h5 class="ml-4 mb-3"><i
                                                                    class="pe-3x pe-7s-users pe-va mr-4"></i>{{ $myTempEvent->peserta }} Teams
                                                            </h5>
                                                            <h5 class="ml-4 mb-3"><i
                                                                    class="pe-3x pe-7s-date pe-va mr-4"></i>{{\Carbon\Carbon::parse($myTempEvent->tgl_mulai)->translatedFormat('M d, Y') }}
                                                            </h5>
                                                            <a class="col-sm-12 col-lg-12 btn btn-warning text-center mb-5"
                                                                href="{{ URL::route('temporary-event.edit',$myTempEvent->aidi) }}">EDIT</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <h3>Nothing to see here</h3>
                                            @endforelse
                                            <!--/.col-->

                                        </div><!-- /# column -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .row -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->

@endsection
@push('tooltip')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
