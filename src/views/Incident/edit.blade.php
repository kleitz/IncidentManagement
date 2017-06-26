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
			<span class="error">
		      <?php echo $errors->first('name', '* :message'); ?>
		   </span>
			<label>Name :</label>
			<input type="text" name="name" id="incident-name" placeholder="Name" value="{{$incident->name}}">
		</div>

		<div>
			<span class="error">
	          <?php echo $errors->first('description', '* :message'); ?>
	    	</span>
			<label>Description :</label>
			<textarea name="description" id="incident-description" placeholder="Description">{{$incident->description}}</textarea>
		</div>

		<div class="select">
			<span class="error">
	          <?php echo $errors->first('incident-priority-id', '* :message'); ?>
	    	</span>
			<label>Select Incident Priority</label>
			<select class="cstm-select" id="incident-priority-id" name="incident_priority_id">
				<option value="">Select Incident Priority</option>
				@foreach($incident_priorities as $incident_priority)
				<option value="{{$incident_priority->id}}"
					@if($incident_priority->id === $incident->priority->id)
					selected
					@endif
					>{{$incident_priority->name}}</option>
				@endforeach
			</select>
			<i class="fa fa-chevron-down"></i>
		</div>



		<div id="form-answer-div"></div>

	<button type="submit" class="primary" id="btn">Save</button>
</form>
</div>
@endsection

@section('customScripts')
<script src="/js/vendor/IncidentManagement/createincident.js" charset="utf-8"></script>
<script src="/js/vendor/IncidentManagement/editincident.js" charset="utf-8"></script>
<script type="text/javascript">
	function toggleButton(elem)
	{
		if($(elem).hasClass('active'))
		{
		 var input = $(elem).find('input')[0];
				 $(input).removeAttr('checked');
				 $(input).removeAttr('value');
					var span = $(elem).find('span');
					$(span).removeClass('on').addClass('off');
					$(span).text('Off');
		 $(elem).removeClass('active');
		}
		else
		{
			var v = elem.getAttribute('data-user-id');

				var input = $(elem).find('input')[0];
						input.setAttribute('checked',true);

				var span = $(elem).find('span');
						$(span).removeClass('off').addClass('on');
						$(span).text('On');
				$(elem).addClass('active');
		}
	}
</script>
@endsection
