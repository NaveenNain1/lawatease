@extends('layouts.customerpanel')

@section('content')
@section('title')
Business Entity
@endsection
 @foreach($beneficiary as $get)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Business Entity') }}</div>

                <div class="card-body">
                     <form method="post" enctype="multipart/form-data">
                        @csrf
     <div class="row">
           <div class="form-group col-sm-4">
    <label for="name_of_legal_entity">Name of Legal Entity*</label>
    <input type="text" class="form-control" required name="name_of_legal_entity" value="{{$get->name_of_legal_entity}}" value="" id="name_of_legal_entry" placeholder="Enter Name of Legal Entity">
   </div>
       <div class="form-group col-sm-4">
    <label for="nature_of_entity"> Nature of Entity*</label>
    <select  class="form-control" required id="nature_of_entity" name="nature_of_entity" value=""  >
        <option>{{$get->nature_of_entity}}</option>
        <option>Partnership firm</option>
        <option>Pvt Ltd</option>
        <option>Public Limited</option>
        <option>Limited Liability Partnership</option>
        <option>One Person Company</option>
        <option>Trust</option>
        <option>Society</option>

        </select>
 
   </div>  
        <div class="form-group col-sm-4">
    <label for="cin">Registration No / CIN*</label>
    <input type="text" class="form-control" required name="cin" id="cin" value="{{$get->cin}}" placeholder="Enter Registration No / CIN">
   </div>
  <div class="form-group col-sm-4">
    <label for="registration_date">Incorporation/ Registration Date*</label>
    <input type="date" class="form-control" required name="registration_date" value="{{$get->registration_date}}" id="registration_date"  >
   </div>
  <div class="form-group col-sm-4">
    <label for="pan_no">PAN No of the Entity*</label>
    <input type="text" class="form-control" required name="pan_no" value="{{$get->pan_no}}" id="pan_no" placeholder="Enter PAN NO.">
   </div>
 <div class="form-group col-sm-4">
    <label for="gst_no">GST No of Entity</label>
    <input type="text" class="form-control"  name="gst_no" value="{{$get->gst_no}}" id="gst_no" placeholder="Enter GST NO.">
   </div>

   
     </div>
     <?php
 $addresses=App\Models\addresses::where('id',$get->permanent_addresses_id)->get();
if(count($addresses)>0){
  foreach($addresses as $address2){
   $house_no=$address2->house_no;
$street=$address2->street;
$district=$address2->district;
$state=$address2->state;
$country=$address2->country;
$pincode=$address2->pincode;
}}else{
  $house_no='';
$street='';
$district='';
$state='';
$country='';
$pincode='';
}
?>
<b>Registered Office Address</b><hr>


<div class="row">
 <div class="form-group col-sm-4">
    <label for="permanent_house_no"> H No/ Flat No*</label>
    <input type="text" class="form-control" required name="permanent_house_no"  value="{{$house_no}}" id="permanent_house_no" placeholder="Enter PAN NO.">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_street"> Street/ Locality</label>
    <input type="text" class="form-control"  name="permanent_street" value="{{$street}}"  id="permanent_street" placeholder="Enter Street/ Locality">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_district"> District*</label>
    <input  type="text" class="form-control" placeholder="Enter District Name" value="{{$district}}"  required name="permanent_district" id="permanent_district"  >
 
   </div>
     <div class="form-group col-sm-4">
    <label for="permanent_state"> State*</label>
    <input  type="text" class="form-control" required placeholder="Enter State Name" value="{{$state}}"  name="permanent_state" id="permanent_state"  >
 
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_country"> Country*</label>
    <input type="text" value="India" readonly class="form-control" required name="permanent_country" value="{{$country}}"  id="permanent_country"  >
   </div>

    <div class="form-group col-sm-4">
    <label for="permanent_pincode"> Pincode*</label>
    <input  type="text" class="form-control" required placeholder="Enter Pincode" name="permanent_pincode" id="permanent_pincode" value="{{$pincode}}"   >
 
   </div>

  

 </div>
  <?php
 $addresses=App\Models\addresses::where('id',$get->correspondance_addresses_id )->get();
if(count($addresses)>0){
  foreach($addresses as $address2){
   $house_no=$address2->house_no;
$street=$address2->street;
$district=$address2->district;
$state=$address2->state;
$country=$address2->country;
$pincode=$address2->pincode;
}}else{
  $house_no='';
$street='';
$district='';
$state='';
$country='';
$pincode='';
}
?>
 <b>Correspondance Address</b>
  <div class="form-group form-check">
    <input type="checkbox" onchange="onchange_correspondance_address_same_as_permanent_address(this)" name="correspondance_same" class="form-check-input" id="correspondance_same"
<?php
if($get->correspondance_addresses_id==$get->permanent_addresses_id){
	echo " checked ";
}
?>
    >
    <label class="form-check-label" for="correspondance_same">Tick here if Correspondance Address is Same as Registered Office Address</label>
  </div>
  <hr> 
<input type="hidden" name="correspondance_address_same_as_permanent_address" id="correspondance_address_same_as_permanent_address" value="0">
   <div class="row" id="correspondance_address_div">
 <div class="form-group col-sm-4">
    <label for="correspondance_house_no"> H No/ Flat No*</label>
    <input type="text" class="form-control"  name="correspondance_house_no" id="correspondance_house_no" placeholder="Enter House NO." value="{{$house_no}}">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_street"> Street/ Locality</label>
    <input type="text" class="form-control"  name="correspondance_street" id="correspondance_street" placeholder="Enter Street/ Locality" value="{{$street}}">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_district"> District*</label>
    <input   type="text" class="form-control"  placeholder="Enter District Name" name="correspondance_district" id="correspondance_district"  value="{{$district}}" >
 
   </div>
     <div class="form-group col-sm-4">
    <label for="correspondance_state"> State*</label>
    <input  type="text" class="form-control" placeholder="Enter State Name"  name="correspondance_state" id="correspondance_state"   value="{{$state}}">
 
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_country"> Country*</label>
    <input type="text" value="India" readonly class="form-control"  name="correspondance_country" id="correspondance_country"  value="{{$country}}" >
   </div>

    <div class="form-group col-sm-4">
    <label for="correspondance_pincode"> Pincode*</label>
    <input  type="text" class="form-control"  placeholder="Enter Pincode"  name="correspondance_pincode" id="correspondance_pincode" value="{{$pincode}}"  >
 
   </div>

</div><hr>
<b>Details of Authorised Person</b><hr>
<div class="row">

    <div class="form-group col-sm-4">
    <label for="first_name"> First Name*</label>
    <input  type="text" class="form-control" required name="first_name" value="{{$get->first_name}}" id="first_name"  placeholder="Enter First Name">
 
   </div>
     <div class="form-group col-sm-4">
    <label for="middle_name"> Middle Name</label>
    <input  type="text" class="form-control" placeholder="Enter Middle Name"  name="middle_name" value="{{$get->middle_name}}" id="middle_name"  >
 
   </div>
     <div class="form-group col-sm-4">
    <label for="last_name"> Last Name</label>
    <input  type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="{{$get->last_name}}" id="last_name"  >
 
   </div>

     <div class="form-group col-sm-4">
    <label for="email_id"> Email Id*</label>
    <input  type="email" class="form-control" placeholder="Enter Email Id" required name="email_id" id="email_id" value="{{$get->email_id}}"  >
  </div>
   <div class="form-group col-sm-4">
    <label for="mobile_number"> Mobile Number [linked with Aadhar Card]*</label>
    <input  type="number" class="form-control" placeholder="Enter Mobile No" required  name="mobile_number" id="mobile_number" value="{{$get->mobile_number}}"  >
 
   </div>
<div class="form-group col-sm-4">
    <label for="whatsapp_no"> Whatsapp No</label>
    <input  type="number" class="form-control" placeholder="Enter Whatsapp No"   name="whatsapp_no" id="whatsapp_no" value="{{$get->whatsapp_no}}"  >
 
   </div>

<div class="form-group col-sm-4">
    <label for="dob">Date of Birth*</label>
    <input  type="date" class="form-control" required   name="dob" value="{{$get->dob}}" id="dob"  >
 
   </div>
<div class="form-group col-sm-4">
    <label for="gender">Gender*</label>
    <select   class="form-control" required   name="gender"   id="gender"  >
    	<option>{{$get->gender}}</option>
 <option>Male</option>
  <option>Female</option>
 <option>Transgender</option>
</select>
    </div> 


<div class="form-group col-sm-4">
    <label for="designation"> Designation*</label>
    <input  type="text" class="form-control" required placeholder="Enter Designation"   name="designation" id="designation" value="{{$get->designation}}"  >
 
   </div>

   <div class="form-group col-sm-4">
    <label for="aadhar_no"> Aadhar No*</label>
    <input  type="number" class="form-control" required placeholder="Enter Aadhar no."   name="aadhar_no" id="aadhar_no" value="{{$get->aadhar_no}}"  >
 
   </div>
</div>
<b>Upload Documents :-</b><hr>
<div class="row">

<div class="form-group col-sm-4">
    <label for="business_entity_registration_certificate"> Business Entity Registration Certificate*</label>
    <input  type="file" class="form-control" required  name="business_entity_registration_certificate" id="business_entity_registration_certificate"  >
 
 @if($get->business_entity_registration_certificate!="" and file_exists($get->business_entity_registration_certificate))
<a href="{{url($get->business_entity_registration_certificate)}}">View File</a>
 @endif
   </div>
   <div class="form-group col-sm-4">
    <label for="pan_card"> PAN of Entity*</label>
    <input  type="file" class="form-control" required  name="pan_card" id="pan_card"  >
  @if($get->pan_card!="" and file_exists($get->pan_card))
<a href="{{url($get->pan_card)}}">View File</a>
 @endif
   </div>
 <div class="form-group col-sm-4">
    <label for="address_proof"> Address Proof of Business Entity*</label>
    <input  type="file" class="form-control" required  name="address_proof" id="address_proof"  >
 
 @if($get->address_proof!="" and file_exists($get->address_proof))
<a href="{{url($get->address_proof)}}">View File</a>
 @endif
   </div>
   <div class="form-group col-sm-4">
    <label for="gst_certificate">GST of Entity [Optional]</label>
    <input  type="file" class="form-control"   name="gst_certificate" id="gst_certificate"  >
 
 @if($get->gst_certificate!="" and file_exists($get->gst_certificate))
<a href="{{url($get->gst_certificate)}}">View File</a>
 @endif
   </div>
      <div class="form-group col-sm-4">
    <label for="authorization_letter">Authorization Letter*</label>
    <input  type="file" class="form-control" required  name="authorization_letter" id="authorization_letter"  >
    @if($get->authorization_letter!="" and file_exists($get->authorization_letter))
<a href="{{url($get->authorization_letter)}}">View File</a>
    @endif
 
   </div>
     <div class="form-group col-sm-4">
    <label for="aadhar_card">Aadhar Card of Authorized Person*</label>
    <input  type="file" class="form-control" required  name="aadhar_card" id="aadhar_card"  >
 
 @if($get->aadhar_card!="" and file_exists($get->aadhar_card))
<a href="{{url($get->aadhar_card)}}">View File</a>
 @endif
   </div>
    <div class="form-group col-sm-4">
    <label for="dob_proof">DOB Proof of Authorized Person*</label>
    <input  type="file" class="form-control" required  name="dob_proof" id="dob_proof"  >
 
 @if($get->dob_proof!="" and file_exists($get->dob_proof))
<a href="{{url($get->dob_proof)}}">View File</a>
 @endif
   </div>
</div>
<b>Terms of adding Beneficiary</b><hr>
  <div class="form-group form-check">
    <input type="checkbox" required name="liptm" class="form-check-input" id="liptm">
    <label class="form-check-label" for="liptm">I have taken the consent of LIPTM purchaser for adding myself as beneficiary for this LIPTM plan</label>
  </div>
<div class="form-group form-check">
    <input type="checkbox" required class="form-check-input" name="true_information" id="true_information">
    <label class="form-check-label" for="true_information">The information provided above in the form are true and correct to my knowledge.</label>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" required class="form-check-input" name="agree_terms
    " id="agree_terms">
    <label class="form-check-label" for="agree_terms">I hereby agree to terms and conditions</label>
  </div>


   
     
  <button type="button" onclick="return alert('This feature is not done yet!');" class="btn btn-primary">Submit for Review & Approval  </button>
</form>
 
    <script>
   function onchange_correspondance_address_same_as_permanent_address(checkbox) {
     
  if(checkbox.checked == true){
      var correspondance_address_div = document.getElementById("correspondance_address_div");
      var correspondance_address_same_as_permanent_address = document.getElementById("correspondance_address_same_as_permanent_address");
   correspondance_address_div.style.display ='none';
   correspondance_address_same_as_permanent_address.value=1;

    }else{
  var correspondance_address_div = document.getElementById("correspondance_address_div");
   correspondance_address_div.style.display =null;
         var correspondance_address_same_as_permanent_address = document.getElementById("correspondance_address_same_as_permanent_address");
            correspondance_address_same_as_permanent_address.value=0;

    }
     }
setInterval(function() {
      onchange_correspondance_address_same_as_permanent_address(document.getElementById('correspondance_same'));
}, 1000)
      onchange_correspondance_address_same_as_permanent_address(document.getElementById('correspondance_same'));

</script>             </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
