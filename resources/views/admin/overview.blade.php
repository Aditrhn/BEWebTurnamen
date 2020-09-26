@extends('admin.main')
@section('title','Overview')
@section('main')
<h2 class="mb-5">Overview</h2>
<!-- Widgets  -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" id="stat-widget-dashboard">
                <div class="stat-widget-five text-center">
                    <div class="text-left dib m-4" id="text-stat-dashboard">
                        <div class="stat-heading mb-3"><h4>Total Event</h4></div>
                        <h1 class="text-center text-dark"><span class="count">{{ $count }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body " id="stat-widget-dashboard">
                <div class="stat-widget-five text-center">
                    <div class="text-left dib m-4" id="text-stat-dashboard">
                        <div class="stat-heading mb-3"><h4>On Going</h4></div>
                        <h1 class="text-center text-dark"><span class="count">{{ $onGoing }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" id="stat-widget-dashboard">
                <div class="stat-widget-five text-center">
                    <div class="text-left dib m-4" id="text-stat-dashboard">
                        <div class="stat-heading mb-3"><h4>Finished</h4></div>
                        <h1 class="text-center text-dark"><span class="count">{{ $finished }}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" id="stat-widget-dashboard">
                <div class="stat-widget-five text-center">
                    <div class="text-left dib m-4" id="text-stat-dashboard">
                        <div class="stat-heading mb-3"><h4>Draft</h4></div>
                        <h1 class="text-center text-dark"><span class="count">64</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<!-- /Widgets -->
<!-- To Do and Live Chat -->
<h2 class="my-5">List Tournament</h2>
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="custom-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true"><h4>On Going</h4></a>
                            <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false"><h4>Finished</h4></a>
                        </div>
                    </nav>
                    <div class="tab-content pt-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="card text-white bg-flat-color-3">
                                        <div class="card-body p-5">
                                            <div class="card-left pt-1 float-left">
                                                @forelse ($status_0 as $onGoing)
                                                <h3 class="mb-0 fw-r">{{ $onGoing->title }}</h3>
                                                <p class="text-light mt-1 m-0">{{ $onGoing->description }}</p>
                                                @empty
                                                <h3 class="mb-0 fw-r">Null!!</h3>
                                                <p class="text-light mt-1 m-0">Null!!</p>
                                                @endforelse                                             
                                            </div><!-- /.card-left -->
            
                                            <div class="card-right float-right text-right">
                                                <a class="btn btn-primary" href="#">On Going</a>
                                            </div><!-- /.card-right -->
            
                                        </div>
                                        <div class="card-text bg-light">
                                            <div class="table-stats order-table ov-h">
                                                <table class="table">
                                                    <thead>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($status_0 as $onGoing)
                                                        <tr>
                                                            <td>  <span class="name">Participant</span> </td>
                                                            <td>
                                                                <span class="badges text-secondary">{{ $onGoing->participant }} Teams</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <span class="name">Date</span> </td>
                                                            <td>
                                                                <span class="badges text-secondary">{{ $onGoing->start_date }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <span class="name">Mode</span> </td>
                                                            <td>
                                                                <span class="badges text-secondary">GSC Mode</span>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td>  <span class="name">Participant</span> </td>
                                                            <td>
                                                                <span class="badges text-secondary">Null!! Teams</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <span class="name">Date</span> </td>
                                                            <td>
                                                                <span class="badges text-secondary">Null!!</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <span class="name">Mode</span> </td>
                                                            <td>
                                                                <span class="badges text-secondary">Null!! Mode</span>
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div> <!-- /.table-stats -->
                                        </div>
                                    </div>
                                </div>                                
                            </div><!-- /# column -->
                            
                        </div>
                        <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                            <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="card text-white bg-flat-color-1">
                                            <div class="card-body p-5">
                                                <div class="card-left pt-1 float-left">
                                                    @forelse ($status_1 as $finished)
                                                    <h3 class="mb-0 fw-r">{{ $finished->title }}</h3>
                                                    <p class="text-light mt-1 m-0">{{ $finished->description }}</p>
                                                    @empty
                                                    <h3 class="mb-0 fw-r">Null!!</h3>
                                                    <p class="text-light mt-1 m-0">Null!!</p>
                                                    @endforelse                                                    
                                                </div><!-- /.card-left -->
                
                                                <div class="card-right float-right text-right">
                                                    <a class="btn btn-success" href="#">Finished</a>
                                                </div><!-- /.card-right -->
                
                                            </div>
                                            <div class="card-text bg-light">
                                                <div class="table-stats order-table ov-h">
                                                    <table class="table">
                                                        <thead>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($status_1 as $finished))
                                                            <tr>
                                                                <td>  <span class="name">Participant</span> </td>
                                                                <td>
                                                                    <span class="badges text-secondary">{{ $finished->participant }} Teams</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>  <span class="name">Date</span> </td>
                                                                <td>
                                                                    <span class="badges text-secondary">{{ $finished->start_date }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>  <span class="name">Mode</span> </td>
                                                                <td>
                                                                    <span class="badges text-secondary">GSC Mode</span>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td>  <span class="name">Participant</span> </td>
                                                                <td>
                                                                    <span class="badges text-secondary">Null!! Teams</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>  <span class="name">Date</span> </td>
                                                                <td>
                                                                    <span class="badges text-secondary">Null!!</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>  <span class="name">Mode</span> </td>
                                                                <td>
                                                                    <span class="badges text-secondary">GSC Mode</span>
                                                                </td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div> <!-- /.table-stats -->
                                            </div>
                                        </div>
                                    </div>                                    
                                </div><!-- /# column -->
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- .row -->
<!-- /To Do and Live Chat -->
@endsection