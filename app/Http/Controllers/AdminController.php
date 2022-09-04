<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\beneficiary;
use Illuminate\Support\Facades\Hash;

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
    public function add_users(Request $request){
          User::create([
            'name' => $request->name,
            'utype' => $request->utype,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password2' => $request->password2
        ]);
          if($request->utype=="advocate"){
          return redirect('admin/advocates/view')->with('success','Advocates has been created succesfully');
        }else{
            return redirect('admin/customers/view')->with('success','Customer has been created succesfully!');
        }
    }
        public function customers_view()
    {
        $users=User::where('utype','customer')->get();
          return view('admin/customers/view',compact('users'));
     
    }
         public function AdminviewbeneficiaryCustomer($id)
    {
        $users=User::where('utype','customer')->where('id',$id)->get();
        if(count($users)>0){
                  $beneficiary = beneficiary::where('uid', $id)
               ->get();
          return view('admin/customers/viewbeneficiary',compact('users','beneficiary','id'));
        }else{
          return redirect('logout');
        }
     
    }
           public function AdminviewbeneficiaryIndividualCustomer($id,$beneficiary_id)
    {
        $users=User::where('utype','customer')->where('id',$id)->get();
        if(count($users)>0){
                  $beneficiary = beneficiary::where('uid', $id)->where('id',$beneficiary_id)
                  ->where('is_business_entity',0)
               ->get();
          return view('admin/customers/viewIndividualBeneficiary',compact('users','beneficiary','id'));
        }else{
          return redirect('logout');
        }
     
    }
             public function AdminviewbeneficiaryBusinessEntityCustomer($id,$beneficiary_id)
    {
        $users=User::where('utype','customer')->where('id',$id)->get();
        if(count($users)>0){
                  $beneficiary = beneficiary::where('uid', $id)->where('id',$beneficiary_id)
                  ->where('is_business_entity',1)
               ->get();
          return view('admin/customers/ViewBusinessEntity',compact('users','beneficiary','id'));
        }else{
          return redirect('logout');
        }
     
    }

    
}
