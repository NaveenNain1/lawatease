@extends('layouts.advocatepanel')

@section('content')
@section('title')
Educational and professional information
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
 
                <div class="card-body">
                    <div style="text-align:center">
                 
 <h2><b>    Educational and professional information

 </b></h2> 

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
 @if(count($EmpanellmentEducationalData)>0)
  <form method="post" action="{{url('advocate/empanellment_complete/educational_data/update')}}">
  @csrf
 <table class="table">
   <tr><th>Education</th><th>Board / University</th><th>Date Of Passing</th><th>Percentage Marks</th><th>Achievement</th><th>Action</th></tr>
 @foreach($EmpanellmentEducationalData as $get2)
   <tr><th>{{$get2->name}}</th>
    <td><input type="text" name="boards[{{$get2->id}}]" value="{{$get2->board}}" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date[{{$get2->id}}]" value="{{$get2->passing_date}}" required   class="form-control"></td>
    <td><input type="number" name="percentage[{{$get2->id}}]" value="{{$get2->percentage}}" required placeholder="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement[{{$get2->id}}]" value="{{$get2->achievement}}" required placeholder="Achievement" class="form-control"></td>
<td><a href="{{url('advocate/empanellment_complete/educational_data/delete/'.$get2->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
   </tr>
 @endforeach
    <tr><td><input type="submit" class="btn btn-primary btn-sm" name="save"></td><td colspan="3" style="text-align: right"><button type="button" class="btn btn-primary btn-sm float-end" data-toggle="modal" data-target="#add_new">
  Add New
</button></td></tr>

 </table>
</form>
<!-- Button trigger modal -->

<form method="post" action="{{url('advocate/empanellment_complete/educational_data/save_new')}}">
  @csrf
<!-- Modal -->
<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding New Educational and professional information
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table class="table">
 <tr><th>Education</th><td><input type="text" name="education" class="form-control"></td></tr>
           <tr><th>Board / University </th><td><input type="text" name="board" class="form-control"></td></tr>
           <tr><th>Date Of Passing  </th><td><input type="date" name="passing_date" class="form-control"></td></tr>
           <tr><th>Percentage Marks </th><td><input type="number" name="percentage" class="form-control"></td></tr>
                      <tr><th>Achievement</th><td><input type="text" name="achievement" class="form-control"></td></tr>

         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
 @else
 <form method="post">
  @csrf
 <table class="table">
   <tr><th>Education</th><th>Board / University</th><th>Date Of Passing</th><th>Percentage Marks</th><th>Achievement</th></tr>
   <tr><th>10th*</th>
    <td><input type="text" name="board_10" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_10" required   class="form-control"></td>
    <td><input type="number" name="percentage_10" required placeholder="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_10" required placeholder="Achievement" class="form-control"></td>

   </tr>
<tr><th>12th*</th>
    <td><input type="text" name="board_12" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_12" required   class="form-control"></td>
    <td><input type="number" name="percentage_12" required placeholder="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_12" required placeholder="Achievement" class="form-control"></td>

   </tr>
   <tr><th>LLB*</th>
    <td><input type="text" name="board_llb" required placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_llb" required   class="form-control"></td>
    <td><input type="number" name="percentage_llb" required placeholder="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_llb" required placeholder="Achievement" class="form-control"></td>

   </tr>
   <tr><th>LLM</th>
    <td><input type="text" name="board_llm"  placeholder="Board / University" class="form-control"></td>
<td><input type="date" name="passing_date_llm"    class="form-control"></td>
    <td><input type="number" name="percentage_llm"  placeholder="Percentage Marks" class="form-control"></td>
    <td><input type="text" name="achievement_llm"  placeholder="Achievement" class="form-control"></td>

   </tr>
   <tr><td><input type="submit" class="btn btn-primary btn-sm" name="save"></td></tr>
 </table></form>
  @endif
 
                 </div>
            </div>
        </div>
    </div>
</div>
 
</script> 
@endsection
