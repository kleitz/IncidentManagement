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
<div class="form-elems" id="forms-div">
	<form role="form" id="createIncident-id" method="POST" action="{{ url(Request::url()) }}">
		<input type="hidden" id="incident-token" name="_token" value="{{ csrf_token() }}">
			<div>
				<label>Name :</label>
				<input type="text" id="incident-name" name="name" value="{{old('name')}}" required>
			    <span class="error">
			          <?php echo $errors->first('name', '* :message'); ?>
			    </span>
			</div>

			<div>
				<!-- <input type="textarea" id="incident-description" placeholder="Description" name="description" value="{{old('textarea')}}" required style="height: 200px"> -->
				<label>Description :</label>
				<textarea id="incident-description" name="description" value="{{old('textarea')}}" required></textarea>
			    <span class="error">
			          <?php echo $errors->first('description', '* :message'); ?>
			    </span>
			</div>

			<div class="select">
				<label>Select Incident Type :</label>
				<select class="cstm-select" id="incident-type-id" name="incident_type_id" onchange="createForm(this.value)" required>
					<!-- <option value="">Select Incident Type</option> -->
					<option></option>
					@foreach($incident_types as $incident_type)
					<option value="{{$incident_type->id}}">{{$incident_type->name}}</option>
					@endforeach
				</select>
				<i class="fa fa-chevron-down"></i>
			</div>

			<div class="select">
				<label>Select Incident Priority :</label>
				<select class="cstm-select" id="incident-priority-id" name="priority_id" required>
					<!-- <option value="">Select Incident Priority</option> -->
					<option></option>
					@foreach($incident_priorities as $incident_priority)
					<option value="{{$incident_priority->id}}">{{$incident_priority->name}}</option>
					@endforeach
				</select>
				<i class="fa fa-chevron-down"></i>
			</div>

			<div id = "incident-type-form"></div>

		<button type="submit" class="primary">Create Incident</button>
		</form>
	</div>
</div>

<input type="hidden" id="data" value="{{$incident_type_json}}">
@endsection

@section('customScripts')
<script src="/js/vendor/IncidentManagement/createincident.js" charset="utf-8"></script>
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
						input.value = v;

				var span = $(elem).find('span');
						$(span).removeClass('off').addClass('on');
						$(span).text('On');
				$(elem).addClass('active');
		}
	}
</script>
@endsection
