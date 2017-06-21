@extends('base')
@section('title')
	View Incident
@stop
@section('content')
<div class="content-header">
    <div class="title">
      <h1>View Incident</h1>
    </div>
    <a href="{{url('incident')}}">
    	<button type="button" class="primary">Back</button>
    </a>
</div>
<?php 
	$inputs = json_decode($incident->formAnswer->form_answer_json);
	$inputs = $inputs->inputs;
 ?>
<div class="tile">
 <h3 class="title">{{$incident->name}}</h3>
 	<div class="tile-content">
		 <p>{{$incident->description}}</p>
		 <ul>
		 @foreach($inputs as $value)
		 	<li><span>{{$value->name}} :</span>  <b>{{$value->value}}</b></li>
		 @endforeach
		 </ul>
 	</div>
</div>
@endsection
