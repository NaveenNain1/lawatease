<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
        use App\Models\BankDetails;
use App\Models\AdvocateAddresses;
use App\Models\AdvocateEmpanellment;
use App\Models\EmpanellmentEducationalData;
use App\Models\EmpanellmentDocuments;
use App\Models\ExistingEmpanelment;
use App\Models\MainCasesHandeled;

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
            if(count($AdvocateEmpanellment)>0){
                foreach($AdvocateEmpanellment as $AdvocateEmpanellment2){
                    $advocate_empanellments_id=$AdvocateEmpanellment2->id;
      $EmpanellmentEducationalData=EmpanellmentEducationalData::where('uid',$id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();
   $ExistingEmpanelment=ExistingEmpanelment::where('uid',$id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();
     $MainCasesHandeled=MainCasesHandeled::where('uid',$id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();
 $EmpanellmentDocuments=EmpanellmentDocuments::where('uid',$id)->where('advocate_empanellments_id',$advocate_empanellments_id)->get();

}
        }else{
            $ExistingEmpanelment=[];
            $EmpanellmentEducationalData=[];
             $MainCasesHandeled=[];
             $EmpanellmentDocuments=[];
        }

        $users=User::where('utype','advocate')->where('id',$id)->get();
          return view('admin/advocates/view_details',compact('users','BankDetails','AdvocateEmpanellment','EmpanellmentEducationalData','ExistingEmpanelment','MainCasesHandeled','EmpanellmentDocuments'));
     
    }

    
}
