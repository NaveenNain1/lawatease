<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plans;
use App\Models\PlansParticular;

class PlansStructureController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	      $plans=plans::all();
         	 $PlansParticular=PlansParticular::all();

    	return view('admin/plans/PlansStructure',compact('PlansParticular','plans'));
    }
}
