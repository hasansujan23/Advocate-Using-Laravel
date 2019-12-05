@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<style>
  button{
    background-color: #fff;
    border: none;
  }
</style>
@endsection

@section('content')
<div class="container case">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">Archive Cases</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="line" ></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="ln" ></div>
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
            <th scope="col">Details</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($result as $row)
            <tr>
              <td>{{$row->case_no}}</td>
              <td>{{$row->section}}</td>
              <td>{{$row->category}}</td>
              <td>{{$row->court_no}}</td>
              <td class="view"><button class="showBtn" id="{{$row->url}}"><i class="fas fa-eye"></i></button></td>
              <td class="del"><a href="{{ route('getDeleteCaseFile') }}?c_no={{$row->case_no}}&f_name={{$row->url}}"><i class="fas fa-trash"></i></a> </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>

  <div class="modal bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="viewPdf" src="" width="100%" height="500px"></iframe>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#archiveLink').addClass('act');
      $('.showBtn').click(function(){
        var id=$(this).attr("id");
        $('#viewPdf').attr('src','{{ asset('files/final/') }}/'+id);
        $('#myModal').modal('show');
        //alert(id);
      });
    });
  </script>
@endsection
