<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpanellmentDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('advocate/empanellment/index');
    }
    public function add(){
        return view('advocate/empanellment/empanellment_add');
    }
    
}
