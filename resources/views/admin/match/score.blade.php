@extends('admin.main')
@section('title','Score Matches')
@section('main')
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <h3 class="padTitle">Round 1 | Secret vs Navi</h3>
            <!-- /# column -->
            <div class="col-lg-12">
                <form action="{{ URL::route('match.updateScore',$matches->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="card">
                        <h3 class="padScore">Report Score</h3>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="mdlText">Secret</td>
                                        <td>
                                            <select name="socre_a" class="form-control" id="exampleFormControlSelect1">
                                                <option disabled selected>Pilih score</option>
                                                <option value="{{  }}">0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="mdlText">Navi</td>
                                        <td>
                                            <select class="form-control" id="exampleFormControlSelect2">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer center">
                            <button type="button" class="btn btn-block btn-primary">Submit Score</button>
                        </div>
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
