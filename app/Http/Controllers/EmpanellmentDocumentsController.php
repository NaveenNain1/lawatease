<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\AdvocateEmpanellment;
 use App\Models\EmpanellmentDocuments;
 
use Validator;
use Auth;
class EmpanellmentDocumentsController extends Controller
{
    //

           public function __construct()
    {
        $this->middleware('auth');
    }
        public function index()
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
 $EmpanellmentDocuments=EmpanellmentDocuments::where('uid',Auth::user()->id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();

        return view('advocate/empanellment/EmpanellmentDocuments',compact('AdvocateEmpanellment','EmpanellmentDocuments'));
    }else{
      return redirect('advocate/empanellment_add');
    }
}
public function store(Request $request){
	      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
}else{
return "Error";
exit();
}	$Validator=Validator::make($request->all(),[

'type'=>'required|max:220',
'file'=>'required',
	]);
	if($Validator->fails()){

    return "All field are required with sign * and max length is 220 words!
<br>
<button onclick='history.back();'>Go Back</button>
    ";
    	}else{
$file='';
     $fileupload=EmpanellmentDocumentsController::uploadimg('file','uploads/EmpanellmentDocuments');
     if($fileupload['status']==false){
     		      $file_errors=$fileupload['errors'];

 return "Errors while uploading file:!
 <ul>
".$file_errors."
 </ul>
<br>
<button onclick='history.back();'>Go Back</button>
    ";
}else{
$file=$fileupload['path'];
$EmpanellmentDocuments=new EmpanellmentDocuments();
$EmpanellmentDocuments->type=$request->type;
$EmpanellmentDocuments->file=$file;
$EmpanellmentDocuments->advocate_empanellments_id=$advocate_empanellments_id;
$EmpanellmentDocuments->uid=Auth::user()->id;
$EmpanellmentDocuments->save();
return redirect("advocate/empanellment_complete/EmpanellmentDocuments")->with("success","File has been uploaded successfully!");
}
    	}
}
public function delete($id){
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
 $EmpanellmentDocuments=EmpanellmentDocuments::find($id);
if(file_exists($EmpanellmentDocuments->file)){
	unlink($EmpanellmentDocuments->file);
}
 $EmpanellmentDocuments->delete();
 return redirect("advocate/empanellment_complete/EmpanellmentDocuments")->with("success","File has been deleted successfully!");

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
