@extends('base')
@section('title')
	Edit Incident Type
@stop
@section('content')
<div class="content-header">
    <div class="title">
      <h1>Edit Incident Type</h1>
    </div>
    <a href="{{url('incident/type')}}">
    	<button type="button" class="primary">Back</button>
    </a>
</div>
<form role="form" method="POST" action="{{ url(Request::url()) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<input type="text" name="name" placeholder="Name" value="{{$incident_type->name}}" required>
			<span class="error">
		      <?php echo $errors->first('name', '* :message'); ?>
		   </span>
		</div>

		<div>
			<textarea name="description" placeholder="Description" required>{{$incident_type->description}}</textarea>
			<span class="error">
	          <?php echo $errors->first('description', '* :message'); ?>
	    	</span>
		</div>

		<div>
			<h3>Assign Forms to Incident Type</h3>
			<span class="error">
						<?php echo $errors->first('form_ids', '* :message'); ?>
			</span>
		</div>

		@foreach($forms as $form)
		<div class="">
			<label for="">{{$form->name}}</label>
			<input type="checkbox" name="form_ids[]" value="{{$form->id}}"
			@if($incident_type->forms()->get()->contains($form->id))
			checked
			@endif
			>
		</div>
		@endforeach

		<div>
			<h3>Assign WorkStream to Incident Type</h3>
			<span class="error">
						<?php echo $errors->first('workstream_ids', '* :message'); ?>
			</span>
		</div>

		@foreach($workstreams as $workstream)
		<div class="">
			<label for="">{{$workstream->name}}</label>
			<input type="checkbox" name="workstream_ids[]" value="{{$workstream->id}}"
			@if($incident_type->workstreams()->get()->contains($workstream->id))
			checked
			@endif
			>
		</div>
		@endforeach

	<button type="submit" class="primary">Save</button>
</form>
</div>
@endsection
