@extends('layouts.advocatepanel')

@section('content')
@section('title')
Complete Empanellment Form
@endsection
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                    <div style="text-align:center">
                 
 <h2><b>Details of the Individual Lawyer
 </b></h2> </div>
   @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
 @foreach($AdvocateEmpanellment as $data)
 <?php $is_submitted=$data->is_submitted;
$is_verified=$data->is_verified;
  ?>
  @if($is_verified==1)
<div class="alert alert-success">
Congratulation! Your Details are verified successfully.
</div>
  @endif
 @if($is_submitted==1 and $is_verified!=1)
 <p style="color: red">
<b>Note: Your application has been submitted for reivew. So, you cannot edit anything!</b>
 </p>
 @endif

 <!-- Starting Of First Step Data -->
 <b> Details of the Individual Lawyer:-</b><hr>
  <div class="row">
  <div class="form-group col-sm-4">
    <label for="first_name">First Name*</label>
    <input readonly type="text" class="form-control" required  id="first_name" name="first_name" value="{{$data->first_name}}"  placeholder="Enter First Name">
   </div>
  <div class="form-group col-sm-4">
    <label for="middle_name">Middle Name</label>
    <input readonly type="text" class="form-control"  id="middle_name" name="middle_name" value="{{$data->middle_name}}"  placeholder="Enter Middle Name">
   </div>
     <div class="form-group col-sm-4">
    <label for="last_name">Last Name*</label>
    <input readonly type="text" class="form-control" required  id="last_name" name="last_name" value="{{$data->last_name}}"  placeholder="Enter Last Name">
   </div>
    <div class="form-group col-sm-4">
    <label for="father_name">Father Name*</label>
    <input readonly type="text" class="form-control" required  id="father_name" name="father_name" value="{{$data->father_name}}"  placeholder="Enter Father Name">
   </div>
<div class="form-group col-sm-4">
    <label for="bar_council_enrollment_no">Bar Council Enrollment No*
</label>
    <input readonly type="text" class="form-control" required  id="bar_council_enrollment_no" name="bar_council_enrollment_no" value="{{$data->bar_council_enrollment_no}}"  placeholder="Enter Bar Council Enrollment No">
   </div>
<div class="form-group col-sm-4">
    <label for="date_of_bar_council_enrollment">Date of Bar Council Enrollment*</label>
    <input readonly type="date" class="form-control"  id="date_of_bar_council_enrollment" name="date_of_bar_council_enrollment" value="{{$data->date_of_bar_council_enrollment}}"  >
   </div>

<div class="form-group col-sm-4">
    <label for="email_id">Email Id*</label>
    <input readonly type="email" class="form-control" required   id="email_id" name="email_id" value="{{$data->email_id}}"  placeholder="Enter Email ID">
   </div>

<div class="form-group col-sm-4">
    <label for="mobile_number">Mobile Number [linked with Aadhar Card]*</label>
    <input readonly type="number" class="form-control" required   id="mobile_number" name="mobile_number" value="{{$data->mobile_number}}"  placeholder="Enter mobile No.">
   </div>
<div class="form-group col-sm-4">
    <label for="whatsapp_no">Whatsapp No</label>
    <input readonly type="number" class="form-control"   id="whatsapp_no" name="whatsapp_no" value="{{$data->whatsapp_no}}"  placeholder="Enter Whatsapp No.">
   </div>


  </div>
<b>Permanent Address:-</b>
<hr>
<?php
 $addresses=App\Models\AdvocateAddresses::where('id',$data->permanent_addresses_id)->get();
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
<div class="row">
  <div class="form-group col-sm-4">
    <label for="permanent_house_no">House No/ Flat No*</label>
    <input readonly type="text" class="form-control"  required  id="permanent_house_no" value="{{$house_no}}" name="permanent_house_no"    placeholder="Enter House No/ Flat No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_street">Street / Locality</label>
    <input readonly type="text" class="form-control"  id="permanent_street" value="{{$street}}" name="permanent_street"    placeholder="Enter Street">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_district">District*</label>
    <input readonly type="text" class="form-control" required  id="permanent_district" value="{{$district}}" name="permanent_district"  placeholder="Enter District">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_state">State*</label>
    <input readonly type="text" class="form-control" required   id="permanent_state" value="{{$state}}" name="permanent_state"   placeholder="Enter State">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_country">Country*</label>
    <input readonly type="text" class="form-control" required  id="permanent_country" value="{{$country}}" name="permanent_country"  placeholder="Enter Country">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_pincode">Pincode*</label>
    <input readonly type="number" class="form-control" required  id="permanent_pincode" value="{{$pincode}}" name="permanent_pincode"  placeholder="Enter Pincode">
   </div>

</div>

<b>Correspondance Address:-</b> 
<hr>
 <div class="row" id="correspondance_address_div">
  <?php
 $addresses=App\Models\AdvocateAddresses::where('id',$data->correspondance_addresses_id)->get();
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
  <div class="form-group col-sm-4">
    <label for="correspondance_house_no">House No/ Flat No*</label>
    <input readonly type="text" class="form-control" value="{{$house_no}}"   id="correspondance_house_no" name="correspondance_house_no"   placeholder="Enter House No/ Flat No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_house_no">Street / Locality</label>
    <input readonly type="text" class="form-control" value="{{$street}}" id="correspondance_street" name="correspondance_street"    placeholder="Enter Street">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_district">District*</label>
    <input readonly type="text" class="form-control" value="{{$district}}"  id="correspondance_district" name="correspondance_district"    placeholder="Enter District">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_state">State*</label>
    <input readonly type="text" class="form-control" value="{{$state}}"   id="correspondance_state" name="correspondance_state"   placeholder="Enter State">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_country">Country*</label>
    <input readonly type="text" class="form-control" value="{{$country}}"  id="correspondance_country" name="correspondance_country"   placeholder="Enter Country">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_pincode">Pincode*</label>
    <input readonly type="number" class="form-control" value="{{$pincode}}"   id="correspondance_pincode" name="correspondance_pincode"  placeholder="Enter Pincode">
   </div>

</div>

 <div class="row">
  <div class="form-group col-sm-4">
    <label for="dob">Date Of Birth*</label>
    <input readonly type="date" class="form-control"  required  id="dob" name="dob" value="{{$data->dob}}"   >
   </div>
   <div class="form-group col-sm-4">
    <label for="gender">Gender*</label>
    <select readonly type="date" class="form-control"  required  id="gender" name="gender" value="{{$data->gender}}"   >
<option>Male</option>
<option>Female</option>
<option>Transgender</option>
    </select>
   </div>
   
 <div class="form-group col-sm-4">
    <label for="marital_status">Marital Status*</label>
 <select class="form-control" id="marital_status" readonly name="marital_status" value="{{$data->marital_status}}"
 >
   <option >Single</option>
   <option >Married</option>
   <option >Divorced</option>
   <option >Separated</option>
   </select>
    </div>
    <div class="form-group col-sm-4">
    <label for="aadhar_no">Aadhar No*</label>
    <input readonly type="number" class="form-control" required   id="aadhar_no" name="aadhar_no" value="{{$data->aadhar_no}}"
      placeholder="Enter Aadhar Card No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="pan_no">PAN No*</label>
    <input readonly type="text" class="form-control" required  id="pan_no" name="pan_no" value="{{$data->pan_no}}"
      placeholder="Enter PAN Card No.">
   </div>
       <div class="form-group col-sm-4">
    <label for="gst_no">Gst No</label>
    <input readonly type="text" class="form-control" id="gst_no" name="gst_no" value="{{$data->gst_no}}"
      placeholder="Enter GST No.">
   </div>
</div>
 <!-- Ending Of First Step Data -->
@endforeach
<br><br>
<div class="row">
<div class="card col-sm-6" style="border:1px solid;margin-top: -20px">
  <div class="card-head">
    Educational and professional information
  </div>
  <div class="card-body">
    
    <a class="btn btn-danger" href="empanellment_complete/educational_data">Upload / View information</a>
  </div>
  </div>
  <div class="card col-sm-6" style="border:1px solid;margin-top: -20px">
  <div class="card-head">
Details of Existing Empanelment(s) with other Organizations
  </div>
  <div class="card-body">
    
    <a class="btn btn-danger" href="empanellment_complete/existing_empanelment">Upload / View information</a>
  </div>
  </div>
    <div class="card col-sm-6" style="border:1px solid;margin-top: -20px">
  <div class="card-head">
Details of Main Cases Handeled [Min 3 cases to be submitted]            
  </div>
  <div class="card-body">
    
    <a class="btn btn-danger" href="empanellment_complete/MainCasesHandeled">Upload / View</a>
  </div>
  </div>
      <div class="card col-sm-6" style="border:1px solid;margin-top: -20px">
  <div class="card-head">
Upload Documents*
  </div>
  <div class="card-body">
    
    <a class="btn btn-danger" href="empanellment_complete/EmpanellmentDocuments">Upload / View</a>
  </div>
  </div>
  </div>
  <!-- Button trigger modal -->
   @if($is_submitted!=1)

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SendForReview">
  Send For Review
</button>
@endif
<!-- Modal -->
<div class="modal fade" id="SendForReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Send For Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $EmpanellmentDocumentsUploaded=[];
if(count($EmpanellmentDocuments)>0){
  foreach($EmpanellmentDocuments as $EmpanellmentDocuments2){
$EmpanellmentDocumentsUploaded[$EmpanellmentDocuments2->type]=$EmpanellmentDocuments2->file;
  }
}
        ?>
       @if(!count($educational_data)>0)
       <?php $err=1; ?>
<div class="alert alert-danger">
Educational and professional information is required!<br>
    <a   href="empanellment_complete/educational_data">Upload Now</a>
</div>
       @endif
         @if(count($MainCasesHandeled)>=3)
         @else
       <?php $err=1; ?>
<div class="alert alert-danger">
Please upload Details of Main Cases Handeled at least 3!<br>
    <a   href="empanellment_complete/MainCasesHandeled">Upload Now</a>

</div>
       @endif
          @if(array_key_exists('Aadhar Card',$EmpanellmentDocumentsUploaded) and array_key_exists('PAN Card',$EmpanellmentDocumentsUploaded) and array_key_exists('Bar Council Registration Cert',$EmpanellmentDocumentsUploaded) and array_key_exists('LLB Passing Cert/ Degree',$EmpanellmentDocumentsUploaded))
  @else
       <?php $err=1; ?>
<div class="alert alert-danger">
Following documents are required to upload:
<ul>
<li>Aadhar Card</li>
<li>Pan Card</li>
<li>Bar council registration certificate</li>
<li>LLB Passing certificate/degree</li>
</ul>
<a href="empanellment_complete/EmpanellmentDocuments" >Upload Now</a>
</div>
       @endif
       @if(!isset($err))
    <p style="font-size: 25px"> Are you sure to submit these details for review?</p>
@endif
   <!-- </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" @if(isset($err)) onclick="alert('Connot be submitted for Review\nIt has some error')" @else onclick="window.location='empanellment_complete/send'" @endif >Yes, Send</button>
      </div>
    </div>
  </div>
</div>
                 </div>
            </div>
        </div>
    </div>
</div>
 
</script> 
@endsection
