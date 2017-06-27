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
			<span class="error">
		          <?php echo $errors->first('name', '* :message'); ?>
		    </span>
			<label>Name :</label>
			<input type="text" name="name" value="{{old('name')}}">
		</div>

		<div>
			<!-- <input type="textarea" placeholder="Description" name="description" value="{{old('textarea')}}" required style="height: 200px"> -->
			<span class="error">
		          <?php echo $errors->first('description', '* :message'); ?>
		    </span>
			<label>Description :</label>
			<textarea name="description" value="{{old('textarea')}}"></textarea>
		</div>

		<div class="select">
			<span class="error">
		          <?php echo $errors->first('form_id', '* :message'); ?>
		  </span>
			<label>Select Form :</label>
			<select  name="form_id" class="cstm-select">
				<option value="">Select Form</option>
				@foreach($forms as $form)
				<option value="{{$form->id}}">{{$form->name}}</option>
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
			<label>Select WorkStream :</label>
			<select  name="workstream_id" class="cstm-select">
				<option value="">Select WorkStream</option>
				@foreach($workstreams as $workstream)
				<option value="{{$workstream->id}}">{{$workstream->name}}</option>
				@endforeach
			</select>
			<i class="fa fa-chevron-down"></i>
		</div>

	<button type="submit" class="primary">Create</button>
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
