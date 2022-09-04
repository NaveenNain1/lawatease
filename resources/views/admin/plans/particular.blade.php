@extends('layouts.adminapp')

@section('content')
@section('title')
Add particular
@endsection
@if(isset($saved) || isset($_GET['s']))
<div class="alert alert-success">
Success! data has been saved successfully.</div>
@endif
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Plan::Particular') }}</div>

                <div class="card-body">
                	  @if(isset($error))
<div class="alert alert-danger">
  Error
  <ul>

@foreach($error->all() as $d)
<?php $err=1; ?>
<li>{{$d}}</li>
@endforeach
  </ul>

</div>
        @endif
                     <form method="post">
                     	@csrf
   <div class="row">
  <div class="form-group col-md-5">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name..." name="name"@if(isset($_POST['name']) and isset($err))
value="{{$_POST['name']}}" 
    @endif
    >
  </div>
    <div class="form-group col-md-5">
    <label for="unit">Unit</label>
    <input type="text" class="form-control" id="unit" placeholder="Unit..." name="unit"@if(isset($_POST['unit']) and isset($err))
value="{{$_POST['unit']}}" 
    @endif
    >
  </div>
<div class="col-sm-2"><br>
  <button type="submit" class="btn btn-primary">Submit</button></div></div>
</form>
<hr>
@if(count($get)>0)
<div class="table-responsive">
<table class="table-bordered table stable-stripe " width="100%">
<tr><th>Name</th><th>Unit</th><th>Can Avail</th><th>Edit</th><th>Delete</th></tr>
@foreach($get as $get2)
<tr><td>{{$get2->name}}</td><td>{{$get2->unit}}</td>
<td><label class="switch">
  <input type="checkbox" 
@if($get2->can_avail==1)
 checked 
@endif
   onclick="change_can_avail({{$get2->id}})">
  <span class="slider round"></span>
</label></td>
  <td><a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{$get2->id}}">Edit</a>
<!-- Modal -->
<form method="post" action="{{url('admin/plans/particular/update')}}">
  @csrf
<div class="modal fade" id="editModal{{$get2->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editing {{$get2->name}}...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" value="{{$get2->id}}">
          <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$get2->name}}" placeholder="Name...">
  </div>
       <div class="form-group">
    <label for="name">Unit</label>
    <input type="text" class="form-control" id="unit" name="unit" value="{{$get2->unit}}" placeholder="Unit...">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div></form>
</td><td><a href="" class="btn btn-danger btn-sm">Delete</a></td></tr>

@endforeach
</table></div>
@endif
<script type="text/javascript">
  function change_can_avail(id){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       // document.getElementById("success").innerHTML = ;
    }
};
xhttp.open("GET", "{{url('admin/plans/particular/change_can_avail')}}?id="+id, true);
xhttp.send();
  }
</script>
            </div>
        </div>
    </div>
</div>
@endsection
