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
<style media="screen">
	.form-inline{
		display:-webkit-inline-box;
	}
	.inline-select{
		margin-right: 2em;
		width:60%;
	}
	.inline-submit{
		margin-left:1.2em;
		margin-top:1.7em;
		width:60%;
	}
</style>
<div class="">
<form class="form-inline" action="{{url('incident/status/'.$incident->id)}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="inline-select">
		<label for="status_id">Status</label>
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
	<div class="inline-submit">
		<input type="submit" value="save">
	</div>
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
		 <table>
			 <tbody>
				 @foreach($inputs as $value)
				 <tr>
				 	<td>{{$value->label}}</td>
					<td>
						@if(isset($value->value))
						{{$value->value}}
						@else
						false
						@endif
					</td>
				 </tr>
				 @endforeach
			 </tbody>
		 </table>
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
