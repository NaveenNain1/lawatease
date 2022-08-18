@extends('layouts.customerpanel')

@section('content')
@section('title')
MY LIPTM
@endsection
  @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
<div class="container">
    <div class="row justify-content-center">
    	<div class="row">
        
                
       @if(count($CustomerPlans)>0)
     <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Plans Purchased') }}</div>

                <div class="card-body">
<div class="table-responsive">
  <table class="table">
    <tr><th>Plan Name</th><th>Plan Price</th><th>Period</th><th>Type</th><th>Date</th><th></th></tr>
    @foreach($CustomerPlans as $CustomerPlans2)
<tr><td>{{$CustomerPlans2->name}}</td><td>{{$CustomerPlans2->purchase_price}}</td><td>{{$CustomerPlans2->period}}</td><td>{{$CustomerPlans2->period_type}}</td><td>{{$CustomerPlans2->purchase_date}}</td><td><a href="viewdetails/{{$CustomerPlans2->id}}">View Details</a></td></tr>
    @endforeach
  </table>
</div>
                </div>
            </div>
        </div>
       @else

       @endif
  
 
    </div>
    </div>
</div>
 @endsection
