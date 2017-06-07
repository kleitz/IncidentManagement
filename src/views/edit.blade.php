@extends('app')
@section('content')
<div class="container">
	<center><h2>Edit Incident</h2></center>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form class="form-horizontal" role="form" method="post" action="{{ url(Request::url()) }}">	
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="form-group">
				<label class="col-md-4 control-label">Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ $incident->name }}">
					</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Description</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="description" value="{{ $incident->description }}">
					</div>
			</div>
	<button type="submit" class="btn btn-primary" style="margin-left: 500px;">Submit</button>
</form>	
</div>
@endsection