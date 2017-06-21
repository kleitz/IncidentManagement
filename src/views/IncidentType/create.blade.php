@extends('base')
@section('title')
	Create Incident Type
@stop
@section('content')
<div class="content-header">
    <div class="title">
      <h1>Create Incident Type</h1>
    </div>
    <a href="{{url('incident/type')}}"><button type="button" class="primary">Back</button></a>
</div>
<form role="form" method="POST" action="{{ url(Request::url()) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<input type="text" placeholder="Name" name="name" value="{{old('name')}}" required>
		    <span class="error">
		          <?php echo $errors->first('name', '* :message'); ?>
		    </span>
		</div>

		<div>
			<input type="textarea" placeholder="Description" name="description" value="{{old('textarea')}}" required style="height: 200px">
		    <span class="error">
		          <?php echo $errors->first('description', '* :message'); ?>
		    </span>
		</div>

		<div class="">
			<select  name="form_id">
				<option value="">--Select Form--</option>
				@foreach($forms as $form)
				<option value="{{$form->id}}">{{$form->name}}</option>
				@endforeach
			</select>
		</div>

		<div>
			<h3>Assign WorkStream to Incident Type :</h3>
			<span class="error">
						<?php echo $errors->first('workstream_ids', '* :message'); ?>
			</span>
		</div>

		@foreach($workstreams as $workstream)
		<!-- <div class="">
			<label for="">{{$workstream->name}}</label>
			<input type="checkbox" name="workstream_ids[]" value="{{$workstream->id}}">
		</div> -->
		<table class="striped datatable">
			<tbody>
			<tr>
				<td><label class="checkbox">{{$workstream->name}}
						<input name="" data-field="input" data-type="checkbox" type="checkbox" onclick="toggleCheckbox(this)" style="position: absolute; right: 0; top: 0;">
						<i class="fa fa-check" style="position: absolute; right: 6px; top: 0;"></i>
						<!-- <span>Checkbox</span> -->
				</label></td>
			</tr>
			</tbody>
		</table>
		@endforeach

	<button type="submit" class="primary">Create</button>
	</form>
</div>
@endsection
