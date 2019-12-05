@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/other.css')}}">
@endsection

@section('content')
<div class="container nextAD">
    <div class="row justify-content-center">
      <div class="col-md-6 ok">
        <div class="row ingroup">
          <div class="col-md-8">
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Case No</span>
              </div>
              <input type="text" class="form-control" aria-label="caseNo" aria-describedby="addon-wrapping">
            </div>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-success">Search</button>
          </div>
        </div>
        <div class="row ingroup">
          <div class="col-md-12">
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Last Date</span>
              </div>
              <input type="date" name="bday" class="form-control">
            </div>
          </div>
        </div>
        <div class="row ingroup">
          <div class="col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Comment</span>
              </div>
              <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
          </div>
        </div>
        <div class="row ingroup">
          <div class="col-md-12">
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Next Date</span>
              </div>
              <input type="date" name="bday" class="form-control">
            </div>
          </div>
        </div>
        <div class="row ingroup">
          <div class="col-md-4">
            <button type="button" class="btn btn-lg" style="background: #e17055;color:#fff;">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection