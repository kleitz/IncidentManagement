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

		<div class="toggles" style="margin-top:0;">
		<span class="error">
						<?php echo $errors->first('workstream_ids', '* :message'); ?>
		</span>
		<label>WorkStream to be selected :</label>
		@foreach($workstreams as $workstream)
			<div class="item">
				<label>{{$workstream->name}}</label>
				@if($incident_type->workstreams()->get()->contains($workstream->id))
				<div class="toggle-bar active" onclick="toggleButton(this)">
					<input type="checkbox" name="workstream_ids[]" value="{{$workstream->id}}" checked>
					<span class="on">ON</span>
				</div>
				@else
				<div class="toggle-bar" onclick="toggleButton(this)">
					<input type="checkbox" name="workstream_ids[]" value="{{$workstream->id}}">
					<span class="off">Off</span>
				</div>
				@endif
			</div>
		@endforeach
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
