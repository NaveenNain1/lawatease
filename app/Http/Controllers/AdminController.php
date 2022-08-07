<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
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
        return redirect('home');
    }elseif($utype=="admin"){
        return view('admin/home');
    }else{
        
    }
    }
}
