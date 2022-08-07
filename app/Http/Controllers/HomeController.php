<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
      public function index()
    {
        $utype=Auth::user()->utype;
        if($utype=="customer"){
        return view('home');
    }elseif($utype=="admin"){
        return redirect('/admin/home');
    }else{
        
    }
    }
}
