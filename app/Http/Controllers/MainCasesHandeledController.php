<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvocateEmpanellment;
use App\Models\MainCasesHandeled;
use Validator;
use Auth;
class MainCasesHandeledController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
  $MainCasesHandeled=MainCasesHandeled::where('uid',Auth::user()->id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();

    return view('advocate/empanellment/MainCasesHandeled',compact('MainCasesHandeled'))	;
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
      return redirect('advocate/empanellment_add');
exit();	
}
$Validator=Validator::make($request->all(),[
'CourtName'=>'required|max:220',
'CaseName'=>'required|max:220',
'LawConcernedArea'=>'required|max:220',
'LastOrderDate'=>'required|max:220',
'Role'=>'required|max:220',
'CaseFact'=>'required|max:5000|min:500'
]);
if($Validator->fails()){
	$data_error=$Validator->messages();
    $MainCasesHandeled=MainCasesHandeled::where('uid',Auth::user()->id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();

	    return view('advocate/empanellment/MainCasesHandeled',compact('data_error','MainCasesHandeled'));

    }else{
$MainCasesHandeled=new MainCasesHandeled();
$MainCasesHandeled->CourtName=$request->input("CourtName");
$MainCasesHandeled->CaseName=$request->input("CaseName");
$MainCasesHandeled->LawConcernedArea=$request->input("LawConcernedArea");
$MainCasesHandeled->LastOrderDate=$request->input("LastOrderDate");
$MainCasesHandeled->Role=$request->input("Role");
$MainCasesHandeled->CaseFact=$request->input("CaseFact");
$MainCasesHandeled->advocate_empanellments_id=$advocate_empanellments_id;
$MainCasesHandeled->uid=Auth::user()->id;
$MainCasesHandeled->save();
return redirect('advocate/empanellment_complete/MainCasesHandeled')->with("success","Data has been saved successfully");
    }
}
public function delete($id){

            $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
  }
  $MainCasesHandeled=MainCasesHandeled::find($id)->delete();
return redirect('advocate/empanellment_complete/MainCasesHandeled')->with("success","Data has been removed successfully");

 }else{
      return redirect('advocate/empanellment_add');
    }
    
}
}
