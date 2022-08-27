<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdvocateCases;
use Validator;

class AdvocateCasesAdminController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
public function advocates_addcases($id){
	    	$AdvocateCases=AdvocateCases::where('uid',$id)->get();

	         $users=User::where('utype','advocate')->where('id',$id)->get();
          return view('admin/advocates/addcases',compact('users','AdvocateCases'));

}
public function advocates_addcases_save(Request $request,$id){
	         $users=User::where('utype','advocate')->where('id',$id)->get();
	         $Validator=Validator::make($request->all(),
[
'PlaintiffName'=>'max:100|required',
'DefendantName'=>'max:100|required',
'CourtName'=>'max:100|required',
'Dist'=>'max:100|required',
'State'=>'max:100|required',
'CourtCaseNo'=>'max:100|required',
'FillingDate'=>'max:100|required',
'LAETMCaseNo'=>'max:100|required',
'LAETMCin'=>'max:100|required',
'PresentStatus'=>'max:100|required',
'NextDateofHearing'=>'max:100|required',
'Remarks'=>'max:100|required',
]
	     );
	       if($Validator->fails()){
    return "All field are required with sign * and max length is 220 words!
<br>
<button onclick='history.back();'>Go Back</button>
    ";
    }else{
    	$AdvocateCases=new AdvocateCases();
    	$AdvocateCases->PlaintiffName=$request->input("PlaintiffName");
$AdvocateCases->DefendantName=$request->input("DefendantName");
$AdvocateCases->CourtName=$request->input("CourtName");
$AdvocateCases->Dist=$request->input("Dist");
$AdvocateCases->State=$request->input("State");
$AdvocateCases->CourtCaseNo=$request->input("CourtCaseNo");
$AdvocateCases->FillingDate=$request->input("FillingDate");
$AdvocateCases->LAETMCaseNo=$request->input("LAETMCaseNo");
$AdvocateCases->LAETMCin=$request->input("LAETMCin");
$AdvocateCases->PresentStatus=$request->input("PresentStatus");
$AdvocateCases->NextDateofHearing=$request->input("NextDateofHearing");
$AdvocateCases->Remarks=$request->input("Remarks");
$AdvocateCases->uid=$id;
$AdvocateCases->save();
    }
          return redirect('admin/advocates/addcases/'.$id)->with('success','Cases add successfully!');

}
}
