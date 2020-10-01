@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="panel panel-default" style="background-color: transparent; border: none;">
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="buttons panel-btn-find pull-right">
                                    <a class="button" href="#">
                                        <h4 class="find-text">Clear Filter</h4>
                                    </a>
                                </div>
                                <div class="panel-find-dropdown pull-right">
                                    <h4>Game</h4>
                                    <div class="dropdown">
                                        <select class="select-team" id="exampleFormControlSelect1">
                                            <option>All</option>
                                            <option>Mobile Legend</option>
                                            <option>PUBG</option>
                                            <option>Free Fire</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="background-color: #35346c; border-radius: 20px;">
                        <table class="table" style="background-color: transparent;">
                            <thead>
                                <tr>
                                    <th style="padding-left: 40px;">Game</th>
                                    <th>Team</th>
                                    <th></th>
                                    <th>Member</th>
                                    <th>Captain</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">ML Nongski Tournament</h4>
                                    </td>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">4 / 5</h4>
                                    </td>
                                    <td>
                                        <h4 class="find-text">Atra</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">ML Nongski Tournament</h4>
                                    </td>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">4 / 5</h4>
                                    </td>
                                    <td>
                                        <h4 class="find-text">Laaluxa</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">ML Nongski Tournament</h4>
                                    </td>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">4 / 5</h4>
                                    </td>
                                    <td>
                                        <h4 class="find-text">Mystea</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">ML Nongski Tournament</h4>
                                    </td>
                                    <td><img alt="" src="assets/img/ML.png" class="find-image"></td>
                                    <td>
                                        <h4 class="find-text">4 / 5</h4>
                                    </td>
                                    <td>
                                        <h4 class="find-text">LordShaman</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
