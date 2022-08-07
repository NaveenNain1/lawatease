<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plans;
use App\Models\PlansParticular;
use App\Models\plans_structure;

class PlansStructureController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	      $plans=plans::all();
         	 $PlansParticular=PlansParticular::all();
    	     $plans_structure=plans_structure::all();

    	return view('admin/plans/PlansStructure',compact('PlansParticular','plans','plans_structure'));
    }
      public function store(Request $request){
    	     $plans=plans::all();
         	 $PlansParticular=PlansParticular::all(); 
         	 $data=$request->data;
          	 foreach($data as $key =>$val){
$ids=explode('_', $key);
$plans_id=$ids[0];
$plans_particulars_id=$ids[1];
$check=plans_structure::where('plans_id',$plans_id)->where('plans_particulars_id',$plans_particulars_id)->get();
if(count($check)>0){
	$check=plans_structure::where('plans_id',$plans_id)->where('plans_particulars_id',$plans_particulars_id);
 
 $check->update(['qty'=>$val]);
}else{
$plans_structure=new plans_structure;
$plans_structure->qty=$val;
$plans_structure->plans_id=$plans_id;
$plans_structure->plans_particulars_id=$plans_particulars_id;
$plans_structure->save();
}
          	 }
     $saved=1;     	 
    	return redirect("admin/plans/PlansStructure?s");
    }
}
