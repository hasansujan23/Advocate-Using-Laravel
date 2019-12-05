@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
@endsection

@section('content')

    <div class="container casa-details">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{ asset('images/logCover.png') }}" alt="Logo" height="120" width="120">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center case-intro">
                <h3>Case Details</h3>
                <p>Case No: {{$caseNo}}</p>
            </div>
        </div>
        <hr class="hrstyle">
        <div class="container okiamgood table-responsive">
          <p>General information of the case</p>
          <table class="table">
            <thead class="text-center">
              <tr class="tab-col">
                <th>CaseNo</th>
                <th>SectionNo</th>
                <th>CourtNo</th>
                <th>Category</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach ($case as $row)
                <tr class="tab-col">
                  <td>{{$row->case_no}}</td>
                  <td>{{$row->section}}</td>
                  <td>{{$row->court_no}}</td>
                  <td>{{$row->category}}</td>
                  <td>{{$row->status}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
            <div class="col-md-12 info-head">
                <p>Plaintiff Information</p>
            </div>
        </div>
        <div class="row tab">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($plaintiff as $row)
                      <tr>
                        <td width="25%">{{$row->name}}</td>
                        <td width="25%">{{$row->address}}</td>
                        <td width="25%">{{$row->contact}}</td>
                        <td width="25%">{{$row->comment}}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 info-head">
                <p>Defender Information</p>
            </div>
        </div>
        <div class="row tab">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($defender as $row)
                      <tr>
                        <td width="25%">{{$row->name}}</td>
                        <td width="25%">{{$row->address}}</td>
                        <td width="25%">{{$row->contact}}</td>
                        <td width="25%">{{$row->comment}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 info-head">
                <p>Witness Information</p>
            </div>
        </div>
        <div class="row tab">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Status</th>
                      <th scope="col">Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($witness as $row)
                      <tr>
                        <td width="25%">{{$row->name}}</td>
                        <td width="25%">{{$row->address}}</td>
                        <td width="25%">{{$row->contact}}</td>
                        <td width="25%">{{$row->type}}</td>
                        <td width="25%">{{$row->comment}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 info-head">
                <p>Attendance date</p>
            </div>
        </div>
        <div class="row tab">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dates as $row)
                      <tr>
                        <th scope="row" width="50%">{{$row->date}}</th>
                        <td width="50%">{{$row->comment}}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 info-head">
                <p>Opponent Information</p>
            </div>
        </div>
        <div class="row tab">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Member No</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($oponent as $row)
                      <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->registration_number}}</td>
                        <td>{{$row->contact}}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('body').css('background-image', 'url("{{ asset('images/backone.jpg') }}")');
    });
  </script>
@endsection
  
