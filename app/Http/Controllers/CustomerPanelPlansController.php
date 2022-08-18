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
class CustomerPanelPlansController extends Controller
{
        //
       public function __construct()
    {
        $this->middleware('auth');
    }
        public function index()
    {
         $CustomerPlans=CustomerPlans::where('uid',Auth::user()->id)->get();
           return view('customer/liptm/view',compact('CustomerPlans'));
     
    }
       public function viewdetails($id)
    {
         $CustomerPlans=CustomerPlans::where('uid',Auth::user()->id)->where('id',$id)->get();
 $CustomerPlansParticulars=CustomerPlansParticulars::where('uid',Auth::user()->id)->where('customer_plans_id',$id)->get();
           return view('customer/liptm/viewdetails',compact('CustomerPlans','CustomerPlansParticulars'));
     
    }
}
