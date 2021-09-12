@extends('master')
@section('content')
<div style="margin-top:120px;" class="container">
<div class="row">
<h1 style="display:block;margin:auto">Register</h1>
<div class="col-12">

<form action='register' method='POST'>
    @csrf
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" name="cpassword"> 
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>
</div>
@endsection