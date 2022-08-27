@extends('layouts.adminapp')

@section('content')
@section('title')
All Advocates - >
@endsection
    @foreach($users as $get)

<div class="container">
    <div class="row justify-content-center">
        <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Advocates Details') }}</div>

                <div class="card-body">
  <b>Name:</b> {{$get->name}},<br> <b>Email:</b> {{$get->email}} 
                </div>
            </div>
        </div>
          <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Add Cases') }}</div>

                <div class="card-body">
                   @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
<form method="post">
  @csrf
    <div class="row">
  <div class="form-group col-sm-3">
    <label for="PlaintiffName">Name of Plaintiff</label>
    <input type="text" class="form-control" id="PlaintiffName" name="PlaintiffName"  required>
   </div>
     <div class="form-group col-sm-3">
    <label for="DefendantName">Name of Defendant</label>
    <input type="text" class="form-control" id="DefendantName" name="DefendantName"  required>
   </div>
        <div class="form-group col-sm-3">
    <label for="CourtName">Name of Court</label>
    <input type="text" class="form-control" id="CourtName" name="CourtName"  required>
   </div>
     <div class="form-group col-sm-3">
    <label for="Dist">Dist.</label>
    <input type="text" class="form-control" id="Dist" name="Dist"  required>
   </div>
      <div class="form-group col-sm-3">
    <label for="State">State</label>
    <input type="text" class="form-control" id="State" name="State"  required>
   </div>
    <div class="form-group col-sm-3">
    <label for="CourtCaseNo">Court Case No</label>
    <input type="text" class="form-control" id="CourtCaseNo" name="CourtCaseNo"  required>
   </div>
     <div class="form-group col-sm-3">
    <label for="FillingDate">Date of Filling</label>
    <input type="date" class="form-control" id="FillingDate" name="FillingDate" required >
   </div>
     <div class="form-group col-sm-3">
    <label for="LAETMCaseNo">LAETM Case No</label>
    <input type="text" class="form-control" id="LAETMCaseNo" name="LAETMCaseNo"  required>
   </div>
        <div class="form-group col-sm-3">
    <label for="LAETMCin">LAETM CIN</label>
    <input type="text" class="form-control" id="LAETMCin" name="LAETMCin" required >
   </div>
    <div class="form-group col-sm-3">
    <label for="PresentStatus">Present Status</label>
    <input type="text" class="form-control" id="PresentStatus" name="PresentStatus" required >
   </div>
    <div class="form-group col-sm-3">
    <label for="NextDateofHearing">Next Date of Hearing</label>
    <input type="date" class="form-control" id="NextDateofHearing" name="NextDateofHearing" required >
   </div>
       <div class="form-group col-sm-3">
    <label for="Remarks">Remarks</label>
    <input type="text" class="form-control" id="Remarks" name="Remarks" required >
   </div>
 </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
                </div>
            </div>
        </div>
       <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                  Cases Added
                  <div class="table-responsive">
                   <table class="table" border="1">
                    <tr><th>Name of Plaintiff</th><th>Name of Defendant</th><th>Name of Court</th>
<th>Dist</th><th>State</th><th>Court Case No</th><th>Date of Filling</th><th>LAETM Case No</th><th>LAETM CIN</th><th>Present Status</th><th>Next Date of Hearing</th><th>Remarks</th>
                    </tr>
                 
                 @if(count($AdvocateCases)>0)
@foreach($AdvocateCases as $data)
      <tr><td>{{$data->PlaintiffName}}</td><td>{{$data->DefendantName}}</td><td>{{$data->CourtName}}</td>
<td>{{$data->Dist}}</td><td>{{$data->Satate}}</td><td>{{$data->CourtCaseNo}}</td><td>{{$data->FillingDate}}</td><td>{{$data->LAETMCaseNo}}</td><td>{{$data->LAETMCin}}</td><td>{{$data->PresentStatus}}</td><td>{{$data->NextDateofHearing}}</td><td>{{$data->Remarks}}</td>
                    </tr>
@endforeach

                 @endif
                   </table>
                   </div>
                </div>
            </div>
        </div>
 
    </div>
    </div>
</div>
@endforeach
@endsection
