@extends('layouts.customerpanel')

@section('content')
@section('title')
Customer Panel
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div style="text-align:center">
                    <img src="{{url('vertical/imgs/logo.png')}}" style="width:400px"><br>
 <b>Welcome to Law At EaseTM Family </b><br>
 <h2>“Leave Your Legal Worries On Us & Achieve Your Personal and Business Goals”</h2>
 </div>
 Naveen
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
