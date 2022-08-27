@extends('layouts.adminapp')

@section('content')
@section('title')
Editing Plans
@endsection
@if(isset($saved) || isset($_GET['s']))
<div class="alert alert-success">
Success! data has been saved successfully.</div>
@endif
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editing Plans') }}
                  <a href="../" class="btn btn-primary btn-sm float-end">Back</a>
                 </div>

                <div class="card-body" style="width:100%;overflow: auto;">
                   @if(count($plans)>0)
                  
 
    @foreach($plans as $get2)
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
        <form method="post">
          @csrf
         <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" 
<?php if(isset($_POST['name']) and isset($error)){
  echo "value='".$_POST['name']."'";
} ?>
     value="{{$get2->name}}">
  </div>
    <div class="form-group">
    <label for="discounted_price">Price (Including Discount)</label>
    <input type="number" class="form-control" id="discounted_price" 
<?php if(isset($_POST['discounted_price']) and isset($error)){
  echo "value='".$_POST['discounted_price']."'";
} ?>
     name="discounted_price" value="{{$get2->discounted_price}}">
  </div>
  <div class="form-group">
    <label for="discount">Amt without Discount</label>
    <input type="text" class="form-control" id="discount" name="discount" 
<?php if(isset($_POST['discount']) and isset($error)){
  echo "value='".$_POST['discount']."'";
} ?>
     value="{{$get2->discount}}">
  </div>
   <div class="form-group">
    <label for="period">Months/Years</label>
    <input type="number" class="form-control" id="period" name="period" 
<?php if(isset($_POST['period']) and isset($error)){
  echo "value='".$_POST['period']."'";
} ?>
     value="{{$get2->period}}">
  </div>
     <div class="form-group">
    <label for="period_type">Period Type</label>
    <select type="text" class="form-control" id="period_type" name="period_type" 

       >
   <?php if(isset($_POST['period_type']) and isset($error)){
  echo "<option>".$_POST['period_type']."</option>";
}else{
  echo "<option>".$get2->period_type."</option>";


} ?>
<option>Monthly</option>
<option >Annual</option>

    </select>
  </div>
    <div class="form-group">
    <label for="total_individual">Total Individual</label>
    <input type="number" class="form-control" id="total_individual" name="total_individual" 
<?php if(isset($_POST['total_individual']) and isset($error)){
  echo "value='".$_POST['total_individual']."'";
} ?>
     value="{{$get2->total_individual}}">
  </div>
    <div class="form-group">
    <label for="total_business_entity">Total Business Entity</label>
    <input type="number" class="form-control" id="total_business_entity" name="total_business_entity" 
<?php if(isset($_POST['total_business_entity']) and isset($error)){
  echo "value='".$_POST['total_business_entity']."'";
} ?>
     value="{{$get2->total_business_entity}}">
  </div>
    <div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="form-control" id="description" name="description" 

      ><?php if(isset($_POST['description']) and isset($error)){
  echo $_POST['description'];
}else{
echo $get2->description;
} ?></textarea>
  </div>
  <input type="submit" class="btn btn-primary btn-sm" value="SAVE">
</form>
    @endforeach
   
                  @endif   
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
