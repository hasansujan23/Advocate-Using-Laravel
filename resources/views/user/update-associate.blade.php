@extends('layouts.master')

@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
@endsection

@section('content')

  <div class="container-fluid title" id="a_title" style="margin-top: 100px;">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">Update Associates Profile</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="line"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="ln"></div>
      </div>
    </div>
  </div>

  <div class="container associates" id="a_profile">
    <div class="row">
      <div class="col-md-12">
      	@foreach ($result as $row)
	      	<form action="{{ route('getUpdateAssociate') }}" method="post" enctype="multipart/form-data">
	          {{csrf_field()}}

	          <div class="form-row">
	          	<div class="form-group col-md-12 text-center">
	          		<img class="img-fluid" src="{{ asset('images/associates/'.$row->profile_picture) }}" alt="" style="width: 200px;border-radius: 100px;">
	          	</div>
	          </div>

	          <div class="form-row">
	            <div class="form-group col-md-6">
	              <label for="name">Full Name</label>
	              <input type="text" class="form-control" name="aName" id="name" placeholder="Full name" value="{{$row->name}}">
	            </div>
	            <div class="form-group col-md-6">
	              <label for="registration">Registration</label>
	              <input type="text" class="form-control" name="aRegistration" id="registration" placeholder="Registration" value="{{$row->registration_number}}" readonly>
	            </div>
	          </div>
	          <div class="form-row">
	            <div class="form-group col-md-6">
	              <label for="inputEmail4">Email</label>
	              <input type="email" class="form-control" name="aMail" id="inputEmail4" placeholder="Email" value="{{$row->email}}">
	            </div>
	            <div class="form-group col-md-6">
	              <label for="phone">Phone</label>
	              <input type="text" class="form-control" name="aPhone" id="phone" placeholder="Phone number" value="{{$row->phone}}">
	            </div>
	          </div>
	          <div class="form-group">
	            <label for="inputAddress">Address</label>
	            <input type="text" class="form-control" name="aAddress" id="inputAddress" placeholder="1234 Main St" value="{{$row->address}}">
	          </div>
	          <div class="form-group">
	            <label for="exampleFormControlFile1">Upload profile picture</label>
	            <input type="file" class="form-control-file" name="aProfilePicture" id="exampleFormControlFile1">
	          </div>
	          <button type="submit" class="btn btn-info">Update</button>
	        </form>
      	@endforeach

      </div>
    </div>
  </div>

@endsection