@extends('layouts.master')

@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
  <script>
    $(document).ready(function () {
      $('#t_title').show();
      $('#m_profile').show();
      $('#a_title').hide();
      $('#a_profile').hide();
      $('#all_title').hide();
      $('#all_asso').hide();
      $('#minfo').click(function () {
        $('#t_title').show();
        $('#m_profile').show();
        $('#a_title').hide();
        $('#a_profile').hide();
        $('#all_title').hide();
        $('#all_asso').hide();
      });
      $('#asso').click(function () {
        $('#t_title').hide();
        $('#m_profile').hide();
        $('#a_title').show();
        $('#a_profile').show();
        $('#all_title').show();
        $('#all_asso').show();
      });
    });
  </script>
@endsection

@section('content')
  <div class="container pr-nav">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="#" id="minfo" onclick="displayDate()">MyInfo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="asso">Associates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="noc">NOC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="peti">Petition</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="other">Others</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container title" id="t_title">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">My profile info</h3>
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

  <div class="container own" id="m_profile">
    <div class="row">
      <div class="col-md-12">
        @foreach ($result as $row)
        
        <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="fullName" id="name" value="{{$row->name}}" placeholder="Full name">
            </div>
            <div class="form-group col-md-6">
              <label for="registration">Registration</label>
              <input type="text" class="form-control" name="userRegistration" id="registration" value="{{$row->registration_number}}" placeholder="Registration">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" name="userMail" id="inputEmail4" value="{{$row->email}}" placeholder="Email" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="userPhone" id="phone" value="{{$row->phone}}" placeholder="Phone number">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="userAddress" id="inputAddress" value="{{$row->address}}" placeholder="1234 Main St">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="userOldProfilePicture" id="" value="{{$row->profile_picture}}" placeholder="" hidden>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload profile picture</label>
            <input type="file" class="form-control-file" name="profilePicture" value="{{$row->profile_picture}}" id="exampleFormControlFile1">
          </div>

          <button type="submit" class="btn btn-info">Update</button>
        </form>

        @endforeach
      </div>
    </div>
  </div>

  <div class="container-fluid title" id="a_title">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">Associates profile</h3>
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
        <form action="{{ route('addAssociates') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="aName" id="name" placeholder="Full name">
            </div>
            <div class="form-group col-md-6">
              <label for="registration">Registration</label>
              <input type="text" class="form-control" name="aRegistration" id="registration" placeholder="Registration">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" name="aMail" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Password</label>
              <input type="text" class="form-control" name="aPhone" id="phone" placeholder="Phone number">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="aAddress" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload profile picture</label>
            <input type="file" class="form-control-file" name="aProfilePicture" id="exampleFormControlFile1">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid title" id="all_title">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">All Associates</h3>
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
  <div class="container cstable" id="all_asso">
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Registration</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($associates as $associate)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$associate->name}}</td>
                <td>{{$associate->registration_number}}</td>
                <td>{{$associate->email}}</td>
                <td>{{$associate->phone}}</td>
                <td>{{$associate->address}}</td>
                <td class="up"><a href="{{ url('/update-associate') }}?reg_id={{$associate->registration_number}}"><i class="fas fa-pen-square"></i></a></td>
                <td class="del"><a href="{{ url('/delete-associate') }}?reg_id={{$associate->registration_number}}&p_id={{$associate->profile_picture}}"><i class="fas fa-trash"></i></a> </td>
              </tr>

            @endforeach
            

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="container">
    <input type="text" style="display: none;" id="successMsg" value="{{$oData}}">
  </div>

<script type="text/javascript">
  $(document).ready(function () {
    var msg=$('#successMsg').val();
    if(msg!=""){
      notify('success', 'Message', msg);
    }
    $('#profileLink').addClass('act');
      $('#t_title').show();
      $('#m_profile').show();
      $('#a_title').hide();
      $('#a_profile').hide();
      $('#all_title').hide();
      $('#all_asso').hide();
      $('#minfo').click(function () {
        $('#t_title').show();
        $('#m_profile').show();
        $('#a_title').hide();
        $('#a_profile').hide();
        $('#all_title').hide();
        $('#all_asso').hide();
      });
      $('#asso').click(function () {
        $('#t_title').hide();
        $('#m_profile').hide();
        $('#a_title').show();
        $('#a_profile').show();
        $('#all_title').show();
        $('#all_asso').show();
      });
    });
</script>
      
@endsection