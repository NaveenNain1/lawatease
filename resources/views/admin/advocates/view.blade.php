@extends('layouts.adminapp')

@section('content')
@section('title')
All Advocates - >
@endsection
<!-- Button trigger modal -->


<!-- Modal -->
<form method="post" action="{{url('admin/add_users')}}">
    @csrf
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Advocate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>

                                                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email">

                                                            </div>
                        </div>
                             <div class="row mb-3">
                            <label for="utype" class="col-md-4 col-form-label text-md-end">Role</label>

                            <div class="col-md-6">
                                <select id="utype" type="text" name="utype" class="form-control" required  >
<option value="customer" disabled>Customer</option>
<option value="advocate">Advocate</option>
                                </select>
 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                                                            </div>
                        </div>

                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div></from>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Advocates') }}
<button type="button" class="btn btn-primary float-end btn-sm" data-toggle="modal" data-target="#addnew">
  Add New
</button>
                </div>

                <div class="card-body">
                       @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
@if(count($users)>0)
<div class="table-responsive">
<table class="table">
	<tr><th>Name</th><th>Email</th><th>Action</th></tr>
	@foreach($users as $get)
<tr><td>{{$get->name}}</td><td>{{$get->email}}</td><td><a href="view/{{$get->id}}" class="btn btn-primary btn-sm ">View</a>&nbsp;
<a href="addcases/{{$get->id}}" class="btn btn-primary btn-sm ">Add/View Cases</a>
</td></tr>
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
