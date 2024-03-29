@extends('layouts.customerpanel')

@section('content')
@section('title')
My beneficiary
@endsection
@if(isset($_GET['s']))
<div style='border:
  1.0pt solid black;height:auto;width:auto;font-size: 20pt;'>Thanks for Adding the
  Beneficiary. A Welcome Email with Verfication Link has been sent to the Added
  Beneficiary. Please click on the verification link with next 24 hours. Post
  verification, our Team shall review the Beneficiary details and would approve
  the same within 8 working hours.</div>
  @else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My beneficiary') }}</div>

                <div class="card-body">
              <div class="row">
@if(count($beneficiary)>0)
<div class="row">
    @foreach($beneficiary as $get2)
<div class="col-sm-3 btn-sm" style="margin: 30px;font-size: 19px;background-color:#cdbcd8;text-align: center;cursor:pointer"
<?php
if($get2->is_business_entity==1){ ?>
onclick="window.location='viewbusiness_entity/{{$get2->id}}'"
<?php }else{
  ?>
onclick="window.location='viewindividual/{{$get2->id}}'"
<?php
} ?>
>
@if($get2->is_business_entity==1)
<i class="bx bxs-business"></i> 

{{$get2->name_of_legal_entity}}

@else
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
@endif
@endsection
