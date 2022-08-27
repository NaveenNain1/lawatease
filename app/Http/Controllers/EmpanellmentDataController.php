<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvocateAddresses;
use App\Models\EmpanellmentEducationalData;
use App\Models\EmpanellmentDocuments;
use App\Models\ExistingEmpanelment;
use App\Models\MainCasesHandeled;
use App\Models\AdvocateEmpanellment;
use Validator;
use Auth;

class EmpanellmentDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
            $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
 
        return redirect('advocate/empanellment_complete');
    }
        return view('advocate/empanellment/index');
    }

    public function add(){
            $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
 
        return redirect('advocate/empanellment_complete');
    }
        return view('advocate/empanellment/empanellment_add');
    }
    public function store(Request $request){
$Validator=Validator::make($request->all(),[
'first_name'=>'required|max:220',
'middle_name'=>'max:220',
'last_name'=>'required|max:220',
'father_name'=>'required|max:220',
'bar_council_enrollment_no'=>'required|max:220',
'date_of_bar_council_enrollment'=>'required|max:220',
'email_id'=>'required|max:220',
'mobile_number'=>'required|max:220',
'whatsapp_no'=>'max:220',
'permanent_house_no'=>'required|max:220',
'permanent_street'=>'max:220',
'permanent_district'=>'max:220',
'permanent_state'=>'max:220',
'permanent_country'=>'max:220',
'permanent_pincode'=>'max:220',
'aadhar_no'=>'max:12|required',
]);
if($Validator->fails()){
   $html='Data Error:<ul>';
foreach($validator->messages()->all() as $k =>$v){
$html.="<li>{$v}</li>";
}
$html.="</ul>";
$html.='<br>
<button onclick="history.back()">Go back</button>
';
    }else{
        $addresses=new AdvocateAddresses;
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
 $addresses=new AdvocateAddresses;
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
$AdvocateEmpanellment=new AdvocateEmpanellment();
$AdvocateEmpanellment->first_name=$request->input("first_name");
$AdvocateEmpanellment->middle_name=$request->input("middle_name");
$AdvocateEmpanellment->last_name=$request->input("last_name");
$AdvocateEmpanellment->father_name=$request->input("father_name");
$AdvocateEmpanellment->bar_council_enrollment_no=$request->input("bar_council_enrollment_no");
$AdvocateEmpanellment->date_of_bar_council_enrollment=$request->input("date_of_bar_council_enrollment");
$AdvocateEmpanellment->email_id=$request->input("email_id");
$AdvocateEmpanellment->mobile_number=$request->input("mobile_number");
$AdvocateEmpanellment->whatsapp_no=$request->input("whatsapp_no");
$AdvocateEmpanellment->dob=$request->input("dob");
$AdvocateEmpanellment->gender=$request->input("gender");
$AdvocateEmpanellment->marital_status=$request->input("marital_status");
$AdvocateEmpanellment->aadhar_no=$request->input("aadhar_no");
$AdvocateEmpanellment->pan_no=$request->input("pan_no");
$AdvocateEmpanellment->gst_no=$request->input("gst_no");
$AdvocateEmpanellment->permanent_addresses_id=$permanent_addresses_id;
$AdvocateEmpanellment->correspondance_addresses_id=$correspondance_addresses_id;
$AdvocateEmpanellment->uid=Auth::user()->id;
$AdvocateEmpanellment->save();
$advocate_empanellments_id=$AdvocateEmpanellment->id;

    //return redirect('advocate/empanellment_complete');
$DocumentsName=$_POST['DocumentsName'];
// $DocumentsFile=$_POST['DocumentsFile'];
$error=false;
$errors='';
$file_uploaded=[];
foreach ($DocumentsName as $key => $value) {
  $upload=EmpanellmentDataController::uploadimg("DocumentsFile_".$key,'uploads/EmpanellmentDocuments');
if($upload['status']==false){
$error=true;
$errors.="Errors in file of ".$value.": <ul>";
$errors.=$upload['errors'];
$errors.="</ul>";
}else{
    $file_uploaded[]=$upload['path'];
    $file=$upload['path'];
$EmpanellmentDocuments=new EmpanellmentDocuments();
$EmpanellmentDocuments->type=$value;
$EmpanellmentDocuments->file=$file;
$EmpanellmentDocuments->advocate_empanellments_id=$advocate_empanellments_id;
$EmpanellmentDocuments->uid=Auth::user()->id;
$EmpanellmentDocuments->save();
}
}

if(isset($_POST['Empanelmentname'])){
    $Empanelmentname=$_POST['Empanelmentname'];
    $EmpanelledSince=$_POST['EmpanelledSince'];
 $ReferenceName=$_POST['ReferenceName'];
$ReferenceMobile=$_POST['ReferenceMobile'];
foreach($Empanelmentname as $key => $v){
      $upload=EmpanellmentDataController::uploadimg("EmpanelmentLetter_".$key,'uploads/EmpanelmentLetter');
if($upload['status']==false){
$error=true;
$errors.="Errors in file of ".$v." (Existing Empanelment): <ul>";
$errors.=$upload['errors'];
$errors.="</ul>";
}else{
    $file_uploaded[]=$upload['path'];
    $EmpanelmentLetter=$upload['path'];
$ExistingEmpanelment=new ExistingEmpanelment();
$ExistingEmpanelment->name=$v;
$ExistingEmpanelment->EmpanelledSince=$EmpanelledSince[$key];
$ExistingEmpanelment->EmpanelmentLetter=$EmpanelmentLetter;
$ExistingEmpanelment->ReferenceName=$ReferenceName[$key];
$ExistingEmpanelment->ReferenceMobile=$ReferenceMobile[$key];
$ExistingEmpanelment->advocate_empanellments_id=$advocate_empanellments_id;
$ExistingEmpanelment->uid=Auth::user()->id;
$ExistingEmpanelment->save();
}
}
}
if($error){
    foreach($file_uploaded as $k => $path){
        if(file_exists($path) and $path!=""){
            unlink($path);
        }
    }
$EmpanellmentDocuments=EmpanellmentDocuments::where('uid',Auth::user()->id)->delete();
$ExistingEmpanelment=ExistingEmpanelment::where('uid',Auth::user()->id)->delete();
$AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->delete();

    return $errors.'<br>
<button onclick="history.back()">Go back</button>
';
exit();
}
///////////////////////////////Storing Educational Data
$id=$advocate_empanellments_id;
 $save10th=new EmpanellmentEducationalData();
      $save10th->name="10th";
      $save10th->board=$request->input("board_10");
      $save10th->passing_date=$request->input("passing_date_10");
      $save10th->percentage=$request->input("percentage_10");
      $save10th->achievement=$request->input("achievement_10");
      $save10th->advocate_empanellments_id=$id;
      $save10th->uid=Auth::user()->id;
      $save10th->save();
      // 12th Save
      $save12th=new EmpanellmentEducationalData();
      $save12th->name="12th";
      $save12th->board=$request->input("board_12");
      $save12th->passing_date=$request->input("passing_date_12");
      $save12th->percentage=$request->input("percentage_12");
      $save12th->achievement=$request->input("achievement_12");
      $save12th->advocate_empanellments_id=$id;
      $save12th->uid=Auth::user()->id;
      $save12th->save();
      // LLB SAVE
          $savellbth=new EmpanellmentEducationalData();
      $savellbth->name="LLB";
      $savellbth->board=$request->input("board_llb");
      $savellbth->passing_date=$request->input("passing_date_llb");
      $savellbth->percentage=$request->input("percentage_llb");
      $savellbth->achievement=$request->input("achievement_llb");
      $savellbth->advocate_empanellments_id=$id;
      $savellbth->uid=Auth::user()->id;
      $savellbth->save();
      // LLM SAVE
      if($request->input("board_llm")!="" and $request->input("passing_date_llm")!="" and $request->input("percentage_llm")!=""){
         $savellm=new EmpanellmentEducationalData();
   
      $savellm->name="LLM";
      $savellm->board=$request->input("board_llm");
      $savellm->passing_date=$request->input("passing_date_llm");
      $savellm->percentage=$request->input("percentage_llm");
      $savellm->achievement=$request->input("achievement_llm");
      $savellm->advocate_empanellments_id=$id;
      $savellm->uid=Auth::user()->id;
      $savellm->save();
         }
         if(isset($_POST['EducationName'])){
$EducationName=$_POST['EducationName'];
$board=$_POST['board'];
$passing_date=$_POST['passing_date'];
$percentage=$_POST['percentage'];
$achievement=$_POST['achievement'];
foreach($EducationName as $key =>$value){
            $save=new EmpanellmentEducationalData();
      $save->name=$value;
      $save->board=$board[$key];
      $save->passing_date=$passing_date[$key];
      $save->percentage=$percentage[$key];
      $save->achievement=$achievement[$key];
      $save->advocate_empanellments_id=$id;
      $save->uid=Auth::user()->id;
      $save->save();  
}
         }

////////////////////
//////////////UPLOADING MAIN CASE HANDLED
$CourtName=$_POST['CourtName'];
$CaseName=$_POST['CaseName'];
$LawConcernedArea=$_POST['LawConcernedArea'];
$LastOrderDate=$_POST['LastOrderDate'];
$Role=$_POST['Role'];
$CaseFact=$_POST['CaseFact'];
foreach($CourtName as $key => $value){
    $MainCasesHandeled=new MainCasesHandeled();
$MainCasesHandeled->CourtName=$CourtName[$key];
$MainCasesHandeled->CaseName=$CaseName[$key];
$MainCasesHandeled->LawConcernedArea=$LawConcernedArea[$key];
$MainCasesHandeled->LastOrderDate=$LastOrderDate[$key];
$MainCasesHandeled->Role=$Role[$key];
$MainCasesHandeled->CaseFact=$CaseFact[$key];
$MainCasesHandeled->advocate_empanellments_id=$advocate_empanellments_id;
$MainCasesHandeled->uid=Auth::user()->id;
$MainCasesHandeled->save();
}
         ////////////////////
    return redirect('advocate/empanellment_complete')->with('success','Success data has been saved successfully! You can now send it for review');

    }
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
