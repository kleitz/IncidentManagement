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
<div class="">
<form class="" action="{{url('incident/status/'.$incident->id)}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="">
		<select  name="status_id">
			@foreach($statuses as $status)
			<option value="{{$status->id}}"
				@if($status->id === $incident->status_id)
				selected
				@endif
				>{{$status->name}}</option>
			@endforeach
		</select>
		<span class="error">
				<?php echo $errors->first('status_id', '* :message'); ?>
		 </span>
	</div>
	<input type="submit" value="save">
</form>
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
		 	<li>
				<span>{{$value->name}} :</span>
				<b>
					@if(isset($value->value))
					{{$value->value}}
					@else
					false
					@endif
				</b>
			</li>
		 @endforeach
		 </ul>
 	</div>
</div>
<br>
<h4>Incident Logs</h4>
<ul>
	@foreach($incident->logs as $log)
	<li>{{$log->updatedBy->firstname}} {{$log->updatedBy->lastname}} {{$log->action}} {{$log->created_at->diffForHumans()}} </li>
	@endforeach
</ul>
@endsection
