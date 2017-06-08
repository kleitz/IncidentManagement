@extends('base')
@section('title')
	Edit Incident
@stop
@section('content')
<div class="content-header">
    <div class="title">
      <h1>Edit Incident</h1>
    </div>
    <a href="{{url('incident')}}">
    	<button type="button" class="primary">Back</button>
    </a>
</div>
<form role="form" method="POST" action="{{ url(Request::url()) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<input type="text" name="name" placeholder="Name" value="{{$incident->name}}" required>
			<span class="error">
		      <?php echo $errors->first('name', '* :message'); ?>
		   </span>
		</div>

		<div>
			<textarea name="description" placeholder="Description" required>{{$incident->description}}</textarea>
			<span class="error">
	          <?php echo $errors->first('description', '* :message'); ?>
	    	</span>
		</div>
	<button type="submit" class="primary">Save</button>
</form>
</div>
@endsection
