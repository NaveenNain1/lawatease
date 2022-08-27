@extends('layouts.adminapp')

@section('content')
@section('title')
All Customers - >
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customers') }}</div>

                <div class="card-body">
@if(count($users)>0)
<div class="table-responsive">
<table class="table">
	<tr><th>Name</th><th>Email</th><th>Action</th></tr>
	@foreach($users as $get)
<tr><td>{{$get->name}}</td><td>{{$get->email}}</td><td><a href="viewplans/{{$get->id}}" class="btn btn-primary btn-sm ">LIP LIST</a>
&nbsp;
<a href="viewbeneficiary/{{$get->id}}" class="btn btn-primary btn-sm ">Beneficiary</a></td></tr>
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
