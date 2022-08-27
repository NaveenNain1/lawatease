@extends('layouts.adminapp')

@section('content')
@section('title')
Add Plans
@endsection
@if(isset($saved) || isset($_GET['s']))
<div class="alert alert-success">
Success! data has been saved successfully.</div>
@endif
<form method="post">
  @csrf
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding New Plan..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($error))
<div class="alert alert-danger">
  Error
  <ul>

@foreach($error->all() as $d)
<li>{{$d}}</li>
@endforeach
  </ul>

</div>
        @endif
         <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" <?php if(isset($_POST['name']) and isset($error)){ echo "value='{$_POST['name']}'"; } ?>>
  </div>
    <div class="form-group">
    <label for="discounted_price">Price (Including Discount)</label>
    <input type="number" class="form-control" id="discounted_price" name="discounted_price" <?php if(isset($_POST['discounted_price']) and isset($error)){ echo "value='{$_POST['discounted_price']}'"; } ?>>
  </div>

  <div class="form-group">
    <label for="discount">Amt without Discount</label>
    <input type="text" class="form-control" id="discount" name="discount" <?php if(isset($_POST['discount']) and isset($error)){ echo "value='{$_POST['discount']}'"; } ?>>
  </div>
   <div class="form-group">
    <label for="period">Months/Years</label>
    <input type="number" class="form-control" id="period" name="period" <?php if(isset($_POST['period']) and isset($error)){ echo "value='{$_POST['period']}'"; } ?>>
  </div>
     <div class="form-group">
    <label for="period_type">Period Type</label>
    <select type="text" class="form-control" id="period_type" name="period_type" >
<option <?php if(isset($_POST['period_type']) and $_POST['period_type']=="Monthly"){ echo " selected "; } ?>>Monthly</option>
<option <?php if(isset($_POST['period_type']) and $_POST['period_type']=="Annual"){ echo " selected "; } ?>>Annual</option>

    </select>
  </div>
  <div class="form-group">
    <label for="total_individual">Total Individual</label>
    <input type="number" class="form-control" id="total_individual" name="total_individual" <?php if(isset($_POST['total_individual']) and isset($error)){ echo "value='{$_POST['total_individual']}'"; } ?>>
  </div>
      <div class="form-group">
    <label for="total_business_entity">Total Individual</label>
    <input type="number" class="form-control" id="total_business_entity" name="total_business_entity" <?php if(isset($_POST['total_business_entity']) and isset($error)){ echo "value='{$_POST['total_business_entity']}'"; } ?>>
  </div>
    <div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="form-control" id="description" name="description"><?php if(isset($_POST['description']) and isset($error)){ echo $_POST['description']; } ?></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
    </div>
  </div>
</div></form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Add Plans') }}
<button class="btn btn-primary btn-sm float-end" data-toggle="modal" data-target="#addnew" id="add_new_button">Add New</button>
                </div>

                <div class="card-body" style="width:100%;overflow: auto;">
                  @if(count($plans)>0)
<table class="table table-bordered table-stripe">
 <thead> <tr>
<th>Name</th>
<th>Price</th>
<th>Discount</th>
<th>Period</th>
<th>Period Type</th>
<th>Add</th>
<th>Edit</th>
<th>Delete</th>
  </tr></thead>
  <tbody>
    @foreach($plans as $get2)
<tr>
  <td>{{$get2->name}}</td>
  <td>{{$get2->discounted_price}}</td>
  <td>{{$get2->discount}}</td>
  <td>{{$get2->period}}</td>
  <td>{{$get2->period_type}}</td>
  <td><button    class="btn btn-success btn-sm"  data-toggle="modal" data-target="#add_features_{{$get2->id}}" id="add_features_{{$get2->id}}_btn">Add</button>
<!-- Modal -->
<div class="modal fade" id="add_features_{{$get2->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Features In {{$get2->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="post" action="{{url('admin/plans/add_features')}}">
  @csrf
<div class="row">
  <input type="hidden" name="plans_id" value="{{$get2->id}}">
                <div class="form-group col-sm-3">
    <label for="icon">Icon</label>
    <input type="text" class="form-control" id="icon" name="icon" placeholder="Use: bx bx icon">
  </div>
              <div class="form-group col-sm-6">
    <label for="features_name">Name</label>
    <input type="text" class="form-control" id="features_name" name="name" >
  </div>
<div class="col-sm-3"><br>
<input type="submit" name="save_fetures" class="btn btn-primary" value="save">
</div>
</div></form>
<hr>
<?php
$plans_id=$get2->id;
 $PansFeatures= App\Models\PansFeatures::where('plans_id',$get2->id)->get();;
 if(count($PansFeatures)>0){
  ?>
  <div class="table-responsive">
<table class="table table-bordered table-stripe">
  <thead>
  <tr><th>Icon</th><th>Name</th><th>Delete</th></tr></thead>
  <tbody>
  <?php
  foreach($PansFeatures as $PansFeatures2){
    ?>
<tr><td><i class="{{$PansFeatures2->icon}}"><br>{{$PansFeatures2->icon}}</i></td><td>{{$PansFeatures2->name}}</td><td><a href="plans/delete_feature?id={{$PansFeatures2->id}}&plans_id={{$plans_id}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a></td></tr>
    <?php
  }
  ?></tbody>
</table></div>
  <?php
 }
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>
  </td>
  <td><a href="{{url('admin/plans/edit/'.$get2->id)}}" class="btn btn-info btn-sm">Edit</a></td>
  <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
</tr>

    @endforeach
  </tbody>

  

</table>
                  @endif   
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
@if(isset($_GET['plans_id']))
<script>
  document.getElementById("add_features_{{$_GET['plans_id']}}_btn").click();
</script>
@endif
@if(isset($error))
<script>
  document.getElementById('add_new_button').click();
</script>
@endif
@endsection
@endsection
