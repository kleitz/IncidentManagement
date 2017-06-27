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
			<span class="error">
		      <?php echo $errors->first('name', '* :message'); ?>
		   	</span>
			<label>Name :</label>
			<input type="text" name="name" value="{{$incident_type->name}}">

		</div>

		<div>
			<span class="error">
	          <?php echo $errors->first('description', '* :message'); ?>
	    	</span>
			<label>Description :</label>
			<textarea name="description" placeholder="Description">{{$incident_type->description}}</textarea>

		</div>

		<div class="select">
			<span class="error">
	          <?php echo $errors->first('form_id', '* :message'); ?>
	    	</span>
			<label>Select Form :</label>
			<select class="cstm-select" name="form_id">
				@foreach($forms as $form)
				<option value="{{$form->id}}"
				@if($form->id === $incident_type->form_id)
				selected
				@endif
				>{{$form->name}}</option>
				@endforeach
			</select>
			<i class="fa fa-chevron-down"></i>
		</div>

		<div>
			<!-- <h3 class="title">Assign WorkStream to Incident Type</h3> -->

		</div>

		<div class="select">
			<span class="error">
	          <?php echo $errors->first('workstream_id', '* :message'); ?>
	    	</span>
			<label>Select Workstream :</label>
			<select class="cstm-select" name="workstream_id">
				@foreach($workstreams as $workstream)
				<option value="{{$workstream->id}}"
				@if($workstream->id === $incident_type->form_id)
				selected
				@endif
				>{{$workstream->name}}</option>
				@endforeach
			</select>
			<i class="fa fa-chevron-down"></i>
		</div>

	<button type="submit" class="primary">Save</button>
</form>
</div>
@endsection

@section('customScripts')
<script type="text/javascript">
 $(function(){
  $('.datatable').dataTable({
    "paging":false,
    "info" : false
  });
 });
 </script>
 <script type="text/javascript">
   function toggleButton(elem)
   {
     if($(elem).hasClass('active'))
     {
      var input = $(elem).find('input')[0];
          $(input).removeAttr('checked');
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
@stop
