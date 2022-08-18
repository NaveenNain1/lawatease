<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\beneficiary;
use App\Models\addresses;
use Auth;
class BeneficiaryController extends Controller
{
	   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {

   	return view('customer.beneficiary.index');

   }
   public function add_individual()
   {

        return view('customer.beneficiary.add_individual');

    }
       public function add_business_entity()
   {

        return view('customer.beneficiary.add_business_entity');

    }
    
      public function view()
    
    {
        $beneficiary = beneficiary::where('uid', Auth::user()->id)
               ->get();
        return view('customer/beneficiary/view',compact('beneficiary'));
    }
public function store_business_entity(Request $request){
$validator=Validator::make($request->all(),BeneficiaryController::validator_business_entity());
if($validator->fails()){
$html='Data Error:<ul>';
foreach($validator->messages()->all() as $k =>$v){
$html.="<li>{$v}</li>";
}
$html.="</ul>";
$html.='<br>
<button onclick="history.back()">Go back</button>
';
return $html;
}else{
$business_entity_registration_certificate='';
$file_errors_boolean=false;
$file_errors='';
$business_entity_registration_certificate_upload=BeneficiaryController::uploadimg('business_entity_registration_certificate','uploads/business_entity_registration_certificate');
if($business_entity_registration_certificate_upload['status']==false){
$file_errors.='<div>Errors in Business Entity Registration Certificate<ul>';
$file_errors.=$business_entity_registration_certificate_upload['errors'];
$file_errors_boolean=true;
$file_errors.="</ul></div>";
}else{
  $business_entity_registration_certificate=$business_entity_registration_certificate_upload['path'];
}
////////////////////
$pan_card='';
 $pan_card_upload=BeneficiaryController::uploadimg('pan_card','uploads/pan_card');
if($pan_card_upload['status']==false){
$file_errors.='<div>Errors in Pan Card<ul>';
$file_errors.=$pan_card_upload['errors'];
$file_errors_boolean=true;
$file_errors.="</ul></div>";
}else{
  $pan_card=$pan_card_upload['path'];
}

////////////
$address_proof='';
 $address_proof_upload=BeneficiaryController::uploadimg('address_proof','uploads/address_proof');
if($address_proof_upload['status']==false)
{
$file_errors.='<div>Errors in Address Proof<ul>';
$file_errors.=$address_proof_upload['errors'];
$file_errors_boolean=true;
$file_errors.="</ul></div>";  
}else{
  $address_proof=$address_proof_upload['path'];
}
///////////////////
$authorization_letter='';
 $authorization_letter_upload=BeneficiaryController::uploadimg('authorization_letter','uploads/authorization_letter');
if($authorization_letter_upload['status']==false)
{
  $file_errors.="<div>Errors in authorization_letter<ul>";
  $file_errors.=$authorization_letter_upload['errors'];
  $file_errors.="</ul></div>";
$file_errors_boolean=true;
}else{
  $authorization_letter=$authorization_letter_upload['path'];
}
///////////
$aadhar_card='';
 $aadhar_card_upload=BeneficiaryController::uploadimg('aadhar_card','uploads/aadhar_card');
if($aadhar_card_upload['status']==false)
{
  $file_errors.="<div>Errors in aadhar_card<ul>";
  $file_errors.=$aadhar_card_upload['errors'];
  $file_errors.="</ul></div>";
$file_errors_boolean=true;
}else{
  $aadhar_card=$aadhar_card_upload['path'];
}
///////////
$dob_proof='';
 $dob_proof_upload=BeneficiaryController::uploadimg('dob_proof','uploads/dob_proof');
if($dob_proof_upload['status']==false)
{
  $file_errors.="<div>Errors in dob_proof<ul>";
  $file_errors.=$dob_proof_upload['errors'];
  $file_errors.="</ul></div>";
$file_errors_boolean=true;
}else{
  $dob_proof=$dob_proof_upload['path'];
}
///////////
$gst_certificate='';
if($_FILES['gst_certificate']["name"]!=""){

  $gst_certificate_upload=BeneficiaryController::uploadimg('gst_certificate','uploads/gst_certificate');

if($gst_certificate_upload['status']==false){
   $file_errors.="<div>Errors in gst_certificate<ul>";
  $file_errors.=$gst_certificate_upload['errors'];
  $file_errors.="</ul></div>";
  $file_errors_boolean=true;

}else{
    $gst_certificate=$gst_certificate_upload['path'];
} 
}
if($file_errors_boolean){
if($business_entity_registration_certificate!="" and file_exists($business_entity_registration_certificate)){
  unlink($business_entity_registration_certificate);
}
//////////
if($pan_card!="" and file_exists($pan_card)){
  unlink($pan_card);
}
//////////
if($address_proof!="" and file_exists($address_proof)){
  unlink($address_proof);
}
//////////
if($authorization_letter!="" and file_exists($authorization_letter)){
  unlink($authorization_letter);
}
//////////
if($aadhar_card!="" and file_exists($aadhar_card)){
  unlink($aadhar_card);
}
//////////
if($dob_proof!="" and file_exists($dob_proof)){
  unlink($dob_proof);
}
//////////
if($gst_certificate!="" and file_exists($gst_certificate)){
  unlink($gst_certificate);
}
//////////
$html=$file_errors;
$html.='<br><button onclick="history.back()">Go back</button>';
return $html;
}else{
            $individual_beneficiaries=new beneficiary;
$individual_beneficiaries->name_of_legal_entity=$request->input("name_of_legal_entity");
$individual_beneficiaries->nature_of_entity=$request->input("nature_of_entity");
$individual_beneficiaries->registration_date=$request->input("registration_date");
$individual_beneficiaries->pan_no=$request->input("pan_no");
$individual_beneficiaries->gst_no=$request->input("gst_no");
$addresses=new addresses;
$addresses->house_no=$request->input('permanent_house_no');
$addresses->street=$request->input('permanent_street');
$addresses->district=$request->input('permanent_district');
$addresses->state=$request->input('permanent_state');
$addresses->country=$request->input('permanent_country');
$addresses->pincode=$request->input('permanent_pincode');
$addresses->uid=Auth::user()->id;
$addresses->save();
$permanent_addresses_id=$addresses->id;
//////////////////////////checking correspondance address
  if($request->correspondance_address_same_as_permanent_address=="1"){
$correspondance_addresses_id=$permanent_addresses_id;

}else{
 $addresses=new addresses;
$addresses->house_no=$request->input('correspondance_house_no');
$addresses->street=$request->input('correspondance_street');
$addresses->district=$request->input('correspondance_district');
$addresses->state=$request->input('correspondance_state');
$addresses->country=$request->input('correspondance_country');
$addresses->pincode=$request->input('correspondance_pincode');
$addresses->uid=Auth::user()->id;
$addresses->save();
$correspondance_addresses_id=$addresses->id;
}

$individual_beneficiaries->first_name=$request->input("first_name");
$individual_beneficiaries->middle_name=$request->input("middle_name");
$individual_beneficiaries->last_name=$request->input("last_name");
$individual_beneficiaries->email_id=$request->input("email_id");
$individual_beneficiaries->mobile_number=$request->input("mobile_number");
$individual_beneficiaries->whatsapp_no=$request->input("whatsapp_no");
$individual_beneficiaries->dob=$request->input("dob");
$individual_beneficiaries->gender=$request->input("gender");
$individual_beneficiaries->designation=$request->input("designation");
$individual_beneficiaries->aadhar_no=$request->input("aadhar_no");
$individual_beneficiaries->pan_card=$pan_card;
$individual_beneficiaries->address_proof=$address_proof;
$individual_beneficiaries->gst_certificate=$gst_certificate;
$individual_beneficiaries->authorization_letter=$authorization_letter;
$individual_beneficiaries->aadhar_card=$aadhar_card;
$individual_beneficiaries->dob_proof=$dob_proof;
$individual_beneficiaries->is_verified=0;
$individual_beneficiaries->is_business_entity=1;

$individual_beneficiaries->uid=Auth::user()->id;
$individual_beneficiaries->permanent_addresses_id=$permanent_addresses_id;
$individual_beneficiaries->correspondance_addresses_id=$correspondance_addresses_id;
$individual_beneficiaries->save();
         return redirect("/customer/beneficiary/view?s")   ;

}
//////
}
}
   public function store_individual(Request $request)
   {
$validator=Validator::make($request->all(),BeneficiaryController::validator_individual());
if($validator->fails()){
	$data_error=$validator->messages();
return view('customer/beneficiary/add_individual',compact('data_error'));
   }else{
            //////////Uploading Images
$upload_addhar_card=BeneficiaryController::uploadimg('aadhar_card','uploads/aadhar_card');
$file_error_booleon=false;
$file_errors='';
$driving_licence='';
$photo_beneficiary='';
$aadhar_card='';
if($_FILES['photo_beneficiary']["name"]!=""){
$photo_beneficiary_upload=BeneficiaryController::uploadimg('photo_beneficiary','uploads/photo_beneficiary');

if($photo_beneficiary_upload['status']==false){
$file_error_booleon=true;
$file_errors.=$photo_beneficiary_upload['errors'];

}else{
    $photo_beneficiary=$photo_beneficiary_upload['path'];
} 

}
if($_FILES['driving_licence']["name"]!=""){

  $driving_licence_upload=BeneficiaryController::uploadimg('driving_licence','uploads/driving_licence');

if($driving_licence_upload['status']==false){
$file_error_booleon=true;
$file_errors.=$driving_licence_upload['errors'];

}else{
    $driving_licence=$driving_licence_upload['path'];
} 
}
if($upload_addhar_card['status']==false){
$file_error_booleon=true;
$file_errors.=$upload_addhar_card['errors'];

}else{
        $aadhar_card=$upload_addhar_card['path'];

} 
  if($file_error_booleon){
        if($aadhar_card!='' and file_exists($aadhar_card)){
unlink($aadhar_card);
}
      if($driving_licence!='' and file_exists($driving_licence)){
unlink($driving_licence);
}
    if($photo_beneficiary!='' and file_exists($photo_beneficiary)){
unlink($photo_beneficiary);
}
         return view('customer/beneficiary/add_individual',compact('file_errors'));   
        

    }else{
        ///////////////Saving Data in table
            $individual_beneficiaries=new beneficiary;
$individual_beneficiaries->first_name=$request->input("first_name");
$individual_beneficiaries->middle_name=$request->input("middle_name");
$individual_beneficiaries->last_name=$request->input("last_name");
$individual_beneficiaries->father_name=$request->input("father_name");
$individual_beneficiaries->mother_name=$request->input("mother_name");
$individual_beneficiaries->spouse_name=$request->input("spouse_name");
$individual_beneficiaries->email_id=$request->input("email_id");
$individual_beneficiaries->mobile_number=$request->input("mobile_number");
$individual_beneficiaries->whatsapp_no=$request->input("whatsapp_no");
 
$addresses=new addresses;
$addresses->house_no=$request->input('permanent_house_no');
$addresses->street=$request->input('permanent_street');
$addresses->district=$request->input('permanent_district');
$addresses->state=$request->input('permanent_state');
$addresses->country=$request->input('permanent_country');
$addresses->pincode=$request->input('permanent_pincode');
$addresses->uid=Auth::user()->id;
$addresses->save();
$permanent_addresses_id=$addresses->id;
//////////////////////////checking correspondance address
  if($request->correspondance_address_same_as_permanent_address=="1"){
$correspondance_addresses_id=$permanent_addresses_id;

}else{
 $addresses=new addresses;
$addresses->house_no=$request->input('correspondance_house_no');
$addresses->street=$request->input('correspondance_street');
$addresses->district=$request->input('correspondance_district');
$addresses->state=$request->input('correspondance_state');
$addresses->country=$request->input('correspondance_country');
$addresses->pincode=$request->input('correspondance_pincode');
$addresses->uid=Auth::user()->id;
$addresses->save();
$correspondance_addresses_id=$addresses->id;
}
/////////////////
/////////////////////////////
$individual_beneficiaries->dob=$request->input("dob");
$individual_beneficiaries->gender=$request->input("gender");
$individual_beneficiaries->marital_status=$request->input("marital_status");
$individual_beneficiaries->aadhar_no=$request->input("aadhar_no");
$individual_beneficiaries->pan_no=$request->input("pan_no");
$individual_beneficiaries->driving_licence_no=$request->input("driving_licence_no");
$individual_beneficiaries->driving_licence=$driving_licence;
$individual_beneficiaries->aadhar_card=$aadhar_card;
$individual_beneficiaries->photo_beneficiary=$photo_beneficiary;
$individual_beneficiaries->is_verified=0;
$individual_beneficiaries->uid=Auth::user()->id;
$individual_beneficiaries->permanent_addresses_id=$permanent_addresses_id;
$individual_beneficiaries->correspondance_addresses_id=$correspondance_addresses_id;



  $individual_beneficiaries->save();
         return redirect("/customer/beneficiary/view?s")   ;
        ////////////////
    }
   }
}
 public function validator_individual()
{
  return [
'first_name'=>'required|max:200',
'middle_name'=>'max:200',
'last_name'=>'required|max:200',
'father_name'=>'required|max:200',
'mother_name'=>'required|max:200',
'spouse_name'=>'max:200',
'email_id'=>'required|max:200|email',
'mobile_number'=>'required|max:10',
'whatsapp_no'=>'max:200',
'permanent_house_no'=>'required|max:200',
'permanent_street'=>'max:200',
'permanent_district'=>'required|max:200',
'permanent_state'=>'required|max:200',
'permanent_country'=>'required|max:200',
'permanent_pincode'=>'required|max:6',
'correspondance_house_no'=>'max:200',
'correspondance_street'=>'max:200',
'correspondance_district'=>'max:200',
'correspondance_state'=>'max:200',
'correspondance_country'=>'max:200',
'correspondance_pincode'=>'max:6',
'dob'=>'required|max:200',
'gender'=>'required|max:200',
'marital_status'=>'required|max:200',
'aadhar_no'=>'required|max:12|min:12',
'pan_no'=>'max:200',
'driving_licence_no'=>'max:200',
];
}
public function validator_business_entity()
{
  return [
'first_name'=>'required|max:200',
'middle_name'=>'max:200',
'last_name'=>'required|max:200',
'email_id'=>'required|max:200|email',
'mobile_number'=>'required|max:10',
'whatsapp_no'=>'max:200',
'permanent_house_no'=>'required|max:200',
'permanent_street'=>'max:200',
'permanent_district'=>'required|max:200',
'permanent_state'=>'required|max:200',
'permanent_country'=>'required|max:200',
'permanent_pincode'=>'required|max:6',
'correspondance_house_no'=>'max:200',
'correspondance_street'=>'max:200',
'correspondance_district'=>'max:200',
'correspondance_state'=>'max:200',
'correspondance_country'=>'max:200',
'correspondance_pincode'=>'max:6',
'dob'=>'required|max:200',
'gender'=>'required|max:200',
'aadhar_no'=>'required|max:12|min:12',
'pan_no'=>'max:200',
'name_of_legal_entity'=>'required|max:220',
'nature_of_entity'=>'max:220',
'cin'=>'required|max:220',
'registration_date'=>'required|max:220',
'gst_no'=>'max:220',
'designation'=>'required|max:220',
  ];
}

  function uploadimg($postname,$folder){
$target_dir = $folder.'/';
$target_file = $target_dir . basename($_FILES[$postname]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file2 = $target_dir . rand(9999,99999).md5(time()).".".$imageFileType;
 $error="";
    
 
// Check if file already exists
if (file_exists($target_file)) {
   $error.= "<li>Sorry, file already exists.</li>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES[$postname]["size"] > 500000) {
  $error.= "<li>Sorry, your file is too large.</li>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
   $error.= "<li>Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.</li>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    return array('status'=>false,'errors'=>$error);
} else {
  if (move_uploaded_file($_FILES[$postname]["tmp_name"], $target_file2)) {
     return array('status'=>true,'path'=>$target_file2);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}}

}


