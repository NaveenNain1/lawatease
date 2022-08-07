<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\PlansParticular;
class PlansParticularController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
      public function index(){
 $get=PlansParticular::get();
      return view('admin.plans.particular',compact('get'));
    }
         public function change_can_avail(Request $request){
 $change=PlansParticular::find($request->id);
 if($change->can_avail==1){
$change->can_avail=0;
 }else{
  $change->can_avail=1;

 }
 $change->update();
      return 1;
    }
    
         public function store(request $request){

 $Validator=Validator::make($request->all(),[
'name'=>'required|max:195',
'unit'=>'required|max:195'
 ]);
 if( $Validator->fails()){
 	 $error=$Validator->messages();
 	          	 $get=PlansParticular::get();
      return view('admin.plans.particular',compact('error','get'));
 }else{
$PlansParticular=new PlansParticular;
$PlansParticular->name=$request->input("name");
$PlansParticular->unit=$request->input("unit");
$PlansParticular->save();
$saved=1;
         	 $get=PlansParticular::get();

      return view('admin.plans.particular',compact('saved','get'));

 }
    }
    public function update(Request $request){
 $Validator=Validator::make($request->all(),[
'name'=>'required|max:195',
'unit'=>'required|max:195'
 ]);
 if( $Validator->fails()){
return "All fields are required";
 }else{
  $PlansParticular=PlansParticular::find($request->input('id'));
$PlansParticular->name=$request->input('name');
$PlansParticular->unit=$request->input('unit');
$PlansParticular->update();
 

      return redirect('admin/plans/particular?s');
 }
        }
}
