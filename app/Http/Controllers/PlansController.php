<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\plans;
use App\Models\PansFeatures;

class PlansController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      $plans=plans::all();

      return view('admin.plans.index',compact('plans'));
    }
      public function particular(){
      // $plans=plans::all();

      return view('admin.plans.particular');
    }
    
       public function edit_view($id){
      $plans=plans::where('id',$id)->get();

      return view('admin.plans.edit',compact('plans'));
    }
     public function edit_save(Request $request,$id){
            $plans=plans::where('id',$id)->get();

$validator=Validator::make($request->all(),
[
'name'=>'required|max:225',
'discounted_price'=>'required|max:225',
'period'=>'required|max:225',
'period_type'=>'required|max:225',
'discount'=>'max:225',
'total_individual'=>'required|max:225',
'total_business_entity'=>'required|max:225',
'description'=>'max:225'


]
      );
      if($validator->fails()){
        $error=$validator->messages();
              $plans=plans::all();
        return view('admin.plans.edit',compact('error','plans'));
      }else{
        $plans=plans::where('id',$id);

$plans->update(['name'=>$request->input('name'),
'discounted_price'=>$request->input('discounted_price'),
'period'=>$request->input('period'),
'period_type'=>$request->input('period_type'),
'discount'=>$request->input('discount'),
'total_individual'=>$request->input('total_individual'),
'total_business_entity'=>$request->input('total_business_entity'),
'description'=>$request->input('description')]);
    $plans=plans::all();
    $saved=1;
        return view('admin.plans.edit',compact('plans','saved'));
      }
     }
     public function store(Request $request){
     	$validator=Validator::make($request->all(),
[
'name'=>'required|max:225',
'discounted_price'=>'required|max:225',
'period'=>'required|max:225',
'period_type'=>'required|max:225',
'discount'=>'max:225',
'description'=>'max:225',
'total_individual'=>'required|max:225',
'total_business_entity'=>'required|max:225',
]
     	);
     	if($validator->fails()){
     		$error=$validator->messages();
     		     	$plans=plans::all();
     		return view('admin.plans.index',compact('error','plans'));
     	}else{
$plans=new plans;
$plans->name=$request->input('name');
$plans->discounted_price=$request->input('discounted_price');
$plans->period=$request->input('period');
$plans->period_type=$request->input('period_type');
$plans->discount=$request->input('discount');
$plans->description=$request->input('description');
$plans->total_individual=$request->input('total_individual');
$plans->total_business_entity=$request->input('total_business_entity');
$plans->save();
$saved=1;
     	$plans=plans::all();

     		return view('admin.plans.index',compact('saved','plans'));
     	}
    	
    }
    public function delete_feature(Request $request){
            $validator=Validator::make($request->all(),
[
'id'=>'required|max:225',
'plans_id'=>'required|max:225',
 
]
        );
    if($validator->fails()){
        return "All fields are required!";
}else{
               $PansFeatures=PansFeatures::find($request->input('id'));
               $PansFeatures->delete();
                      return redirect('admin/plans?s&plans_id='.$request->plans_id);

}
    }
    public function add_features(Request $request){

    $validator=Validator::make($request->all(),
[
'name'=>'required|max:225',
'icon'=>'required|max:225',
'plans_id'=>'required|max:225',
 
]
        );
    if($validator->fails()){
        return "All fields are required!";

    }else{
       $PansFeatures=new PansFeatures;
       $PansFeatures->name=$request->name; 
       $PansFeatures->icon=$request->icon; 
       $PansFeatures->plans_id=$request->plans_id; 
       $PansFeatures->save();
       return redirect('admin/plans?s&plans_id='.$request->plans_id);
    }
    }
}
;