@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
@endsection

@section('content')
<div class="container-fluid head" style="background:url('images/head.jpg') center center fixed;"></div>


  @foreach ($result as $row)
    <div class="container info">
    <div class="row">
      <div class="col-sm ownself">
        <h3>{{$row->name}}</h3>
        <ul>
          <li><b>Registration: </b>{{$row->registration_number}}</li>
          <li><b>Address: </b>{{$row->address}}</li>
          <li><b>Email: </b>{{$row->email}}</li>
          <li><b>Phone: </b>{{$row->phone}}</li>
        </ul>
      </div>
      <div class="col-sm text-center pro-image">
        <img src="images/profile-picture/{{$row->profile_picture}}" alt="Profile Picture" class="img-thumbnail">
      </div>
      <div class="col-sm associates">
        <h3>Associates</h3>
        @foreach ($associates as $associate)
          <p><i class="fas fa-handshake"></i> <a href="{{ route('associateDetails') }}?reg_id={{$associate->registration_number}}" class="associate">{{$associate->name}}</a></p>
        @endforeach
        

      </div>
    </div>
  </div>
  @endforeach


{{-- Mobile view --}}

    <div class="container nfo">
    <div class="row">
      @foreach ($result as $row)
        <div class="col-sm text-center pro-image">
          <img src="images/profile-picture/{{$row->profile_picture}}" alt="Profile Picture" class="img-thumbnail">
        </div>
        <div class="col-sm ownself">
          <h3>{{$row->name}}</h3>
          <ul>
            <li><b>Registration: </b>{{$row->registration_number}}</li>
            <li><b>Address: </b>{{$row->address}}</li>
            <li><b>Email: </b>{{$row->email}}</li>
            <li><b>Phone: </b>+88{{$row->phone}}</li>
          </ul>
        </div>
      @endforeach


      <div class="col-sm associates">
        <h3>Associates</h3>
        @foreach ($associates as $associate)
          <p><i class="fas fa-handshake"></i> <a href="{{ route('associateDetails') }}?reg_id={{$associate->registration_number}}" class="associate">{{$associate->name}}</a></p>
        @endforeach
      </div>

    </div>
  </div>
  

  <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Associates Profile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body mbody">
                <img src="" alt="" class="img-thumbnail" id="associatePicture">
                <h3 id="associateName"></h3>
                <p><b>Registration: </b><span id="associateRegId"></span></p>
                <p><b>Address: </b><span id="associateAddress"></span></p>
                <p><b>Email: </b><span id="associateEmail"></span></p>
                <p><b>Phone: </b>+88<span id="associatePhone"></span></p>
              </div> <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>



@endsection

@section('script')

  <script>
    $(document).ready(function(){
      $('#homeLink').addClass('act');
      $('.associate').click(function(e){
        e.preventDefault();
        var url1=$(this).attr('href');
        $.get(url1, function(data){
          data=JSON.parse(data);
          data.forEach(function(element){
            $('#associatePicture').attr('src','images/associates/'+element.profile_picture);
            $('#associateName').text(element.name);
            $('#associateRegId').text(element.registration_number);
            $('#associateAddress').text(element.address);
            $('#associateEmail').text(element.email);
            $('#associatePhone').text(element.phone);

            $('#myModal').modal('show');
          });
        });
      });
    })
  </script>

@endsection