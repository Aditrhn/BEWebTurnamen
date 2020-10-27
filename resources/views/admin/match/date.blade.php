@extends('admin.main')
@section('title','Date Matches')
@section('main')
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <!-- /# column -->
                <div class="col-lg-12">
                    <form action="{{ URL::route('match.time.update',$matches->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('put')
                        <div class="card">
                            <h3 class="padScore">Set Date</h3>
                            <div class="card-body">
                            <table class="table">
                            <tbody>
                            <tr>
                                <td class="mdlText">Date</td>
                                <td>
                                <div class="input-group date" id="datetimepicker1">
                                            <input type="text" id="start-date" class="form-control datepicker-here" name="match_date"
                                            data-language="en" data-date-format="yyyy-mm-dd" data-timepicker="true" 
                                            data-time-format='hh:ii:00' />
                                        </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="modal-footer center">
                            <button type="submit" class="btn btn-block btn-primary">Submit Time</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- .row -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection
@push('tooltip')
    <!-- Date Picker -->
    <script src="{{ URL::asset('js/admin/datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('js/admin/i18n/datepicker.en.js')}}"></script>
    <script>
        $('#start-date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $('#end-date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
    </script>
    <script src="assets/js/main.js"></script>
@endpush
