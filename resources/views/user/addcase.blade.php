@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
@endsection

@section('content')

  <div class="container title" id="t_title" style="margin-top: 100px;">
    <div class="row cases">
      <div class="col-md-12 text-center">
        <h3 class="">Add Case</h3>
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
      
        <form action="{{ route('create-case') }}" method="post">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Case No</label>
              <input type="text" class="form-control" name="caseNo" id="" value="" placeholder="Case No">
            </div>
            <div class="form-group col-md-6">
              <label for="">Section</label>
              <input type="text" class="form-control" name="section" id="" value="" placeholder="Section">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Court No</label>
              <input type="text" class="form-control" name="courtNo" id="" value="" placeholder="Court No">
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Category</label>
              <select class="custom-select" name="category" id="inputGroupSelect01">
                  <option selected>Choose...</option>
                  <option value="Civil">Civil</option>
                  <option value="Criminal">Criminal</option>
                  <option value="Others">Others</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Status</label>
            <select class="custom-select" name="status" id="inputGroupSelect01">
                  <option selected>Choose...</option>
                  <option value="Trial">Trial</option>
                  <option value="Appeal">Appeal</option>
                  <option value="Revision">Revision</option>
                  <option value="Investigation">Investigation</option>
                </select>
          </div>

          <button type="submit" class="btn btn-info">Submit</button>
        </form>


      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#addCaseLink').addClass('act');
    });
  </script>
@endsection
  
