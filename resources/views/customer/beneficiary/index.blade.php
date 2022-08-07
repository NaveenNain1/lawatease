@extends('layouts.customerpanel')

@section('content')
@section('title')
Add beneficiary
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add beneficiary') }}</div>

                <div class="card-body">
                    <div style="text-align: center;" >
                   <a href="beneficiary/add_individual" class="btn btn-primary btn-sm" style="font-size:30px;margin-top: 10px;">
Individual  
                   </a> 
                   &nbsp; &nbsp;
                    &nbsp; &nbsp;
                   <a href="add_business_entity" class="btn btn-primary btn-sm" style="font-size:30px;margin-top: 10px;">
Business Entity 
      
                   </a>
 </div>
 <hr>
 <b>Please Note that </b>
 <ol>              
 <li> In case of Bronze LIPTM, 1 Individual Beneficiary can be added               
</li><li> In case of Silver LIPTM, upto 2 Individual Beneficiaries can be added during LIPTM validity period.              
</li><li> In case of Gold LIPTM, upto 4 Individual Beneficiaries OR 1 Business Entity [as per selection made at the time purchasing the LIPTM can be added during LIPTM validity period.[In case of Proprietorship Firm, please add Proprietor's details as Individual Beneficiary]                
</li><li> In case of Diamond LIPTM, 1 Business Entity can be added. [In case of Proprietorship Firm, please add Proprietor's details as Individual Beneficiary]                
</li><li> In case of Property Seller LIPTM, any one of the Sellers to be added as Beneficiary.             
</li><li> In case of Property Buyer LIPTM, any one of the Buyers to be added as Beneficiary.               
</li><li> In case of Estate Planning LIPTM, details of Individual whose Estate is to be managed to be added as Beneficiary.                
</li>
</ol>              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
