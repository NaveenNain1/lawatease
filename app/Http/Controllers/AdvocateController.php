<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvocateCases;
use Auth;
class AdvocateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/advocate/home');

    }
       public function mycases()
    {
        $AdvocateCases=AdvocateCases::where('uid',Auth::user()->id)->get();
        return view('/advocate/mycases',compact('AdvocateCases'));

    }

}
