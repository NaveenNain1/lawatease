<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\plans;
use App\Models\plans_structure;
use App\Models\PlansParticular;
use Validator;
use App\Models\CustomerPlans;
use App\Models\CustomerPlansParticulars;
class CustomerPlansController extends Controller
{
    //
       public function __construct()
    {
        $this->middleware('auth');
    }


       
        public function customers_viewplans($id)
    {
        $users=User::where('utype','customer')->where('id',$id)->get();
        $CustomerPlans=CustomerPlans::where('uid',$id)->get();
        $plans=plans::all();
          return view('admin/customers/viewplans',compact('users','plans','CustomerPlans','id'));
     
    }
     public function customers_viewplansdetails($id,$customer_plans_id)
    {
    	        $users=User::where('utype','customer')->where('id',$id)->get();
if(count($users)>0){
         $CustomerPlans=CustomerPlans::where('uid',$id)->where('id',$customer_plans_id)->get();
 $CustomerPlansParticulars=CustomerPlansParticulars::where('uid',$id)->where('customer_plans_id',$customer_plans_id)->get();
           return view('admin/customers/viewplans_details',compact('CustomerPlans','CustomerPlansParticulars','users'));
     }
    }

         public function customers_viewplans_store($id,Request $request)
    {
$Validator=Validator::make($request->all(),
[
'plans_id'=>'required|max:220',
'purchase_price'=>'required|max:220',
'period'=>'required|max:220',
'period_type'=>'required|max:220',
'purchase_date'=>'required|max:220',
]
);
if($Validator->fails()){
$html='Data Error:<ul>';
foreach($Validator->messages()->all() as $k =>$v){
$html.="<li>{$v}</li>";
}
$html.="</ul>";
$html.='<br>
<button onclick="history.back()">Go back</button>
';
return $html;
}else{
	$CustomerPlans=new CustomerPlans();
	$plans_id=$request->input("plans_id");
	        $plans=plans::find($plans_id);

	$CustomerPlans->name=$plans->name;
	$CustomerPlans->plans_id=$plans_id;
$CustomerPlans->purchase_date=$request->input("purchase_date");
$CustomerPlans->purchase_price=$request->input("purchase_price");
$CustomerPlans->period=$request->input("period");
$CustomerPlans->period_type=$request->input("period_type");
$CustomerPlans->uid=$id;
$CustomerPlans->save();
$CustomerPlansId=$CustomerPlans->id;
$plans_structure=plans_structure::where('plans_id',$plans_id)->get();
foreach($plans_structure as $plans_structure2){
	 $plans_particulars_id=$plans_structure2->plans_particulars_id;
	 $PlansParticulars=PlansParticular::find($plans_particulars_id);
	 $CustomerPlansParticulars=new CustomerPlansParticulars();
	 $CustomerPlansParticulars->name=$PlansParticulars->name;
	 $CustomerPlansParticulars->unit=$PlansParticulars->unit;
	 $CustomerPlansParticulars->can_avail=$PlansParticulars->can_avail;
	 $CustomerPlansParticulars->plans_id=$plans_id;
	 $CustomerPlansParticulars->customer_plans_id=$CustomerPlansId;
	 $CustomerPlansParticulars->total_service=$plans_structure2->qty;
	 $CustomerPlansParticulars->used_service=0;
	 $CustomerPlansParticulars->uid=$id;
	 $CustomerPlansParticulars->save();
}
return redirect('admin/customers/viewplans/'.$id)->with("success","Plans created successfully!");
 }
      
    }
}
