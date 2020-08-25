@extends('layouts.main')
@section('main')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container">
      <div class="row" style="margin-top: 15%;">
        <div class="col-md-6">
          <div class="form-group" >
            <label for="exampleInputEmail1" style="color: white;">Team Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1"  style="border-radius: 10px; height: 60px;background-color: #35356C;border: none; color: white;">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group" >
            <label for="exampleInputEmail1" style="color: white;">Team TAG</label>
            <input type="email" class="form-control" id="exampleInputEmail1"  style="border-radius: 10px; height: 60px; background-color: #35356C;border: none; color: white;">
          </div>

        </div>
      </div>
      <label for="scrollform" style="color: white;">Game</label>
      <div class="form-group">
          <label for="emailFrom" class="col-lg-2 control-label">From:</label>
        <select class="form-control" id="emailFrom" name="emailFrom">
          <option>Select Email Address</option>
          <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio Rodriguez (sergio.rodriguez@tix.com)</option>
          <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia Mahoney (sergio.rodriguez@tix.com)</option>
          <option value="Steve Moore|steve.moore@tix.com">Steve Moore (sergio.rodriguez@tix.com)</option>
          <option value="Luke Perria|luke.perria@tix.com">Adam Hettinger (sergio.rodriguez@tix.com)</option>
          <option value="Luke Perria|luke.perria@tix.com">Luke Perea (sergio.rodriguez@tix.com)</option>
        </select>
        </div>
      <div class="form-group" style="margin-top: 3%;" >
        <label for="exampleInputEmail1" style="color: white;">Description</label>
        <input type="email" class="form-control" id="exampleInputEmail1"  style="border-radius: 10px; height: 100px; background-color: #35356C;border: none;color: white;">
      </div>
      <a class="btn btn-primary" href="#" role="button" style="width: 150px;height: 40px; border-radius: 20px;">Submit</a>
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
@endsection