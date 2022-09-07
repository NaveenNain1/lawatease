@extends('layouts.advocatepanel')

@section('content')
@section('title')
Advocate Panel
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body table-responsive" >
                    <div style="text-align:center">
                 
 <h2><b>Details of the Individual Lawyer
 </b></h2> </div>
  <?php
$date_before_18 = Carbon\Carbon::now()->subYears(18)->toDateString();
$todaydate= Carbon\Carbon::now()->toDateString();
   ?>
 
<form method="post" enctype="multipart/form-data">
	@csrf
 <b> Details of the Individual Lawyer:-</b><hr>
  <div class="row">
  <div class="form-group col-sm-4">
    <label for="first_name">First Name*</label>
    <input type="text" class="form-control" required id="first_name" name="first_name"  placeholder="Enter First Name">
   </div>
  <div class="form-group col-sm-4">
    <label for="middle_name">Middle Name</label>
    <input type="text" class="form-control"  id="middle_name" name="middle_name"  placeholder="Enter Middle Name">
   </div>
     <div class="form-group col-sm-4">
    <label for="last_name">Last Name*</label>
    <input type="text" class="form-control" required id="last_name" name="last_name"  placeholder="Enter Last Name">
   </div>
    <div class="form-group col-sm-4">
    <label for="father_name">Father Name*</label>
    <input type="text" class="form-control" required id="father_name" name="father_name"  placeholder="Enter Father Name">
   </div>
<div class="form-group col-sm-4">
    <label for="bar_council_enrollment_no">Bar Council Enrollment No*
</label>
    <input type="text" class="form-control" required id="bar_council_enrollment_no" name="bar_council_enrollment_no"  placeholder="Enter Bar Council Enrollment No">
   </div>
<div class="form-group col-sm-4">
    <label for="date_of_bar_council_enrollment">Date of Bar Council Enrollment*</label>
    <input type="date" class="form-control"  id="date_of_bar_council_enrollment" name="date_of_bar_council_enrollment" required max="{{$todaydate}}">
   </div>

<div class="form-group col-sm-4">
    <label for="email_id">Email Id*</label>
    <input type="email" class="form-control" required  id="email_id" name="email_id"  placeholder="Enter Email ID">
   </div>

<div class="form-group col-sm-4">
    <label for="mobile_number">Mobile Number [linked with Aadhar Card]*</label>
    <input type="number" class="form-control" required  id="mobile_number" name="mobile_number"  placeholder="Enter mobile No." onKeyPress="if(this.value.length==10) return false;" >
   </div>
<div class="form-group col-sm-4">
    <label for="whatsapp_no">Whatsapp No</label>
    <input type="number" class="form-control"   id="whatsapp_no" name="whatsapp_no"  placeholder="Enter Whatsapp No." onKeyPress="if(this.value.length==10) return false;" >
   </div>


  </div>
<b>Permanent Address:-</b>
<hr>
<div class="row">
  <div class="form-group col-sm-4">
    <label for="permanent_house_no">House No/ Flat No*</label>
    <input type="text" class="form-control"  required id="permanent_house_no" name="permanent_house_no"  placeholder="Enter House No/ Flat No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_street">Street / Locality</label>
    <input type="text" class="form-control"  id="permanent_street" name="permanent_street"  placeholder="Enter Street" required>
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_district">District*</label>
    <input type="text" class="form-control" required id="permanent_district" name="permanent_district"  placeholder="Enter District">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_state">State*</label>
    <input type="text" class="form-control" required  id="permanent_state" name="permanent_state"  placeholder="Enter State">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_country">Country*</label>
    <input type="text" class="form-control" required id="permanent_country" name="permanent_country"  placeholder="Enter Country">
   </div>
    <div class="form-group col-sm-4">
    <label for="permanent_pincode">Pincode*</label>
    <input type="number" class="form-control" required id="permanent_pincode" name="permanent_pincode"  placeholder="Enter Pincode"  onKeyPress="if(this.value.length==6) return false;" >
   </div>

</div>

<b>Correspondance Address:-</b> <div class="form-group form-check">
    <input type="checkbox"   class="form-check-input" id="checked_address" onclick="onchange_correspondance_address_same_as_permanent_address(this);">
    <label class="form-check-label" for="checked_address" >Tick here if Correspondance Address is Same as Permanent Address</label>
  </div>
<hr>
<input type="hidden" value="0" name="correspondance_address_same_as_permanent_address"
 id="correspondance_address_same_as_permanent_address" >
<div class="row" id="correspondance_address_div">
  <div class="form-group col-sm-4">
    <label for="correspondance_house_no">House No/ Flat No*</label>
    <input type="text" class="form-control"    id="correspondance_house_no" name="correspondance_house_no"  placeholder="Enter House No/ Flat No.">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_house_no">Street / Locality</label>
    <input type="text" class="form-control"  id="correspondance_street" name="correspondance_street"  placeholder="Enter Street">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_district">District*</label>
    <input type="text" class="form-control"   id="correspondance_district" name="correspondance_district"  placeholder="Enter District">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_state">State*</label>
    <input type="text" class="form-control"    id="correspondance_state" name="correspondance_state"  placeholder="Enter State">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_country">Country*</label>
    <input type="text" class="form-control"   id="correspondance_country" name="correspondance_country"  placeholder="Enter Country">
   </div>
    <div class="form-group col-sm-4">
    <label for="correspondance_pincode">Pincode*</label>
    <input type="number" class="form-control"    id="correspondance_pincode" name="correspondance_pincode"  placeholder="Enter Pincode"  onKeyPress="if(this.value.length==6) return false;" >
   </div>

</div>

 <div class="row">
  <div class="form-group col-sm-4">
    <label for="dob">Date Of Birth*</label>
    <input type="date" class="form-control"  required id="dob" name="dob"  max="{{$date_before_18}}" >
   </div>
   <div class="form-group col-sm-4">
    <label for="gender">Gender*</label>
    <select type="date" class="form-control"  required id="gender" name="gender"   >
<option>Male</option>
<option>Female</option>
<option>Transgender</option>
    </select>
   </div>
   
 <div class="form-group col-sm-4">
    <label for="marital_status">Marital Status*</label>
 <select class="form-control" id="marital_status" name="marital_status"
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
      placeholder="Enter Aadhar Card No." onKeyPress="if(this.value.length==12) return false;" >
   </div>
    <div class="form-group col-sm-4">
    <label for="pan_no">PAN No*</label>
    <input type="text" class="form-control" required id="pan_no" name="pan_no"
      placeholder="Enter PAN Card No."  onKeyPress="if(this.value.length==12) return false;" >
   </div>
       <div class="form-group col-sm-4">
    <label for="gst_no">Gst No</label>
    <input type="text" class="form-control" id="gst_no" name="gst_no"
      placeholder="Enter GST No.">
   </div>
</div>
<div><b>Educational & Professional Information           </b>
  <div class="row">
 <table class="table">
   <tr><th>Education</th><th>Board / University</th><th>Date Of Passing</ max="100"th><th>Percentage Marks</th><th>Achievement</th></tr>
   <tr><th>10th*</th>
    <td><input type="text" name="board_10" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_10" max="{{$todaydate}}" required   class="form-control"></td>
    <td><input type="number" max="100" name="percentage_10" required placeh max="100
"older="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_10" required placeholder="Achievement" class="form-control"></td>

   </tr>
<tr><th>12th*</th>
    <td><input type="text" name="board_12" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_12" max="{{$todaydate}}" required   class="form-control"></td>
    <td><input type="number" max="100" name="percentage_12" required placeh max="100
"older="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_12" required placeholder="Achievement" class="form-control"></td>

   </tr>
   <tr><th>LLB*</th>
    <td><input type="text" name="board_llb" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_llb" max="{{$todaydate}}" required   class="form-control"></td>
    <td><input type="number" max="100" name="percentage_llb" required placeh max="100
"older="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_llb" required placeholder="Achievement" class="form-control"></td>

   </tr>
   <tr><th>LLM</th>
    <td><input type="text" name="board_llm"  placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_llm" max="{{$todaydate}}"    class="form-control"></td>
    <td><input type="number" max="100" name="percentage_llm"  placeh max="100
"older="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_llm"  placeholder="Achievement" class="form-control"></td>

   </tr>
   <tbody id="AdditionalEducational"></tbody>
   <tr><td colspan="5" style="text-align: right">
     <button type="button" onclick="AdditionalEducational_add();">+</button>
   </td></tr>
  </table>
  </div>
</div>
<div><b>Details of Existing Empanelment(s) with other Organizations       
          </b>
  <div class="row">
 <table class="table">
   <tr><th>Name of Organization</th><th>Empanelled Since
</th><th>Upload Empanelment Letter
</th><th>Name of Reference in the Organization
</th><th>Mobile No of the Reference Person
</th></tr>
       <tbody id="null">
         <tr><td colspan="5" style="text-align: center;"><b>No Data Uploaded</b></td></tr>
       </tbody>

   <tbody id="ExistingEmpanelment"></tbody>
   <tr><td colspan="5" style="text-align: right">
     <button type="button" onclick="ExistingEmpanelment_add();">+</button>
   </td></tr>
  </table>
  </div>
</div>
<div><b>Details of Main Cases Handeled [Min 3 cases to be submitted]            

          </b>
  <div class="row">
 <table class="table">
   <tr><th>Name of Court</th><th>Name of Case
</th><th>Concerned Area of Law</th>
<th>Date of Last Order</th>
<th>Your Role</th>
<th>Case Facts</th>
</tr>
    <tr><td><input type="text" placeholder="Court Name " name="CourtName[1]"  class="form-control" required></td>
<td><input type="text" placeholder="Case Name " name="CaseName[1]"  class="form-control" required></td>
<td><input type="text" placeholder="Concerned Area of Law  " name="LawConcernedArea[1]"   class="form-control" required></td>
<td><input type="date" placeholder="Last Order Date " max="{{$todaydate}}" name="LastOrderDate[1]" class="form-control" required></td>
<td><input type="text" placeholder="Your Role " name="Role[1]"  class="form-control" required></td>
<td><textarea type="text" placeholder="Case Fact " name="CaseFact[1]"  class="form-control" min="500" max="5000" required></textarea></td>
     </tr> 
         <tr><td><input type="text" placeholder="Court Name " name="CourtName[2]"  class="form-control" required></td>
<td><input type="text" placeholder="Case Name " name="CaseName[2]"  class="form-control" required></td>
<td><input type="text" placeholder="Concerned Area of Law  " name="LawConcernedArea[2]"   class="form-control" required></td>
<td><input type="date" placeholder="Last Order Date " max="{{$todaydate}}" name="LastOrderDate[2]" class="form-control" required></td>
<td><input type="text" placeholder="Your Role " name="Role[2]"  class="form-control" required></td>
<td><textarea type="text" placeholder="Case Fact " name="CaseFact[2]"  class="form-control" min="500" max="5000" required></textarea></td>
     </tr>  
              <tr><td><input type="text" placeholder="Court Name" name="CourtName[3]"  class="form-control" required></td>
<td><input type="text" placeholder="Case Name " name="CaseName[3]"  class="form-control" required></td>
<td><input type="text" placeholder="Concerned Area of Law  " name="LawConcernedArea[3]"   class="form-control" required></td>
<td><input type="date" placeholder="Last Order Date " max="{{$todaydate}}" name="LastOrderDate[3]" class="form-control" required></td>
<td><input type="text" placeholder="Your Role " name="Role[3]"  class="form-control" required></td>
<td><textarea type="text" placeholder="Case Fact " name="CaseFact[3]"  class="form-control" min="500" max="5000" required></textarea></td>
     </tr>   
   <tbody id="MainCasesHandeled"></tbody>
   <tr><td colspan="6" style="text-align: right">
     <button type="button" onclick="MainCasesHandeled_add();">+</button>
   </td></tr>
  </table>
  </div>
</div>

<div><b>Upload Documents
      
          </b>

  <div class="row">
 <table  class="col-sm-6">
<tr><th>Aadhar Card*
<input type="hidden" name="DocumentsName[1]" value="Aadhar Card">
</th><td><input type="file" name="DocumentsFile_1"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword" required></td></tr>
<tr><th>PAN Card*
<input type="hidden" name="DocumentsName[2]" value="PAN Card">
</th><td><input type="file" name="DocumentsFile_2"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword" required></td></tr>
<tr><th>GST No [Optional]
<input type="hidden" name="DocumentsName[3]" value="GST No">
</th><td><input type="file" name="DocumentsFile_3"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword"></td></tr>
<tr><th>Bar Council Registration Cert*
<input type="hidden" name="DocumentsName[4]" value="Bar Council Registration Cert">
</th><td><input type="file" name="DocumentsFile_4"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword"></td></tr>
<tr><th>LLB Passing Cert/ Degree*
<input type="hidden" name="DocumentsName[5]" value="LLB Passing Cert/ Degree">
</th><td><input type="file" name="DocumentsFile_5"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword"></td></tr>
   <tbody id="EmpanelmentDocuments"></tbody>
   <tr><td colspan="5" style="text-align: right">
     <button type="button" onclick="EmpanelmentDocuments_add();">+</button>
   </td></tr>
  </table>
  </div>
</div>

   <button type="submit" class="btn btn-primary">Send For Review</button>
</form>
                 </div>
            </div>
        </div>
    </div>
</div>
<script>
   
   function EmpanelmentDocuments_add() {
 let x = Math.round(Math.random() *10000000000000000);
 //alert(x);
  document.getElementById('EmpanelmentDocuments').innerHTML+=`          <tr id="id_`+x+`"><th>
<input type="text" name="DocumentsName[`+x+`]"  placeholder="Name" class="form-control">
</th><td><input type="file" name="DocumentsFile_`+x+`"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword" required></td>
<td><button type="button" onclick="del_element('id_`+x+`')">X</td>

</tr>`;
     }
     function del_element(v)
     {
document.getElementById(v).remove();
     }
        function AdditionalEducational_add() {
     
 let x = Math.round(Math.random() *10000000000000000);
 //alert(x);
 document.getElementById('AdditionalEducational').innerHTML+=`   <tr id="id_`+x+`"><th><input type="number" name="EducationName[`+x+`]"  placeholder="EducationName" class="form-control" required></th>
    <td><input type="text" name="board[`+x+`]"  placeholder="Board / University" class="form-control" required></td>
<td><input type="date" name="passing_date[ max="{{$todaydate}}"`+x+`]"    class="form-control" required></td>
    <td><input type="text" max="100" name="percentage[`+x+`]"  placeh max="100
"older="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement[`+x+`]"  placeholder="Achievement" class="form-control" required></td>
<td><button type="button" onclick="del_element('id_`+x+`')">X</td>
   </tr>`;
     }
       function MainCasesHandeled_add() {
 let x = Math.round(Math.random() *10000000000000000);
 //alert(x);
 document.getElementById('MainCasesHandeled').innerHTML+=`        <tr id="id_`+x+`"><td><input type="text" placeholder="Court Name" name="CourtName[`+x+`]"  class="form-control"required ></td>
<td><input type="text" placeholder="Case Name" name="CaseName[`+x+`]"  class="form-control" ></td>
<td><input type="text" placeholder="Concerned Area of Law " name="LawConcernedArea[`+x+`]"   class="form-control" required></td>
<td><input type="date" placeholder="Last Order Date" max="{{$todaydate}}" name="LastOrderDate[`+x+`]" class="form-control" ></td>
<td><input type="text" placeholder="Your Role" name="Role[`+x+`]"  class="form-control" required></td>
<td><textarea type="text" placeholder="Case Fact" name="CaseFact[`+x+`]"  class="form-control" min="500" max="5000" required></textarea></td>
<td><button type="button" onclick="del_element('id_`+x+`')">X</td>

     </tr>  `;
     }
        function ExistingEmpanelment_add() {
 let x = Math.round(Math.random() *10000000000000000);
 //alert(x);
document.getElementById('null').innerHTML='';

 document.getElementById('ExistingEmpanelment').innerHTML+=`   <tr id="id_`+x+`"><th><input type="text" name="Empanelmentname[`+x+`]"  placeholder="Name of Organization" class="form-control" required></th>
    <td><input type="date" max="{{$todaydate}}" name="EmpanelledSince[`+x+`]"  placeholder="EmpanelledSince" class="form-control" required></td>
<td><input type="file" name="EmpanelmentLetter_`+x+`"    class="form-control" accept=".png,.jpeg,.pdf,.jpg,application/msword" required></td>
    <td><input type="text" name="ReferenceName[`+x+`]"  placeholder="Name of Reference in the Organization  " class="form-control" required></td>
    <td><input type="text" name="ReferenceMobile[`+x+`]"  placeholder="ReferenceMobile" class="form-control" required></td>
<td><button type="button" onclick="del_element('id_`+x+`')">X</td>

   </tr>`;
     }
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
	  onchange_correspondance_address_same_as_permanent_address(document.getElementById('checked_address'));
}, 1000)

</script> 
@endsection
