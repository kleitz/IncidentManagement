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
<input type="hidden" id="form-answer-json" value="{{$incident->formAnswer->form_answer_json}}">
<form role="form" method="POST" id="edit-incident-form" action="{{ url(Request::url()) }}">
	<input type="hidden" name="_token" id="incident-token" value="{{ csrf_token() }}">
		<div>
			<input type="text" name="name" id="incident-name" placeholder="Name" value="{{$incident->name}}" required>
			<span class="error">
		      <?php echo $errors->first('name', '* :message'); ?>
		   </span>
		</div>

		<div>
			<textarea name="description" id="incident-description" placeholder="Description" required>{{$incident->description}}</textarea>
			<span class="error">
	          <?php echo $errors->first('description', '* :message'); ?>
	    </span>
		</div>

		<div id="form-answer-div"></div>

	<button type="submit" class="primary">Save</button>
</form>
</div>
@endsection

@section('customScripts')
<script src="/js/vendor/IncidentManagement/createincident.js" charset="utf-8"></script>
<script src="/js/vendor/IncidentManagement/editincident.js" charset="utf-8"></script>
@endsection
