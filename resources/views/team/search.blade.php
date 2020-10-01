@extends('layouts.main')
@section('main')
    <!-- MAIN -->
    <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="panel panel-default" style="background-color: transparent; border: none;">
						<div class="container-fluid" >
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
                                <div class="table-responsive findTable">          
                                    <table class="table">
                                        <tbody>
                                        <tr class="thText">
                                            <th class="thTitle">Game</th>
                                            <th class="thTitle">Team</th>
                                            <th class="thTitle"></th>
                                            <th class="thTitle">Member</th>
                                            <th class="thTitle">Captain</th>
                                        </tr>
                                        </tbody>
                                        <tbody>
                                        <tr>
                                        <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                                        <td><h4 class="find-text">Nongski</h4></td>
                                        <td><img alt="" id="imgGame" src="assets/img/ML.png" class="team-image"></td>
                                        <td><h4 class="find-text">4 / 5</h4></td>
                                        <td><h4 class="find-text">Atra</h4></td>
                                        </tr>
                                        </tbody>
                                        <tbody>
                                        <tr>
                                            <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                                            <td><h4 class="find-text">Arandelle</h4></td>
                                            <td><img alt="" id="imgGame" src="assets/img/ML.png" class="team-image"></td>
                                            <td><h4 class="find-text">3 / 5</h4></td>
                                            <td><h4 class="find-text">LordShaman</h4></td>
                                        </tr>
                                        </tbody>
                                        <tbody>
                                        <tr>
                                            <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                                            <td><h4 class="find-text">Evos-Squad</h4></td>
                                            <td><img alt="" id="imgGame" src="assets/img/ML.png" class="team-image"></td>
                                            <td><h4 class="find-text">2 / 5</h4></td>
                                            <td><h4 class="find-text">JinXPro</h4></td>
                                        </tr>
                                        </tbody>
                                        <tbody>
                                        <tr>
                                            <td><img alt="" id="imgGame" src="assets/img/ML.png" class="find-image"></td>
                                            <td><h4 class="find-text">RRQ-Legends</h4></td>
                                            <td><img alt="" id="imgGame" src="assets/img/ML.png" class="team-image"></td>
                                            <td><h4 class="find-text">3 / 5</h4></td>
                                            <td><h4 class="find-text">SpaceTropper</h4></td>
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
