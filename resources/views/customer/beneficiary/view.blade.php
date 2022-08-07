@extends('layouts.customerpanel')

@section('content')
@section('title')
My beneficiary
@endsection
@if(isset($_GET['s']))
<div style='border:
  1.0pt solid black;height:auto;width:auto;font-size: 20pt;'>Thanks for Adding the
  Beneficiary. A Welcome Email with Verfication Link has been sent to the Added
  Beneficiary. Please click on the verification link with next 24 hours. Post
  verification, our Team shall review the Beneficiary details and would approve
  the same within 8 working hours.</div>
  @else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My beneficiary') }}</div>

                <div class="card-body">
              <div class="row">
@if(count($beneficiary)>0)
<div class="row">
    @foreach($beneficiary as $get2)
<div class="btn btn-secondary col-sm-3 btn-sm" style="margin: 30px;font-size: 19px;">
{{$get2->first_name}}
<br>
@if($get2->is_verifed==1)
<i>(Verified)</i>
@else
<i>(In Review)</i>
@endif
</div>
@endforeach
</div>
@else
<p style="text-align: center;"><b>No records found</b></p>
@endif
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
