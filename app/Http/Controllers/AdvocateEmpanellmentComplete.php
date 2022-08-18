<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvocateAddresses;
use App\Models\AdvocateEmpanellment;
use App\Models\EmpanellmentEducationalData;
use App\Models\EmpanellmentDocuments;
use App\Models\ExistingEmpanelment;
use App\Models\MainCasesHandeled;

use Validator;
use Auth;
class AdvocateEmpanellmentComplete extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
  foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
        $educational_data=EmpanellmentEducationalData::where('uid',Auth::user()->id)
        ->where('advocate_empanellments_id',$AdvocateEmpanellment2->id)
        ->get();
         $MainCasesHandeled=MainCasesHandeled::where('uid',Auth::user()->id)
        ->where('advocate_empanellments_id',$AdvocateEmpanellment2->id)
        ->get();
         $EmpanellmentDocuments=EmpanellmentDocuments::where('uid',Auth::user()->id)
        ->where('advocate_empanellments_id',$AdvocateEmpanellment2->id)
        ->get();

        return view('advocate/empanellment/empanellment_complete',compact('AdvocateEmpanellment','educational_data','MainCasesHandeled','EmpanellmentDocuments'));
   } }else{
      return redirect('advocate/empanellment_add');
    }
}
       public function send(){
            $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->update(['is_submitted'=>1]);
  
        return redirect('advocate/empanellment_complete')->with("success","Your detais has been submitted for review.");
 
    }
 public function educational_data()
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->get();
if(count($AdvocateEmpanellment)>0){
        $EmpanellmentEducationalData=EmpanellmentEducationalData::where('uid',Auth::user()->id)->get();

        return view('advocate/empanellment/educational_data_complete',compact('AdvocateEmpanellment','EmpanellmentEducationalData'));
    }else{
      return redirect('advocate/empanellment_add');
    }
}
 public function educational_data_delete($id)
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
        $EmpanellmentEducationalData=EmpanellmentEducationalData::where('uid',Auth::user()->id)->where('id',$id)->delete();

        return redirect('advocate/empanellment_complete/educational_data')->with('success','Success! data has been deleted successfully');
    }else{
      return redirect('advocate/empanellment_add');
    }
}


 public function educational_data_store(Request $request)
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
  $id=$AdvocateEmpanellment2->id;
}
}else{
        return redirect('advocate/empanellment_add');
exit();
}
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
      return redirect("advocate/empanellment_complete/educational_data")->with('success','Data has been saved successfully!');
}
 public function educational_data_update(Request $request)
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
  $id=$AdvocateEmpanellment2->id;
}
}else{
        return redirect('advocate/empanellment_add');
exit();
}
$boards=$request->input('boards');
$passing_date=$request->input('passing_date');
$percentage=$request->input('percentage');
$achievement=$request->input('achievement');
foreach($boards as $id=>$value){
         $save=EmpanellmentEducationalData::find($id);
     $save->update([
'board'=>$boards[$id],
'passing_date'=>$passing_date[$id],
'percentage'=>$percentage[$id],
'achievement'=>$achievement[$id],
     ]);
}
     
      return redirect("advocate/empanellment_complete/educational_data")->with('success','Data has been saved successfully!');
}


 public function educational_data_save_new(Request $request)
    {
      $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',Auth::user()->id)->where('is_submitted',0)->get();
if(count($AdvocateEmpanellment)>0){
foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
  $id=$AdvocateEmpanellment2->id;
}
}else{
        return redirect('advocate/empanellment_add');
exit();
}
         $save=new EmpanellmentEducationalData();

     $save->name=$request->input("education");
      $save->board=$request->input("board");
      $save->passing_date=$request->input("passing_date");
      $save->percentage=$request->input("percentage");
      $save->achievement=$request->input("achievement");
      $save->advocate_empanellments_id=$id;
      $save->uid=Auth::user()->id;
      $save->save();
     
      return redirect("advocate/empanellment_complete/educational_data")->with('success','Data has been saved successfully!');
}

}
