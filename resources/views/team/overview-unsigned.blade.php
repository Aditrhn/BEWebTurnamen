@extends('layouts.main')
@section('main')
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- PANEL DETAILS -->
            <div class="panel panel-default">
                <div class="col-lg-4 col-xs-12">
                    <!-- PANEL HEADLINE -->
                    <h3>Overview</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="overview">
                            <div class="overview">
                                <div class="col-lg-5 col-sm-4">
                                    <img src="assets/img/1x1.jpg" alt="">
                                </div>
                                <div class="team-overview col-lg-7 col-sm-8">
                                    <h3>Onde Mande Team</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12">
                    <h3>Team Roaster
                        <span>
                            <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#joinTeam">Join Team</a>
                        </span>
                    </h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="member">
                    <!-- PANEL NO PADDING -->
                            <div class="member">
                                <div class="col-lg-2 col-xs-6 col-lg-offset-1">
                                    <img src="assets/img/user3.png">
                                    <h4>Dazz</h4>
                                    <p>Captain</p>
                                </div>
                                <div class="col-lg-2 col-xs-6">
                                    <img src="assets/img/user3.png">
                                    <h4>Three Shoot</h4>
                                </div>
                                <div class="col-lg-2 col-xs-6">
                                    <img src="assets/img/user3.png">
                                    <h4>Dazz</h4>
                                </div>
                                <div class="col-lg-2 col-xs-6">
                                    <img src="assets/img/user3.png">
                                    <h4>Dazz</h4>
                                </div>
                                <div class="col-lg-2 col-xs-6">
                                    <img src="assets/img/user3.png">
                                    <h4>Dazz</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL NO PADDING -->
                </div>
                <!-- END PANEL HEADLINE -->
                <div class="col-lg-4 col-xs-12">
                    <!-- PANEL HEADLINE -->
                    <h3>Team Info</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="team-static">
                            <div class="team-static">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="team-info-game">
                                        <div class="row">
                                            <h4 class="pull-left col-lg-12">Game Focus</h4>
                                        </div>
                                        <img src="assets/img/ML.png"alt="">
                                        <h3>Mobile Legends</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="team-info-support">
                                        <div class="row">
                                            <h4 class="pull-left col-lg-12">Supported</h4>
                                        </div>
                                        <div class="col-lg-6 col-xs-6">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-xs-6">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-xs-6" style="margin-top: 10px;">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-xs-6" style="margin-top: 10px;">
                                            <img src="assets/img/1x1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
                <div class="col-lg-8 col-xs-12">
                    <!-- PANEL NO PADDING -->
                    <h3>Description</h3>
                    <div class="panel panel-headline">
                        <div class="panel-body" id="description">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, eveniet molestias dolor maiores adipisci aliquam. Laborum quam nihil ut, mollitia itaque perferendis quia omnis dolorum fugit provident ipsam, nisi repellat.</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, eveniet molestias dolor maiores adipisci aliquam. Laborum quam nihil ut, mollitia itaque perferendis quia omnis dolorum fugit provident ipsam, nisi repellat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus officia atque modi, itaque impedit debitis pariatur ipsam nulla, aliquid exercitationem laborum neque eos blanditiis omnis ad, doloremque dolor inventore quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem deserunt sequi fugiat dicta voluptas esse et quidem numquam necessitatibus repellendus ratione tempora eveniet, culpa itaque magnam! Consequuntur officiis dolor corrupti! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deleniti recusandae saepe doloribus? Illum delectus dolore error recusandae aperiam, veniam alias obcaecati magnam minima voluptate cumque odit asperiores dolor hic?</p>
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
            </div>
            <!-- PANEL RULES -->
            <!-- The modal -->
            <div class="modal fade" id="joinTeam" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header title-friend">
                            <button type="button" class="close btn-friend-close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                            <label for=""> Add Friend </label>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Friend" name="q">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!--Friend List-->
                                <div class="friend-list">
                                    <div class="col-xs-12 friend-modal">
                                        <div class="col-xs-3">
                                            <img class="img-friend" src="assets/img/user3.png">
                                        </div>
                                        <div class="col-xs-4 friend-modal text-friend">
                                            <h4>Mystea</h4>
                                        </div>
                                        <div class="col-xs-5 friend-btn">
                                            <input type="button" value="Add Friend" class="btn btn-primary nextBtn pull-right">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 friend-modal">
                                        <div class="col-xs-3">
                                            <img class="img-friend" src="assets/img/user3.png">
                                        </div>
                                        <div class="col-xs-4 friend-modal text-friend">
                                            <h4>Mystea</h4>
                                        </div>
                                        <div class="col-xs-5 friend-btn">
                                            <input type="button" value="Add Friend" class="btn btn-primary nextBtn pull-right">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 friend-modal">
                                        <div class="col-xs-3">
                                            <img class="img-friend" src="assets/img/user3.png">
                                        </div>
                                        <div class="col-xs-4 friend-modal text-friend">
                                            <h4>Mystea</h4>
                                        </div>
                                        <div class="col-xs-5 friend-btn">
                                            <input type="button" value="Add Friend" class="btn btn-primary nextBtn pull-right">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 friend-modal">
                                        <div class="col-xs-3">
                                            <img class="img-friend" src="assets/img/user3.png">
                                        </div>
                                        <div class="col-xs-4 friend-modal text-friend">
                                            <h4>Mystea</h4>
                                        </div>
                                        <div class="col-xs-5 friend-btn">
                                            <input type="button" value="Add Friend" class="btn btn-primary nextBtn pull-right">
                                        </div>
                                    </div>
                                </div>
                                <!--End Friend List-->

                                <!--Invite Link-->
                                <div class="col-xs-12 friend-link">
                                    <label for="" class="bg-light"> Or, send invite link to a friend</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="https://getbootstrap.com/docs/4.3/components/forms/" name="q">
                                        <div class="input-group-btn">
                                            <input type="button" value="Copy" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection