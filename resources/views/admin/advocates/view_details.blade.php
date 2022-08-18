@extends('layouts.adminapp')

@section('content')
@section('title')
All Advocates - >
@endsection
	@foreach($users as $get)

<div class="container">
    <div class="row justify-content-center">
    	<div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Advocates Details') }}</div>

                <div class="card-body">
  <b>Name:</b> {{$get->name}},<br> <b>Email:</b> {{$get->email}} 
                </div>
            </div>
        </div>
        @if(count($BankDetails)>0)
          <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Bank Details') }}</div>

                <div class="card-body">
<div class="table-responsive">
<table class="table">
	@foreach($BankDetails as $BankDetails2)
<tr><th>Name of Bank</th><td>{{$BankDetails2->bank_name}}</td></tr>
<tr><th>Account No</th><td>{{$BankDetails2->account_no}}</td></tr>
<tr><th>IFSC Code</th><td>{{$BankDetails2->ifsc_no}}</td></tr>
<tr><th>Name of Account Holder</th><td>{{$BankDetails2->account_holder_name}}</td></tr>
<tr><th>Address of the Branch</th><td>{{$BankDetails2->branch_address}}</td></tr>
<tr><th>Upload Cancelled Cheque</th><td><a href="{{url($BankDetails2->cancelled_cheque)}}" target="_blank">View File</a>
</td></tr>
	@endforeach
</table>
</div>
                </div>
            </div>
        </div>
        @endif
@if(count($AdvocateEmpanellment)>0)
 <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Empanellment Data') }}</div>

                <div class="card-body">
@foreach($AdvocateEmpanellment as $AdvocateEmpanellment2)
@if($AdvocateEmpanellment2->is_submitted!=1)
<div class="alert alert-warning">This data is not submitted for review.<br>
So, please don't check any correction or data. Advocate can change them anytime;
</div>
@elseif($AdvocateEmpanellment2->is_verified!=1)
<div class="alert alert-warning">This data is not verified yet!
</div>
@endif
<table class="table">
    <tr><th>Column Name</th><td>Data</td><th>Column Name</th><td>Data</td></tr>
	<tr><th>Name</th><td>{{$AdvocateEmpanellment2->first_name}} {{$AdvocateEmpanellment2->middle_name}} {{$AdvocateEmpanellment2->last_name}}</td><th>Father Name</th><td>{{$AdvocateEmpanellment2->father_name}}</td></tr>
	<tr><th>Bar Council Enrollment No</th><td>{{$AdvocateEmpanellment2->bar_council_enrollment_no}}</td> <th>Date of Bar Council Enrollment</th><td>{{$AdvocateEmpanellment2->date_of_bar_council_enrollment}}</td></tr>
	<tr><th>Email Id</th><td>{{$AdvocateEmpanellment2->email_id}}</td>
        <th>Mobile Number</th><td>{{$AdvocateEmpanellment2->mobile_number}}</td></tr>
	<tr><th>Whatsapp No</th><td>{{$AdvocateEmpanellment2->whatsapp_no}}</td><th>Date Of Birth</th><td>{{$AdvocateEmpanellment2->dob}}</td></tr>
	<tr><td colspan="2">Permanent Address:-<table class="table>">
	<?php 
 $addresses=App\Models\AdvocateAddresses::where('id',$AdvocateEmpanellment2->permanent_addresses_id)->get();
if(count($addresses)>0){
  foreach($addresses as $address2){
  $house_no=$address2->house_no;
$street=$address2->street;
$district=$address2->district;
$state=$address2->state;
$country=$address2->country;
$pincode=$address2->pincode;
?>
<tr><th>House No</th><td>{{$house_no}}</td></tr>
<tr><th>Street Add.</th><td>{{$street}}</td></tr>
<tr><th>District</th><td>{{$district}}</td></tr>
<tr><th>State</th><td>{{$state}}</td></tr>
<tr><th>Country</th><td>{{$country}}</td></tr>
<tr><th>Pincode</th><td>{{$pincode}}</td></tr>
<?php
}}
	 ?>
</table>
    </td> <td colspan="2">Correspondance  Address:-
        <table class="table>">
	<?php 
 $addresses=App\Models\AdvocateAddresses::where('id',$AdvocateEmpanellment2->correspondance_addresses_id)->get();
if(count($addresses)>0){
  foreach($addresses as $address2){
  $house_no=$address2->house_no;
$street=$address2->street;
$district=$address2->district;
$state=$address2->state;
$country=$address2->country;
$pincode=$address2->pincode;
?>
<tr><th>House No</th><td>{{$house_no}}</td></tr>
<tr><th>Street Add.</th><td>{{$street}}</td></tr>
<tr><th>District</th><td>{{$district}}</td></tr>
<tr><th>State</th><td>{{$state}}</td></tr>
<tr><th>Country</th><td>{{$country}}</td></tr>
<tr><th>Pincode</th><td>{{$pincode}}</td></tr>
<?php
}}
	 ?></table></td></tr>
 
  </table>
@endforeach
                	       </div>
            </div>
        </div>
@else
 <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Empanellment Data') }}</div>

                <div class="card-body">
Not Uploaded Yet
                	       </div>
            </div>
        </div>
@endif
    </div>
    </div>
</div>
@endforeach
@endsection
