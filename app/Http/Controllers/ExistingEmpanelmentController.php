<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\AdvocateEmpanellment;
 use App\Models\ExistingEmpanelment;

use Validator;
use Auth;
class ExistingEmpanelmentController extends Controller
{
    //
       public function __construct()
    {
        $this->middleware('auth');
    }
     public function existing_empanelment()
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
 $ExistingEmpanelment=ExistingEmpanelment::where('uid',Auth::user()->id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();
        return view('advocate/empanellment/existing_empanelment',compact('AdvocateEmpanellment','ExistingEmpanelment'));
    }else{
      return redirect('advocate/empanellment_add');
    }
}
   public function delete($id)
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
        $educational_data=ExistingEmpanelment::find($id);
        $file= $educational_data->EmpanelmentLetter;
        $educational_data->delete();
if(file_exists($file)){
  unlink($file);
}
        return redirect('advocate/empanellment_complete/existing_empanelment')->with("success","Record has been deleted successfully!");
   } }else{
      return redirect('advocate/empanellment_add');
    }
}
     public function existing_empanelment_store(Request $request)
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
   $ExistingEmpanelment=ExistingEmpanelment::where('uid',Auth::user()->id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();

 $Validator=Validator::make($request->all(),[
'name'=>'required|max:220',
'EmpanelledSince'=>'required|max:220',
'EmpanelmentLetter'=>'required',
'ReferenceName'=>'required|max:220',
'ReferenceMobile'=>'required|max:220',
 ]);
 if($Validator->fails()){
  $data_error=$Validator->messages();
        return view('advocate/empanellment/existing_empanelment',compact('AdvocateEmpanellment','data_error','ExistingEmpanelment'));
 
 } else{
     $EmpanelmentLetter='';
     $upload_EmpanelmentLetter=ExistingEmpanelmentController::uploadimg('EmpanelmentLetter','uploads/EmpanelmentLetter');
     if($upload_EmpanelmentLetter['status']==false){
      $file_errors=$upload_EmpanelmentLetter['errors'];
        return view('advocate/empanellment/existing_empanelment',compact('AdvocateEmpanellment','file_errors','ExistingEmpanelment'));

     }else{
$EmpanelmentLetter=$upload_EmpanelmentLetter['path'];
$ExistingEmpanelment=new ExistingEmpanelment();
$ExistingEmpanelment->name=$request->input("name");
$ExistingEmpanelment->EmpanelledSince=$request->input("EmpanelledSince");
$ExistingEmpanelment->EmpanelmentLetter=$EmpanelmentLetter;
$ExistingEmpanelment->ReferenceName=$request->input("ReferenceName");
$ExistingEmpanelment->ReferenceMobile=$request->input("ReferenceMobile");
$ExistingEmpanelment->advocate_empanellments_id=$advocate_empanellments_id;
$ExistingEmpanelment->uid=Auth::user()->id;
$ExistingEmpanelment->save();
      return redirect("advocate/empanellment_complete/existing_empanelment")->with('success','Data has been saved successfully!');

     }

           
 }
    }else{
      return redirect('advocate/empanellment_add');
    }
}
  function uploadimg($postname,$folder){
$target_dir = $folder.'/';
$target_file = $target_dir . basename($_FILES[$postname]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file2 = $target_dir . rand(9999,99999).md5(time()).".".$imageFileType;
 $error="";
// Check if image file is a actual image or fake image
 
 
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
   $error.= "<li>Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.</li>";
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
