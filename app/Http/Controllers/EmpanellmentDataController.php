<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvocateAddresses;
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
]);
if($Validator->fails()){
    return "All field are required with sign * and max length is 220 words!
<br>
<button onclick='history.back();'>Go Back</button>
    ";
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
    return redirect('advocate/empanellment_complete');

    }
}
}
