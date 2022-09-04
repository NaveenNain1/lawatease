@extends('layouts.advocatepanel')

@section('content')
@section('title')
My Cases
@endsection
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                	My Cases
                	<div class="table-responsive">
                   <table class="table" border="1">
                   	<tr><th>Name of Plaintiff</th><th>Name of Defendant</th><th>Name of Court</th>
<th>Dist</th><th>State</th><th>Court Case No</th><th>Date of Filling</th><th>LAETM Case No</th><th>LAETM CIN</th><th>Present Status</th><th>Next Date of Hearing</th><th>Remarks</th>
                   	</tr>
                 
                 @if(count($AdvocateCases)>0)
@foreach($AdvocateCases as $data)
      <tr><td>{{$data->PlaintiffName}}</td><td>{{$data->DefendantName}}</td><td>{{$data->CourtName}}</td>
<td>{{$data->Dist}}</td><td>{{$data->State}}</td><td>{{$data->CourtCaseNo}}</td><td>{{$data->FillingDate}}</td><td>{{$data->LAETMCaseNo}}</td><td>{{$data->LAETMCin}}</td><td>{{$data->PresentStatus}}</td><td>{{$data->NextDateofHearing}}</td><td>{{$data->Remarks}}</td>
                    </tr>
@endforeach

                 @endif
                   </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
