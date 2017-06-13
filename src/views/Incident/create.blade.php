@extends('base')
@section('title')
	Create Incident
@stop
@section('content')
<div class="content-header">
    <div class="title">
      <h1>Create Incident</h1>
    </div>
    <a href="{{url('incident')}}"><button type="button" class="primary">Back</button></a>
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

		<div>
			<select class="" name="incident_type_id">
				<option value="">--select---</option>
				@foreach($incident_types as $incident_type)
				<option value="{{$incident_type->id}}">{{$incident_type->name}}</option>
				@endforeach
			</select>
		</div>

	<button type="submit" class="primary">Create</button>
	</form>
</div>
@endsection
