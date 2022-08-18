@extends('layouts.advocatepanel')

@section('content')
@section('title')
Details of Existing Empanelment(s) with other Organizations
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                    <div style="text-align:center">
                 
 <h4><b>    Details of Existing Empanelment(s) with other Organizations

 </b></h4> 

</div>
<div style="text-align:right">
  <a href="{{url('/advocate/empanellment_complete/')}}" class="btn btn-secondary btn-sm float-end">
  GO Back</a>
</div>
 @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
 @if(isset($data_error))
<?php
$err=1;
?>
<div class="alert alert-danger" >Errors:
  <ul>
@foreach($data_error->all() as $err)
<li>{{$err}}</li>

@endforeach
</ul>
</div>
@endif
@if(isset($file_errors))
<?php
$err=1;
?>
<div class="alert alert-danger" >Errors:
  <ul>
 {!!$file_errors!!} 
 
</ul>
</div>
@endif

 <form method="post"  enctype="multipart/form-data">
   @csrf
   <div class="row">
  <div class="form-group col-sm-4">
    <label for="name">Name of Organization*</label>
    <input   type="text" class="form-control" required  id="name" name="name" <?php if(isset($err) and isset($_POST['name'])){
      echo 'value="'.$_POST['name'].'"';
    } ?>   placeholder="Enter  Name of Organization">
   </div>
     <div class="form-group col-sm-4">
    <label for="EmpanelledSince">Empanelled Since*</label>
    <input   type="date" class="form-control" required  id="EmpanelledSince" name="EmpanelledSince" <?php if(isset($err) and isset($_POST['EmpanelledSince'])){
      echo 'value="'.$_POST['EmpanelledSince'].'"';
    } ?>  >
   </div>
        <div class="form-group col-sm-4">
    <label for="EmpanelmentLetter">Upload Empanelment Letter*</label>
    <input   type="file" class="form-control" required  id="EmpanelmentLetter" name="EmpanelmentLetter" <?php if(isset($err) and isset($_POST['EmpanelmentLetter'])){
      echo 'value="'.$_POST['EmpanelmentLetter'].'"';
    } ?>  >
   </div>
   <div class="form-group col-sm-3">
    <label for="ReferenceName">Name of Reference<br>in the Organization*</label>
    <input   type="text" class="form-control" required  id="ReferenceName" name="ReferenceName" <?php if(isset($err) and isset($_POST['ReferenceName'])){
      echo 'value="'.$_POST['ReferenceName'].'"';
    } ?>  >
   </div>
   <div class="form-group col-sm-3">
    <label for="ReferenceMobile">Mobile No of the Reference Person*</label>
    <input   type="text" class="form-control" required  id="ReferenceMobile" name="ReferenceMobile" <?php if(isset($err) and isset($_POST['ReferenceMobile'])){
      echo 'value="'.$_POST['ReferenceMobile'].'"';
    } ?>  >
   </div>
   <div class="col-sm-4"><br><br>
<input type="submit" class="btn btn-primary" value="Add">
   </div>
   </div>
 </form>
 <hr>
 @if(count($ExistingEmpanelment)>0)
 <div class="table-responsive">
<table class="table">
  <tr><th>Name</th><th>Empanelled Since</th><th>EmpanelmentLetter</th><th>ReferenceName</th><th>ReferenceMobile</th><th>Action</th></tr>
  @foreach($ExistingEmpanelment as $data)
  <tr><td>{{$data->name}}</td><td>{{$data->EmpanelledSince}}</td><td><a href="{{url($data->EmpanelmentLetter)}}">View</a></td><td>{{$data->ReferenceName}}</td><td>{{$data->ReferenceMobile}}</td><td><a href="{{url('advocate/empanellment_complete/existing_empanelment/delete/'.$data->id)}}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to remove it');">Delete</a></td></tr>

  @endforeach
</table>
</div>
 @endif
                 </div>
            </div>
        </div>
    </div>
</div>
 
</script> 
@endsection
