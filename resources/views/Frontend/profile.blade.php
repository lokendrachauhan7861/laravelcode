@extends('layouts.frontendUser')

@section('content')

<div class="col-md-10">
	<div class="row sty" >
		
   <h2 style="text-align: center;margin-top: 59px;margin-bottom: 29px;border-bottom:1px solid;    font-weight: 600;">My Profile</h2>
       @if (session()->has('success'))
        <div class="alert alert-success">

        <p>{{ session('success') }}</p>

        </div>
        @endif 
  <form method="post" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-6">
    
      <label for="email">User Name:</label>
      <input type="name" class="form-control" name="name" value="{{ $getUser[0]['name'] }}" placeholder="User Name" >
    </div>
    <div class="col-sm-6">
      <label for="email">User Email:</label>
      <input type="email" class="form-control" value="{{ $getUser[0]['email'] }}" placeholder="User Email" name="email">
    </div>
     <div class="col-sm-6">
      <label for="designation">Designation:</label>
      <input type="designation" class="form-control" value="{{ $getUser[0]['designation'] }}" placeholder="Enter Designation" name="designation">
    </div>
     <div class="col-sm-6">
      <label for="number">Phone Number:</label>
      <input type="number" class="form-control" value="{{ $getUser[0]['phone'] }}" placeholder="Enter Phone Number" name="phone">
    </div>
     <div class="col-sm-6">
      <label for="file">Profile Pic:</label>
      <input type="file" name="pic" class="form-control" placeholder="Enter password" accept="image/png, image/gif, image/jpeg">
    
    </div>
    <div class="col-sm-8" style="margin-top:10px;margin-bottom:10px;">
    <button type="submit" name="submit" class="btn btn-default">Update</button>
     </div>
    
  </form>
    
    </div>
</div>

@endsection