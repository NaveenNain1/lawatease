@extends('layouts.adminapp')

@section('content')
@section('title')
All Advocates - >
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Advocates') }}</div>

                <div class="card-body">
@if(count($users)>0)
<div class="table-responsive">
<table class="table">
	<tr><th>Name</th><th>Email</th><th>Action</th></tr>
	@foreach($users as $get)
<tr><td>{{$get->name}}</td><td>{{$get->email}}</td><td><a href="view/{{$get->id}}" class="btn btn-primary btn-sm ">View</a></td></tr>
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
