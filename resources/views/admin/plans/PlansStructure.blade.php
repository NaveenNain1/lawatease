@extends('layouts.adminapp')

@section('content')
@section('title')
PlansStructure
@endsection
@if(isset($saved) || isset($_GET['s']))
<div class="alert alert-success">
Success! data has been saved successfully.</div>
@endif
<?php $data_saved=[]; ?>
@if(count($plans_structure)>0)
@foreach($plans_structure as $plans_structure2)
<?php $data_saved[$plans_structure2->plans_id.'_'.$plans_structure2->plans_particulars_id ]=$plans_structure2->qty; ?>
@endforeach
@endif
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin::PlansStructure') }}</div>

                <div class="card-body">
                     @if(count($plans)>0 and count($PlansParticular)>0)
<form method="post">
	@csrf
	<div class="table-responsive">
<p style="color:red">Note: You can put it zero if not want to give service (Plan wise)</p>
<table class="table table-bordered table-stripe">
	<thead>
		<tr>
<th rowspan="2" style="vertical-align: top"><br>Particular</th><th colspan="{{count($plans)}}" style="text-align: center">
Plans
</th>
		</tr>
		<tr>
@foreach($plans as $plans2)
<th>{{$plans2->name}}</th>
@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($PlansParticular as $PlansParticular2)
<tr><th>{{$PlansParticular2->name}}</th>
@foreach($plans as $plans2)
<td>
<input type="number" class="form-control" name="data[{{$plans2->id}}_{{$PlansParticular2->id}}]" value="<?php
if(isset($data_saved[$plans2->id.'_'.$PlansParticular2->id])){
	echo $data_saved[$plans2->id.'_'.$PlansParticular2->id];
}else{
	echo "0";
}
?>" onclick="this.select();" required>
</td>
@endforeach
		</tr>
		@endforeach
		<tr><td><button class="btn btn-primary btn-sm" type="submit">Save</button></td></tr>
	</tbody>
</table></div></form>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
