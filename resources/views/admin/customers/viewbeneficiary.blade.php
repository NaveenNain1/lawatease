@extends('layouts.adminapp')

@section('content')
@section('title')
All Beneficiary of Customer
@endsection
@foreach($users as $users2)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customer::Beneficiary') }}</div>

                <div class="card-body">
                    Name: <b>{{$users2->name}}</b>,<br>
                        Email: <b>{{$users2->email}}</b>
   <div class="row">
@if(count($beneficiary)>0)
<div class="row">
    @foreach($beneficiary as $get2)
<div class="col-sm-3 btn-sm" style="margin: 30px;font-size: 19px;background-color:#cdbcd8;text-align: center;cursor:pointer"
<?php
if($get2->is_business_entity==1){ ?>
onclick="window.location='{{$id}}/viewbusiness_entity/{{$get2->id}}'"
<?php }else{
  ?>
onclick="window.location='{{$id}}/viewindividual/{{$get2->id}}'"
<?php
} ?>
>
@if($get2->is_business_entity==1)
<i class="bx bxs-business"></i> 

{{$get2->name_of_legal_entity}}

@else
<i class="bx bxs-user"></i> 

{{$get2->first_name}}

@endif
<br>
@if($get2->is_verifed==1)

<small><i>(Verified)</i></small>
@else
<small><i>(In Review)</i></small>
@endif
</div>
@endforeach
</div>
@else
<p style="text-align: center;"><b>No records found</b></p>
@endif
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
