@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/other.css')}}">
@endsection

@section('content')
<div class="container cases">
    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
          <div class="">
              <p class="alert alert-danger text-center">File already Exist!</p>
          </div>
        @endif
    </div>
      <div class="col-md-12 casetitle text-center">
        <h3>Add and Update your cases</h3>
      </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="case-tab" data-toggle="tab" href="#case" role="tab" aria-controls="case" aria-selected="true">Case Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="plaintiff-tab" data-toggle="tab" href="#plaintiff" role="tab" aria-controls="plaintiff" aria-selected="false">Plaintiff</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="defender-tab" data-toggle="tab" href="#defender" role="tab" aria-controls="defender" aria-selected="false">Defender</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="witness-tab" data-toggle="tab" href="#witness" role="tab" aria-controls="witness" aria-selected="false">Witness</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="oponant-tab" data-toggle="tab" href="#oponant" role="tab" aria-controls="oponant" aria-selected="false">Oponent</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="attendance-tab" data-toggle="tab" href="#attendance" role="tab" aria-controls="attendance" aria-selected="false">Attendance Date</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="conclusion-tab" data-toggle="tab" href="#conclusion" role="tab" aria-controls="conclusion" aria-selected="false">Conclusion</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="case" role="tabpanel" aria-labelledby="case-tab">

      @foreach ($result as $row)
        <form id="caseForm" method="post">
          {{csrf_field()}}
          <div class="row c-input">
            <div class="col">
              <input type="text" id="caseNo" name="case_no" value="{{$row->case_no}}" class="form-control" placeholder="Case No" readonly="">
            </div>
            <div class="col">
              <input type="text" id="sectionNo" name="section" value="{{$row->section}}" class="form-control" placeholder="Section">
            </div>
            <div class="col">
              <input type="text" id="courtNo" name="court_no" value="{{$row->court_no}}" class="form-control" placeholder="Court No">
            </div>
          </div>
          <div class="row c-input">
            <div class="col">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Category</label>
                </div>
                <select class="custom-select" name="category" id="category">
                  <option selected>{{$row->category}}</option>
                  <option value="Civil">Civil</option>
                  <option value="Criminal">Criminal</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Status</label>
                </div>
                <select class="custom-select" name="status" id="status">
                  <option selected>{{$row->status}}</option>
                  <option value="Trial">Trial</option>
                  <option value="Appeal">Appeal</option>
                  <option value="Revision">Revision</option>
                  <option value="Investigation">Investigation</option>
                </select>
              </div>
            </div>
            <div class="col">
              <input type="submit" id="submit" name="submit" class="btn btn-success" value="Update">
            </div>
          </div>
        </form>
      @endforeach
      </div>

      <div class="tab-pane fade" id="plaintiff" role="tabpanel" aria-labelledby="plaintiff-tab">

        <form id="plaintiffForm" method="post">
          {{csrf_field()}}

          <div class="row c-input">
            <div class="col">
              <input type="text" id="pcaseno" name="p_caseno" class="form-control" value="{{$updateCaseNo}}" readonly>
            </div>
            <div class="col">
              <input type="text" id="pname" name="p_name" class="form-control" placeholder="Plaintiff Name">
            </div>
            <div class="col">
              <input type="text" id="paddress" name="p_address" class="form-control" placeholder="Address">
            </div>
            <div class="col">
              <input type="text" id="pcontact" name="p_contact" class="form-control" placeholder="Contact No">
            </div>
          </div>
          <div class="row c-input">
            <div class="col-md-4">
              <input type="text" id="pcomment" name="p_comment" class="form-control" placeholder="Comments">
            </div>
            <div class="col">
              <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </form>

        <div class="row">
          <div class="col-md-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Comment</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="allPlaintiff">

            </tbody>
          </table>
        </div>
        </div>
      </div>

      <div class="tab-pane fade" id="defender" role="tabpanel" aria-labelledby="defender-tab">

        <form id="defenderForm" method="post">
          {{csrf_field()}}

          <div class="col">
              <input type="text" id="dcaseno" name="d_caseno" class="form-control" value="{{$updateCaseNo}}" readonly>
          </div>
          <div class="row c-input">
            <div class="col">
              <input type="text" id="dname" name="d_name" class="form-control" placeholder="Defender Name">
            </div>
            <div class="col">
              <input type="text" id="daddress" name="d_address" class="form-control" placeholder="Address">
            </div>
            <div class="col">
              <input type="text" id="dcontact" name="d_contact" class="form-control" placeholder="Contact No">
            </div>
          </div>
          <div class="row c-input">
            <div class="col-md-4">
              <input type="text" id="dcomment" name="d_comment" class="form-control" placeholder="Comments">
            </div>
            <div class="col">
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </form>

        <div class="row">
          <div class="col-md-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Comment</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="allDefender">
              
            </tbody>
          </table>
        </div>
        </div>
      </div>

      <div class="tab-pane fade" id="witness" role="tabpanel" aria-labelledby="witness-tab">
        <form id="witnessForm" method="post">
          {{csrf_field()}}
          <div class="col">
              <input type="text" id="wcaseno" name="w_caseno" class="form-control" value="{{$updateCaseNo}}" readonly>
          </div>
        <div class="row c-input">
          <div class="col">
              <input type="text" id="wname" name="w_name" class="form-control" placeholder="Witness Name">
          </div>
          <div class="col">
            <input type="text" id="waddress" name="w_address" class="form-control" placeholder="Address">
          </div>
          <div class="col">
            <input type="text" id="wcontact" name="w_contact" class="form-control" placeholder="Contact Number">
          </div>
        </div>
        <div class="row c-input">
          <div class="col">
              <input type="text" id="wstatus" name="w_status" class="form-control" placeholder="Witness Status">
          </div>
          <div class="col">
            <input type="text" id="wcomment" name="w_comment" class="form-control" placeholder="Witness Comment">
          </div>
          <div class="col">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
          </div>
        </div>
        </form>

        <div class="row">
          <div class="col-md-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Witness-Status</th>
                <th scope="col">Comment</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="allWitness">

            </tbody>
          </table>
        </div>
        </div>
      </div>

      <div class="tab-pane fade" id="oponant" role="tabpanel" aria-labelledby="oponant-tab">
        <form id="oponantForm" method="post">
          {{csrf_field()}}
          <div class="col">
              <input type="text" id="ocaseno" name="o_caseno" class="form-control" value="{{$updateCaseNo}}" readonly>
          </div>
        <div class="row c-input">
          <div class="col">
            <input type="text" id="oname" name="o_name" class="form-control" placeholder="Name">
          </div>
          <div class="col">
            <input type="text" id="ocontact" name="o_contact" class="form-control" placeholder="Contact">
          </div>
          <div class="col">
            <input type="text" id="oregistration" name="o_registration" class="form-control" placeholder="Membership No">
          </div>
          <div class="col">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
          </div>
        </div>
        </form>

        <div class="row">
          <div class="col-md-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Contact</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="allOponent">

            </tbody>
          </table>
        </div>
        </div>

      </div>

      <div class="tab-pane fade" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
        <form id="attendanceForm" method="post">
          {{csrf_field()}}
          <div class="col">
              <input type="text" id="acaseno" name="a_caseno" class="form-control" value="{{$updateCaseNo}}" readonly>
          </div>
        <div class="row c-input">
          <div class="col">
              <input type="date"  name="a_day" class="form-control">
          </div>
          <div class="col">
            <input type="text" id="acomment" name="a_comment" class="form-control" placeholder="Comments">
          </div>
          <div class="col">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
          </div>
        </div>
        </form>

        <div class="row">
          <div class="col-md-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Comment</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody id="allDate">

            </tbody>
          </table>
        </div>
        </div>

      </div>

      <div class="tab-pane fade" id="conclusion" role="tabpanel" aria-labelledby="conclusion-tab">
        <form action="{{ route('getUploadCaseFile') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="col">
              <input type="text" id="ccaseno" name="c_caseno" class="form-control" value="{{$updateCaseNo}}" readonly>
          </div>
          <div class="row c-input">
            <div class="col">
                <input type="text" id="c-result" name="c_result" class="form-control" placeholder="Result">
            </div>
            <div class="col-md-4">
              <input type="file" class="form-control-file" name="c_file" id="finalFile">
            </div>
            <div class="col">
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>


  <div class="modal" id="resultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
        <div class="modal-body">
          <h3 id="output" class="text-center text-success"></h3>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
  <script>
    $(document).ready(function(){

      var advocateCaseNo={{$updateCaseNo}};
      printPlaintiff(advocateCaseNo);

      function printPlaintiff(advocateCaseNo){
        $.ajax({
          url:"{{ route('getAllPlaintiff') }}?c_no="+advocateCaseNo,
          dataType:"json",
          success:function(data){
            var output='';
            for(var cnt=0;cnt<data.length;cnt++){
              output+='<tr>';
              output+='<td>'+(cnt+1)+'</td>';
              output+='<td>'+data[cnt].name+'</td>';
              output+='<td>'+data[cnt].address+'</td>';
              output+='<td>'+data[cnt].contact+'</td>';
              output+='<td>'+data[cnt].comment+'</td>';
              output+='<td><button type="button" class="editPlaintiffBtn btn btn-warning">Edit</button></td>';
              output+='<td><button type="button" class="deletePlaintiffBtn btn btn-danger" id="'+data[cnt].pid+'">Delete</button></td>';
              output+='<tr>';
            }
            $('#allPlaintiff').html(output);
            }
        });
      }

      function printDefender(advocateCaseNo){
        $.ajax({
          url:"{{ route('getAllDefender') }}?c_no="+advocateCaseNo,
          dataType:"json",
          success:function(data){
            var output='';
            for(var cnt=0;cnt<data.length;cnt++){
              output+='<tr>';
              output+='<td>'+(cnt+1)+'</td>';
              output+='<td>'+data[cnt].name+'</td>';
              output+='<td>'+data[cnt].address+'</td>';
              output+='<td>'+data[cnt].contact+'</td>';
              output+='<td>'+data[cnt].comment+'</td>';
              output+='<td><button type="button" class="editPlaintiffBtn btn btn-warning">Edit</button></td>';
              output+='<td><button type="button" class="deleteDefenderBtn btn btn-danger" id="'+data[cnt].did+'">Delete</button></td>';
              output+='<tr>';
            }
            $('#allDefender').html(output);
            }
        });
      }

      function printWitness(advocateCaseNo){
        $.ajax({
          url:"{{ route('getAllWitness') }}?c_no="+advocateCaseNo,
          dataType:"json",
          success:function(data){
            var output='';
            for(var cnt=0;cnt<data.length;cnt++){
              output+='<tr>';
              output+='<td>'+(cnt+1)+'</td>';
              output+='<td>'+data[cnt].name+'</td>';
              output+='<td>'+data[cnt].address+'</td>';
              output+='<td>'+data[cnt].contact+'</td>';
              output+='<td>'+data[cnt].type+'</td>';
              output+='<td>'+data[cnt].comment+'</td>';
              output+='<td><button type="button" class="editPlaintiffBtn btn btn-warning">Edit</button></td>';
              output+='<td><button type="button" class="deleteWitnessBtn btn btn-danger" id="'+data[cnt].wid+'">Delete</button></td>';
              output+='<tr>';
            }
            $('#allWitness').html(output);
            }
        });
      }

      function printOponent(advocateCaseNo){
        $.ajax({
          url:"{{ route('getAllOponent') }}?c_no="+advocateCaseNo,
          dataType:"json",
          success:function(data){
            var output='';
            for(var cnt=0;cnt<data.length;cnt++){
              output+='<tr>';
              output+='<td>'+(cnt+1)+'</td>';
              output+='<td>'+data[cnt].name+'</td>';
              output+='<td>'+data[cnt].registration_number+'</td>';
              output+='<td>'+data[cnt].contact+'</td>';
              output+='<td><button type="button" class="editPlaintiffBtn btn btn-warning">Edit</button></td>';
              output+='<td><button type="button" class="deleteOponentBtn btn btn-danger" id="'+data[cnt].oid+'">Delete</button></td>';
              output+='<tr>';
            }
            $('#allOponent').html(output);
            }
        });
      }

      function printDate(advocateCaseNo){
        $.ajax({
          url:"{{ route('getAllDate') }}?c_no="+advocateCaseNo,
          dataType:"json",
          success:function(data){
            var output='';
            for(var cnt=0;cnt<data.length;cnt++){
              output+='<tr>';
              output+='<td>'+(cnt+1)+'</td>';
              output+='<td>'+data[cnt].date+'</td>';
              output+='<td>'+data[cnt].comment+'</td>';
              output+='<td><button type="button" class="deleteDateBtn btn btn-danger" id="'+data[cnt].id+'">Delete</button></td>';
              output+='<tr>';
            }
            $('#allDate').html(output);
            }
        });
      }

      //printPlaintiff(advocateCaseNo);
      printDefender(advocateCaseNo);
      printWitness(advocateCaseNo);
      printOponent(advocateCaseNo);
      printDate(advocateCaseNo);

      $('#caseForm').on('submit',function(event){
        event.preventDefault();
        
        var form_data=$(this).serialize();

        $.ajax({
          url:"{{ route('getUpdateCase') }}",
          method:"POST",
          data:form_data,
          dataType:"json",
          success:function(data){
            //alert(data);
            //console.log(data);
            $('#output').html(data).success;
            $('#resultModal').modal('show');
          }
        });

      });

      $('#plaintiffForm').on('submit',function(event){
        event.preventDefault();

        var form_data=$(this).serialize();

        $.ajax({
          url:"{{ route('addPlaintiff') }}",
          method:"POST",
          data:form_data,
          dataType:"json",
          success:function(data){
            //alert(data);
            //console.log(data);
            $('#output').html(data).success;
            //$('#resultModal').modal('show');
            notify('success', 'Message', 'Add plaintiff succcessfully.');
            $('#pname').val("");
            $('#paddress').val("");
            $('#pcontact').val("");
            $('#pcomment').val("");

            printPlaintiff(advocateCaseNo);
          }
        });

      });


        $('#defenderForm').on('submit',function(event){
        event.preventDefault();

        var form_data=$(this).serialize();

        $.ajax({
          url:"{{ route('addDefender') }}",
          method:"POST",
          data:form_data,
          dataType:"json",
          success:function(data){
            $('#output').html(data).success;
            //$('#resultModal').modal('show');
            notify('success', 'Message', 'Add defender succcessfully.');
            $('#dname').val("");
            $('#daddress').val("");
            $('#dcontact').val("");
            $('#dcomment').val("");
            printDefender(advocateCaseNo);
          }
        });

      });


        $('#witnessForm').on('submit',function(event){
        event.preventDefault();

        var form_data=$(this).serialize();

        $.ajax({
          url:"{{ route('addWitness') }}",
          method:"POST",
          data:form_data,
          dataType:"json",
          success:function(data){
            $('#output').html(data).success;
            //$('#resultModal').modal('show');
            notify('success', 'Message', 'Add witness succcessfully.');
            $('#wname').val("");
            $('#waddress').val("");
            $('#wcontact').val("");
            $('#wstatus').val("");
            $('#wcomment').val("");
            printWitness(advocateCaseNo);
          }
        });

      });


    $('#oponantForm').on('submit',function(event){
        event.preventDefault();

        var form_data=$(this).serialize();

        $.ajax({
          url:"{{ route('addOpponent') }}",
          method:"POST",
          data:form_data,
          dataType:"json",
          success:function(data){
            $('#output').html(data).success;
            //$('#resultModal').modal('show');
            notify('success', 'Message', 'Add oponant succcessfully.');
            $('#oname').val("");
            $('#oregistration').val("");
            $('#ocontact').val("");
            printOponent(advocateCaseNo);
          }
        });

      });

    $('#attendanceForm').on('submit',function(event){
        event.preventDefault();

        var form_data=$(this).serialize();

        $.ajax({
          url:"{{ route('addDate') }}",
          method:"POST",
          data:form_data,
          dataType:"json",
          success:function(data){
            $('#output').html(data).success;
            //$('#resultModal').modal('show');
            notify('success', 'Message', 'Add new date succcessfully.');
            $('#acomment').val("");
            printDate(advocateCaseNo);
          }
        });

      });

    $(document).on('click','.deletePlaintiffBtn',function(){
      var id=$(this).attr("id");
      if(confirm("Are you sure you want to delete?")){
        $.ajax({
          url:"{{ url('/delete-plaintiff') }}?p_id="+id,
          dataType:"json",
          success:function(data){
            printPlaintiff({{$updateCaseNo}});
          }
        });
      }
    });

    $(document).on('click','.deleteDefenderBtn',function(){
      var id=$(this).attr("id");
      if(confirm("Are you sure you want to delete?")){
        $.ajax({
          url:"{{ url('/delete-defender') }}?id="+id,
          dataType:"json",
          success:function(data){
            printDefender({{$updateCaseNo}});
          }
        });
      }
    });

    $(document).on('click','.deleteWitnessBtn',function(){
      var id=$(this).attr("id");
      if(confirm("Are you sure you want to delete?")){
        $.ajax({
          url:"{{ url('/delete-witness') }}?id="+id,
          dataType:"json",
          success:function(data){
            printWitness({{$updateCaseNo}});
          }
        });
      }
    });

    $(document).on('click','.deleteOponentBtn',function(){
      var id=$(this).attr("id");
      if(confirm("Are you sure you want to delete?")){
        $.ajax({
          url:"{{ url('/delete-oponent') }}?id="+id,
          dataType:"json",
          success:function(data){
            printOponent({{$updateCaseNo}});
          }
        });
      }
    });

    $(document).on('click','.deleteDateBtn',function(){
      var id=$(this).attr("id");
      if(confirm("Are you sure you want to delete?")){
        $.ajax({
          url:"{{ url('/delete-date') }}?id="+id,
          dataType:"json",
          success:function(data){
            printDate({{$updateCaseNo}});
          }
        });
      }
    });

    });

  </script>
@endsection  
