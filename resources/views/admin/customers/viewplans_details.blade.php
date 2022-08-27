@extends('layouts.adminapp')

@section('content')
@section('title')
MY LIPTM
@endsection
  @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
 @foreach($CustomerPlans as $get)
<div class="container">
    <div class="row justify-content-center">
    	<div class="row">
        
                
      <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Plans Details') }}</div>

                <div class="card-body">
<div class="table-responsive">
  @foreach($users as $get)
    <b>Name:</b> {{$get->name}},<br> <b>Email:</b> {{$get->email}} 
@endforeach
  <table class="table">
   <tr><th >LIPTM Purchased</th><td>{{$get->name}}</td><td></td><th>Payment Plan</th><td>{{$get->period_type}}</td></tr>
   <tr><th>Payment Due Date</th><td>Auto fetch from Zoho Subscription app</td><td></td>
<th>Amount Due [Rs]</th><td>Auto fetch from Zoho Subscription app<br>
<a href="" class="btn btn-primary btn-sm">Pay Now</a>
</td> 
   </tr>
   <tr><th>Particulars</th><th>Qty Purchased</th><th>Qty Consumed</th><th>Balance</th><th>Action</th></tr>
   @foreach($CustomerPlansParticulars as $data)
<tr><td>{{$data->name}}</td><td>{{$data->total_service}} {{$data->unit}}</td><td>{{$data->used_service}}</td><td>{{$data->total_service-$data->used_service}}</td><td><a href="">Avial Now</a></td></tr>
   @endforeach
  </table>
</div>
                </div>
            </div>
        </div>
     
  
 
    </div>
    </div>
</div>
@endforeach
 @endsection
