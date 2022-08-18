@extends('layouts.adminapp')

@section('content')
@section('title')
Customers - > Plans
@endsection
	@foreach($users as $get)
 @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
<div class="container">
    <div class="row justify-content-center">
    	<div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Customer Details') }}</div>

                <div class="card-body">
  <b>Name:</b> {{$get->name}},<br> <b>Email:</b> {{$get->email}} 
                </div>
            </div>
        </div>
               <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Plan') }}</div>

                <div class="card-body">
<form method="post">
    @csrf
    <div class="row">
  <div class="form-group col-sm-6">
    <label for="plans_id">Select Plan</label>
    <select class="form-control" id="plans_id"  name="plans_id" required>
@foreach($plans as $plans2)
<option value="{{$plans2->id}}">{{$plans2->name}}</option>
@endforeach
    </select>
   </div>
     <div class="form-group col-sm-6">
    <label for="purchase_price">Price</label>
    <input type="number" class="form-control" id="purchase_price" name="purchase_price" required>
   </div>
   <div class="form-group col-sm-6">
    <label for="purchase_date">Purchase Date</label>
    <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
   </div>
      <div class="form-group col-sm-6">
    <label for="period">Period</label>
    <input type="number" class="form-control" id="period" name="period" required>
   </div>
    <div class="form-group col-sm-6">
    <label for="period_type">Period Type</label>
    <select class="form-control" id="period_type" name="period_type" required>
<option >Monthly</option>
<option >Annual</option>
    </select>
   </div>
   <div class="col-sm-6"><br>
       <button type="submit" class="btn btn-primary">Submit</button>

   </div>
 </div>
 
</form>
                </div>
            </div>
        </div>
       @if(count($CustomerPlans)>0)
     <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Plans Purchased By Customer ('.$get->name.')') }}</div>

                <div class="card-body">
<div class="table-responsive">
  <table class="table">
    <tr><th>Plan Name</th><th>Plan Price</th><th>Period</th><th>Type</th><th>Date</th><th></th></tr>
    @foreach($CustomerPlans as $CustomerPlans2)
<tr><td>{{$CustomerPlans2->name}}</td><td>{{$CustomerPlans2->purchase_price}}</td><td>{{$CustomerPlans2->period}}</td><td>{{$CustomerPlans2->period_type}}</td><td>{{$CustomerPlans2->purchase_date}}</td><td><a href="">View Details</a></td></tr>
    @endforeach
  </table>
</div>
                </div>
            </div>
        </div>
       @endif
  
 
    </div>
    </div>
</div>
@endforeach
@endsection
