<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
        use App\Models\BankDetails;
use App\Models\AdvocateEmpanellment;
use App\Models\AdvocateAddresses;

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
    }else if($utype=="advocate"){
            return redirect('/advocate/home');
    }else{

    }
    }
         public function advocates_view()
    {
        $users=User::where('utype','advocate')->get();
          return view('/admin/advocates/view',compact('users'));
     
    }
             public function advocates_view_details($id)
    {

      $BankDetails=BankDetails::where('uid',$id)->get();
            $AdvocateEmpanellment=AdvocateEmpanellment::where('uid',$id)->get();

        $users=User::where('utype','advocate')->where('id',$id)->get();
          return view('admin/advocates/view_details',compact('users','BankDetails','AdvocateEmpanellment'));
     
    }

    
}
