@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
@endsection

@section('content')
<div class="container case">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">All Cases</h3>
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
  <div class="container cstable">
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">CaseNo</th>
              <th scope="col">Section</th>
              <th scope="col">Category</th>
              <th scope="col">Court No</th>
              <th scope="col">Status</th>
              <th scope="col">Details</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
              <th scope="col">Archive</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($result as $row)
              <tr>
                <td>{{$row->case_no}}</td>
                <td>{{$row->section}}</td>
                <td>{{$row->category}}</td>
                <td>{{$row->court_no}}</td>
                <td>{{$row->status}}</td>
                <td class="view"><a href="{{ route('userCaseDetails') }}?c_no={{$row->case_no}}"><i class="fas fa-eye"></i></a></td>
                <td class="up"><a href="{{ route('update-case') }}?c_id={{$row->case_no}}"><i class="fas fa-pen-square"></i></a></td>
                <td class="del"><a href="{{ route('getDeleteCase') }}?c_no={{$row->case_no}}"><i class="fas fa-trash"></i></a> </td>
                <td class="arc"><a href="#"><i class="fas fa-file-archive"></i></a> </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $result->links() }}
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#allCaseLink').addClass('act');
    });
  </script>
@endsection