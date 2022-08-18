@extends('layouts.advocatepanel')

@section('content')
@section('title')
Advocate Panel
@endsection
<div class="container">
 
            <div class="card">
 
                <div class="card-body">
                     <div class="table-responsive" style="margin:1px;">
                     	@if(isset($_GET['s']))
<div class="alert alert-success">
Success! Data has been saved successfully!</div>
                     	@endif
<h3>Bank Details</h3>
@if(isset($file_errors))
<?php
$err=1;
?>
<div class="alert alert-danger" >Errors:
  <ul>
 {!!$file_errors!!}

 </ul>
</div>
@endif
  @if(isset($data_error))
<div class="alert alert-danger">
  Error
  <ul>
<?php $err=1; ?>
@foreach($data_error->all() as $d)
<li>{{$d}}</li>
@endforeach
  </ul>

</div>
        @endif
       <?php
if(count($BankDetails)>0){

 foreach($BankDetails as $data){
 $bank_name=$data->bank_name;
$account_no=$data->account_no;
$ifsc_no=$data->ifsc_no;
$account_holder_name=$data->account_holder_name;
$branch_address=$data->branch_address;
$cancelled_cheque=$data->cancelled_cheque;
?>
  <form method="post" enctype="multipart/form-data">
  	@csrf
	 <table >
<tbody>
	<tr><th>Name of Bank</th><td><input type="text" class="form-control" name="bank_name"
 value="{{$bank_name}}" <?php
if(!isset($edit)){
	echo " readonly ";
}
 ?> 
		></td></tr>
	<tr><th>Account No</th><td><input type="text" class="form-control" name="account_no"
 value="{{$account_no}}" <?php
if(!isset($edit)){
	echo " readonly ";
}
 ?> 
		></td></tr>
	<tr><th>IFSC Code</th><td><input type="text" class="form-control" name="ifsc_no"
 value="{{$ifsc_no}}" <?php
if(!isset($edit)){
	echo " readonly ";
}
 ?> 
		></td></tr>
<tr><th>Name of Account Holder</th><td><input type="text" class="form-control" name="account_holder_name" value="{{$account_holder_name}}" <?php
if(!isset($edit)){
	echo " readonly ";
}
 ?>  
	></td></tr>
	<tr><th>Address of the Branch</th><td><input type="text" class="form-control" name="branch_address"
 value="{{$branch_address}}" <?php
if(!isset($edit)){
	echo " readonly ";
}
 ?> 
		></td></tr>
	<tr><th>Upload Cancelled Cheque</th><td>
	&nbsp;	<a href="{{url($cancelled_cheque)}}" target="_blank">View File</a>

	</td></tr>
	<tr><td colspan="2" style="text-align: right"><br>
		@if(isset($edit))
		<input type="submit" class="btn btn-primary btn-sm">

		@else
		<a href="edit_bank_details" class="btn btn-primary btn-sm">Edit</a>
		@endif
	</td></tr>
</tbody>
</table></form>
<?php
}}else{
	?>
<form method="post" enctype="multipart/form-data">
	@csrf
<table>
<tbody>
	<tr><th>Name of Bank</th><td><input type="text" class="form-control" name="bank_name"
<?php
if(isset($_POST['bank_name']) and isset($err)){
	echo 'value="'.$_POST['bank_name'].'"';
}
?>
		></td></tr>
	<tr><th>Account No</th><td><input type="text" class="form-control" name="account_no"
<?php
if(isset($_POST['account_no']) and isset($err)){
	echo 'value="'.$_POST['account_no'].'"';
}
?>
		></td></tr>
	<tr><th>IFSC Code</th><td><input type="text" class="form-control" name="ifsc_no"
<?php
if(isset($_POST['ifsc_no']) and isset($err)){
	echo 'value="'.$_POST['ifsc_no'].'"';
}
?>
		></td></tr>
<tr><th>Name of Account Holder</th><td><input type="text" class="form-control" name="account_holder_name"
<?php
if(isset($_POST['account_holder_name']) and isset($err)){
	echo 'value="'.$_POST['account_holder_name'].'"';
}
?>
	></td></tr>
	<tr><th>Address of the Branch</th><td><input type="text" class="form-control" name="branch_address"
<?php
if(isset($_POST['branch_address']) and isset($err)){
	echo 'value="'.$_POST['branch_address'].'"';
}
?>
		></td></tr>
	<tr><th>Upload Cancelled Cheque</th><td><input type="file" class="form-control" name="cancelled_cheque"></td></tr>
	<tr><td colspan="2" style="text-align: right"><br>
		<input type="submit" class="btn btn-primary btn-sm">
	</td></tr>
</tbody>
</table></form>
<?php } ?>
                     </div>
                </div>
            </div>
        
</div>
@endsection
