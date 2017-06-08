@extends('base')
@section('title')
	View Incident
@stop
@section('content')
<div class="content-header">
    <div class="title">
      <h1>View Incident</h1>
    </div>
    <a href="{{url('incident')}}">
    	<button type="button" class="primary">Back</button>
    </a>
</div>
<table class="striped two-col bordered">
	<tr>
		<td>Name : </td>
		<td>{{$incident->name}}</td>
	</tr>
	<tr>
		<td>Description:</td>
		<td>{{$incident->description}}</td>
	</tr>
</table>
@endsection
