@extends('layouts.advocatepanel')

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
                 
 <h2><b>Welcome to Law At EaseTM Family </b></h2> 
 <center><b><u>Core Values</u></b>	</center>
 <img src="{{url('image/image1.png')}}">
  
 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
