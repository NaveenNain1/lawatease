@extends('layouts.customerpanel')

@section('content')
@section('title')
Add individual beneficiary
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add individual beneficiary') }}</div>

                <div class="card-body">
          
@if(isset($data_error))
<?php
$err=1;
?>
<div class="alert alert-danger" >Errors:
  <ul>
@foreach($data_error->all() as $err)
<li>{{$err}}</li>

@endforeach
</ul>
</div>
@endif

@if(isset($file_errors))
<?php
$err=1;
?>
<div class="alert alert-danger" >Errors:
  <ul>
 {!!$file_errors!!}

 </ul>
</div>
@endif

                <form method="post" enctype="multipart/form-data">
                  @csrf
 <b> Details of the Beneficiary:-</b><hr>
  <div class="row">
  <div class="form-group col-sm-4">
    <label for="first_name">First Name*</label>
    <input type="text" class="form-control" required id="first_name" name="first_name"
<?php if(isset($err)){ echo 'value="'.$_POST['first_name'].'"';} ?>
      placeholder="Enter First Name">
   </div>
  <div class="form-group col-sm-4">
    <label for="middle_name">Middle Name</label>
    <input type="text" class="form-control"   id="middle_name" name="middle_name"
<?php if(isset($err)){ echo 'value="'.$_POST['middle_name'].'"';} ?>
      placeholder="Enter Middle Name">
   </div>
     <div class="form-group col-sm-4">
    <label for="last_name">Last Name*</label>
    <input type="text" class="form-control" required id="last_name" name="last_name"
<?php if(isset($err)){ echo 'value="'.$_POST['last_name'].'"';} ?>
      placeholder="Enter Last Name">
   </div>
    <div class="form-group col-sm-4">
    <label for="father_name">Father Name*</label>
    <input type="text" class="form-control" required id="father_name" name="father_name"
<?php if(isset($err)){ echo 'value="'.$_POST['father_name'].'"';} ?>
      placeholder="Enter Father Name">
   </div>
<div class="form-group col-sm-4">
    <label for="mother_name">Mother Name*</label>
    <input type="text" class="form-control" required id="mother_name" name="mother_name"
<?php if(isset($err)){ echo 'value="'.$_POST['mother_name'].'"';} ?>
      placeholder="Enter Mother Name">
   </div>
<div class="form-group col-sm-4">
    <label for="spouse_name">Spouse Name [If Married]</label>
    <input type="text" class="form-control"  id="spouse_name" name="spouse_name"
<?php if(isset($err)){ echo 'value="'.$_POST['spouse_name'].'"';} ?>
      placeholder="Enter Spouse Name">
   </div>

<div class="form-group col-sm-4">
    <label for="email_id">Email Id*</label>
    <input type="email" class="form-control" required  id="email_id" name="email_id"
<?php if(isset($err)){ echo 'value="'.$_POST['email_id'].'"';} ?>
      placeholder="Enter Email ID">
   </div>

<div class="form-group col-sm-4">
    <label for="mobile_number">Mobile Number [linked with Aadhar Card]*</label>
    <input type="number" class="form-control" required  id="mobile_number" name="mobile_number"
<?php if(isset($err)){ echo 'value="'.$_POST['mobile_number'].'"';} ?>
      placeholder="Enter mobile No.">
   </div>
<div class="form-group col-sm-4">
    <label for="whatsapp_no">Whatsapp No</label>
    <input type="number" class="form-control"   id="whatsapp_no" name="whatsapp_no"
<?php if(isset($err)){ echo 'value="'.$_POST['whatsapp_no'].'"';} ?>
      placeholder="Enter Whatsapp No.">
   </div>


  </div> 
<b>Permanent Address:-</b>
<hr>
<div class="row">
  <div class="form-group col-sm-4">
    <label for="permanent_house_no">House No/ Flat No*</label>
    <input type="text" class="form-control"  required id="permanent_house_no" name="permanent_house_no"
<?php if(isset($err)){ echo 'value="'.$_POST['permanent_house_no'].'"';} ?>
      placeholder="Enter House No/ Flat No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_street">Street / Locality</label>
    <input type="text" class="form-control"  id="permanent_street" name="permanent_street"
<?php if(isset($err)){ echo 'value="'.$_POST['permanent_street'].'"';} ?>
      placeholder="Enter Street">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_district">District*</label>
    <input type="text" class="form-control" required id="permanent_district" name="permanent_district"
<?php if(isset($err)){ echo 'value="'.$_POST['permanent_district'].'"';} ?>
      placeholder="Enter District">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_state">State*</label>
    <input type="text" class="form-control" required  id="permanent_state" name="permanent_state"
<?php if(isset($err)){ echo 'value="'.$_POST['permanent_state'].'"';} ?>
      placeholder="Enter State">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_country">Country*</label>
    <input type="text" class="form-control" required id="permanent_country" name="permanent_country"
<?php if(isset($err)){ echo 'value="'.$_POST['permanent_country'].'"';} ?>
      placeholder="Enter Country">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_pincode">Pincode*</label>
    <input type="number" class="form-control" required id="permanent_pincode" name="permanent_pincode"
<?php if(isset($err)){ echo 'value="'.$_POST['permanent_pincode'].'"';} ?>
      placeholder="Enter Pincode">
   </div>

</div>

<b>Correspondance Address:-</b> <div class="form-group form-check">
    <input type="checkbox"  class="form-check-input" id="checked_address" onchange="onchange_correspondance_address_same_as_permanent_address(this)" <?php
if(isset($err)){ echo 'checked';}  
    ?>>
    <label class="form-check-label" for="checked_address" value="1"> Tick here if Correspondance Address is Same as Permanent Address</label>
  </div>
<hr>
<input type="hidden" name="correspondance_address_same_as_permanent_address"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_address_same_as_permanent_address'].'"';}else { echo "value='0'" ; } ?>
 id="correspondance_address_same_as_permanent_address" >
<div class="row" id="correspondance_address_div">
  <div class="form-group col-sm-4">
    <label for="correspondance_house_no">House No/ Flat No</label>
    <input type="text" class="form-control"   id="correspondance_house_no" name="correspondance_house_no"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_house_no'].'"';} ?>
      placeholder="Enter House No/ Flat No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_street">Street / Locality</label>
    <input type="text" class="form-control"  id="correspondance_street" name="correspondance_street"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_street'].'"';} ?>
      placeholder="Enter Street">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_district">District</label>
    <input type="text" class="form-control"  id="correspondance_district" name="correspondance_district"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_district'].'"';} ?>
      placeholder="Enter District">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_state">State</label>
    <input type="text" class="form-control"   id="correspondance_state" name="correspondance_state"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_state'].'"';} ?>
      placeholder="Enter State">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_country">Country</label>
    <input type="text" class="form-control"  id="correspondance_country" name="correspondance_country"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_country'].'"';} ?>
      placeholder="Enter Country">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_pincode">Pincode</label>
    <input type="number" class="form-control"   id="correspondance_pincode" name="correspondance_pincode"
<?php if(isset($err)){ echo 'value="'.$_POST['correspondance_pincode'].'"';} ?>
      placeholder="Enter Pincode">
   </div>

</div><hr>
<div class="row">
    <div class="form-group col-sm-4">
    <label for="dob">Date of Birth*</label>
    <input type="date" required class="form-control"  id="dob" name="dob"
<?php if(isset($err)){ echo 'value="'.$_POST['dob'].'"';} ?>
      >
   </div>
 <div class="form-group col-sm-4">
    <label for="gender">Gender*</label>
 <select required class="form-control" id="gender" name="gender"
<?php if(isset($err)){ echo 'value="'.$_POST['gender'].'"';} ?>
 >
   <option >Male</option>
   <option >Female</option>
   <option >Transgender</option>
  </select>
    </div>

 <div class="form-group col-sm-4">
    <label for="marital_status">Marital Status*</label>
 <select class="form-control" id="marital_status" name="marital_status"
<?php if(isset($err)){ echo 'value="'.$_POST['marital_status'].'"';} ?>
 >
   <option >Single</option>
   <option >Married</option>
   <option >Divorced</option>
   <option >Separated</option>
   </select>
    </div>
<div class="form-group col-sm-4">
    <label for="aadhar_no">Aadhar No*</label>
    <input type="number" class="form-control" required  id="aadhar_no" name="aadhar_no"
<?php if(isset($err)){ echo 'value="'.$_POST['aadhar_no'].'"';} ?>
      placeholder="Enter Aadhar Card No.">
   </div>
   <div class="form-group col-sm-4">
    <label for="pan_no">PAN No</label>
    <input type="text" class="form-control"  id="pan_no" name="pan_no"
<?php if(isset($err)){ echo 'value="'.$_POST['pan_no'].'"';} ?>
      placeholder="Enter PAN Card No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="driving_licence_no">Driving Licence No</label>
    <input type="text" class="form-control"  id="driving_licence_no" name="driving_licence_no"
<?php if(isset($err)){ echo 'value="'.$_POST['driving_licence_no'].'"';} ?>
      placeholder="Enter Driving Licence No.">
   </div>
</div>
<b>Upload Documents:-</b>
   <hr>
   <div class="row">
   <div class="form-group col-sm-4">
    <label for="aadhar_card">Aadhar Card*</label>
    <input type="file" required class="form-control"  id="aadhar_card" name="aadhar_card"
       >
</div>
   <div class="form-group col-sm-4">
    <label for="photo_beneficiary">Beneficiary Photo [Optional]</label>
    <input type="file"   class="form-control"  id="photo_beneficiary" name="photo_beneficiary"
       >
</div>
  <div class="form-group col-sm-4">
    <label for="driving_licence">Driving Licence [Optional]</label>
    <input type="file" class="form-control"  id="driving_licence" name="driving_licence"
       >
   </div>

   </div>
   <b>Terms of adding Beneficiary</b><hr>
   <div class="form-group form-check">
    <input required type="checkbox" class="form-check-input" id="limp_plan">
    <label class="form-check-label" for="limp_plan" name="limp_plan"
     >I have taken the consent of LIPTM purchaser for adding myself as beneficiary for this LIPTM plan</label>
  </div>
  <div class="form-group form-check">
    <input required type="checkbox" class="form-check-input" id="info_is_correct">
    <label class="form-check-label" for="info_is_correct" name="info_is_correct"
     >The information provided above in the form are true and correct to my knowledge.</label>
  </div>
  <div class="form-group form-check">
    <input required type="checkbox" class="form-check-input" id="agree_terms">
    <label class="form-check-label" for="agree_terms" name="agree_terms"
     >I hereby agree to terms and conditions</label>
  </div>
<button class="btn btn-primary btn-sm" type="button">Generate Aadhar Based OTP  </button>

  <div class="form-group col-sm-4">
    <label for="otp">Enter OTP</label>
    <input type="number" class="form-control"  id="otp" name="otp"      >
   </div>



   <button type="submit" class="btn btn-primary">Submit for Review & Approval </button>
</form>    
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
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

</script> 
<?php
if(isset($err)){
?>
<script type="text/javascript">
  onchange_correspondance_address_same_as_permanent_address(document.getElementById('checked_address'));
</script>
<?php
}  
    ?>
 @endsection
@endsection
