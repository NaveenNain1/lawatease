@extends('layouts.advocatepanel')

@section('content')
@section('title')
Upload Documents
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                    <div style="text-align:center">
                 
 <h4><b>Upload Documents*
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
 <form method="post" enctype="multipart/form-data">
 	@csrf
 	<div class="row">
  <div class="form-group col-sm-4">
    <label for="type">Type</label>
    <input type="text" class="form-control" id="type" name="type" list="typelist">
<datalist id="typelist">
<option value="Aadhar Card"/>
<option value="Pan Card"/>
<option value="Bar council registration certificate"/>
<option value="LLB Passing certificate/degree"/>
<option value="GST No"/>
</datalist>
</div>
 <div class="form-group col-sm-4">
    <label for="file">File</label>
    <input type="file" class="form-control" id="file" name="file">
 
</div>
 <div class="col-sm-4"><br><br>
  <button type="submit" class="btn btn-primary">Submit</button>

 </div>
</div>
</form>
 @if(count($EmpanellmentDocuments)>0)
 <div class="table-responsive">
<table class="table">
	<tr><th>Type</th><th>File</th><th>Action</th></tr>
	@foreach($EmpanellmentDocuments as $get)
	<tr><td>{{$get->type}}</td><td><a href="{{url($get->file)}}">View File</a></td><td><a href="{{url('advocate/empanellment_complete/EmpanellmentDocuments/delete/'.$get->id)}}" onclick="return confirm('Are you sure to delete it!');" class="btn btn-primary btn-sm">Delete</a></td></tr>

	@endforeach
</table>
</div>
 @endif
 
                 </div>
            </div>
        </div>
    </div>
</div>
 
 @endsection
