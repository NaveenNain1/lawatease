@extends('layouts.adminapp')

@section('content')
@section('title')
PlansStructure
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin::PlansStructure') }}</div>

                <div class="card-body">
                     @if(count($plans)>0 and count($PlansParticular)>0)
<form method="post">
	@csrf
<table class="table table-bordered table-stripe">
	<thead>
		<tr>
<th rowspan="2" style="vertical-align: top">Particular</th><th colspan="2000" style="text-align: center">
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
<input type="number" class="form-control" name="data['{{$plans2->id}}_{{$PlansParticular2->id}}']" value="0" onclick="this.select();">
</td>
@endforeach
		</tr>
		@endforeach
		<tr><td><button class="btn btn-primary btn-sm" type="submit">Save</button></td></tr>
	</tbody>
</table></form>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
