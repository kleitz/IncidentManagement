@extends('app')
@section('content')
<div class="container">
	<center><h2>Create IncidentManagement</h2></center>
	<form class="form-group" method="post" action="{{ url(Request::url()) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label class="col-md-4 control-label">Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
				</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Description</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="description" value="{{ old('description') }}">
				</div>
		</div>
	<button type="submit" class="btn btn-primary" style="margin-left: 500px;">Submit</button>
	</form>
</div>
@endsection