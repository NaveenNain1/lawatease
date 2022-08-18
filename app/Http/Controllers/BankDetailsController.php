<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use Auth;
use App\Models\BankDetails;
class BankDetailsController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      $BankDetails=BankDetails::where('uid',Auth::user()->id)->get();

      return view('advocate/bank_details',compact('BankDetails'));
    }
      public function edit_bank_details(){
      $BankDetails=BankDetails::where('uid',Auth::user()->id)->get();
$edit=1;
      return view('advocate/bank_details',compact('BankDetails','edit'));
    }
     public function save_edit(Request $request){
      $Validator=Validator::make($request->all(),[
'bank_name'=>'required|max:220',
'account_no'=>'required|max:220',
'ifsc_no'=>'required|max:220',
'account_holder_name'=>'required|max:220',
'branch_address'=>'required|max:220',
      ]);
      if($Validator->fails()){
          $data_error=$Validator->messages();
          $edit=1;
                $BankDetails=BankDetails::where('uid',Auth::user()->id)->get();

                    return view('advocate/bank_details',compact('data_error','BankDetails','edit'));
      }else{
     
                 $BankDetails=BankDetails::where('uid',Auth::user()->id);
  $BankDetails->update(array(
'bank_name'=>$request->input("bank_name"),
'account_no'=>$request->input("account_no"),
'ifsc_no'=>$request->input("ifsc_no"),
'account_holder_name'=>$request->input("account_holder_name"),
'branch_address'=>$request->input("branch_address")
  ));
  return redirect('advocate/bank_details?s');

  }

    }
    
    public function store(Request $request){
    	$Validator=Validator::make($request->all(),[
'bank_name'=>'required|max:220',
'account_no'=>'required|max:220',
'ifsc_no'=>'required|max:220',
'account_holder_name'=>'required|max:220',
'branch_address'=>'required|max:220',
'cancelled_cheque'=>'required|max:5000',
     	]);
     	if($Validator->fails()){
     			$data_error=$Validator->messages();
     			    	$BankDetails=BankDetails::where('uid',Auth::user()->id)->get();

     		    	    	return view('advocate/bank_details',compact('data_error','BankDetails'));
     	}else{
     		$file_error_booleon=false;
     		$cancelled_cheque='';
     		$file_errors='';
$upload_cancelled_cheque=BankDetailsController::uploadimg('cancelled_cheque','uploads/cancelled_cheque');
if($upload_cancelled_cheque['status']==false){
$file_error_booleon=true;
$file_errors.=$upload_cancelled_cheque['errors'];

}else{
$cancelled_cheque=$upload_cancelled_cheque['path'];
}
  if($file_error_booleon){
                    $BankDetails=BankDetails::where('uid',Auth::user()->id)->get();

         return view('advocate/bank_details',compact('file_errors','BankDetails'));   

  }else{
$BankDetails=new BankDetails();
$BankDetails->bank_name=$request->bank_name;
$BankDetails->account_no=$request->account_no;
$BankDetails->ifsc_no=$request->ifsc_no;
$BankDetails->account_holder_name=$request->account_holder_name;
$BankDetails->branch_address=$request->branch_address;
$BankDetails->cancelled_cheque=$cancelled_cheque;
$BankDetails->uid=Auth::user()->id;
$BankDetails->save();
return redirect('advocate/bank_details?s');
     	}
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
   $check = getimagesize($_FILES[$postname]["tmp_name"]);
  if($check !== false) {
     $uploadOk = 1;
  } else {
    $error.= "<li>File is not an image.</li>";
    $uploadOk = 0;
  }
 
// Check if file already exists
if (file_exists($target_file)) {
   $error.= "<li>Sorry, file already exists.</li>";
  $uploadOk = 0;
}

// Check file size
 

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   $error.= "<li>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</li>";
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
