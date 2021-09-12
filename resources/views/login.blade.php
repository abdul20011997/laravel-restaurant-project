@extends('master')
@section('content')
<div style="margin-top:120px;" class="container">
<div class="row">
<h1 style="display:block;margin:auto">Login</h1>
<div class="col-12" style="height:378px;">

<form action="login" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"> 
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>
</div>
@endsection