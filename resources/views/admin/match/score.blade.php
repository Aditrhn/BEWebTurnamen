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
                <form action="{{ URL::route('match.updateScore',$matches[0]->id) }}" method="POST">
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
                                        <td class="mdlText">{{$matches[0]->team_a}}</td>
                                        <td>
                                            <select name="score_a" class="form-control" id="exampleFormControlSelect1">
                                              <option value="0">0</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="mdlText">{{$matches[0]->team_b}}</td>
                                        <td>
                                            <select name="score_b" class="form-control" id="exampleFormControlSelect2">
                                              <option value="0">0</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer center">
                            <button type="submit" class="btn btn-block btn-primary">Submit Score</button>
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
