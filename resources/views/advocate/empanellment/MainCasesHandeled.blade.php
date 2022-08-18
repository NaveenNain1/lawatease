@extends('layouts.advocatepanel')

@section('content')
@section('title')
Details of Main Cases Handeled
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                    <div style="text-align:center">
                 
 <h4><b>Details of Main Cases Handeled [Min 3 cases to be submitted]            

 </b></h4> 

</div>
<div style="text-align:right">
  <a href="{{url('/advocate/empanellment_complete/')}}" class="btn btn-secondary btn-sm float-end">
  GO Back</a>
</div>
 @if(\Session::has('success'))
<div class="alert alert-success">
Success! {{\Session::get('success')}}
</div>
 @endif
 @if(isset($data_error))
<?php
$err=1;
?>
<div class="alert alert-danger" >Errors:
  <ul>
@foreach($data_error->all() as $err)
<li>{{$err}}</li>

@endforeach
</ul>
</div>
@endif
 <?php
function str_short($string, $length, $lastLength = 0, $symbol = '...')
{
    if (strlen($string) > $length) {
        $result = substr($string, 0, $length - $lastLength - strlen($symbol)) . $symbol;
        return $result . ($lastLength ? substr($string, - $lastLength) : '');
    }

    return $string;
}
 ?>
  <div class="table-responsive">
   <table class="table">
     <tr><th>Name of Court</th><th>Name of Case</th><th>Concerned Area of Law</th><th>Date of Last Order</th><th>Your Role</th><th>Case Facts</th><th>Action</th></tr>
   <form method="post">
  @csrf  <tr><td><input type="text" name="CourtName" <?php if(isset($err) and isset($_POST['CourtName'])){
      echo 'value="'.$_POST['CourtName'].'"'; 
     } ?> class="form-control" required></td>
<td><input type="text" name="CaseName" <?php if(isset($err) and isset($_POST['CaseName'])){
  echo 'value="'.$_POST['CaseName'].'"'; 
} ?> class="form-control" required></td>
<td><input type="text" name="LawConcernedArea" <?php if(isset($err) and isset($_POST['LawConcernedArea'])){
  echo 'value="'.$_POST['LawConcernedArea'].'"'; 
} ?> class="form-control" required></td>
<td><input type="date" name="LastOrderDate" <?php if(isset($err) and isset($_POST['LastOrderDate'])){
  echo 'value="'.$_POST['LastOrderDate'].'"'; 
} ?> class="form-control" required></td>
<td><input type="text" name="Role" <?php if(isset($err) and isset($_POST['Role'])){
  echo 'value="'.$_POST['Role'].'"'; 
} ?> class="form-control" required></td>
<td><textarea type="text" name="CaseFact"  class="form-control" min="500" max="5000" required><?php if(isset($err) and isset($_POST['CaseFact'])){
  echo $_POST['CaseFact']; 
} ?></textarea></td><td><input type="submit" class="btn btn-primary btn-sm"></td>
     </tr>
   </form>
   @if(count($MainCasesHandeled)>0)
@foreach($MainCasesHandeled as $MainCasesHandeled2)
<tr>
  <td>{{$MainCasesHandeled2->CourtName}}</td>
  <td>{{$MainCasesHandeled2->CaseName}}</td>
  <td>{{$MainCasesHandeled2->LawConcernedArea}}</td>
  <td>{{$MainCasesHandeled2->LastOrderDate}}</td>
  <td>{{$MainCasesHandeled2->Role}}</td>
  <td><p title="{{$MainCasesHandeled2->CaseFact}}">{{str_short($MainCasesHandeled2->CaseFact,40)}}</p></td>
  <td><a href="{{url('advocate/empanellment_complete/MainCasesHandeled/delete/'.$MainCasesHandeled2->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Remove</a></td>
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
 
</script> 
@endsection
