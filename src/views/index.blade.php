@extends('base')
@section('title')
    Time App - Incident Management
@endsection
@section('styleSheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="content-header">
	<div class="title">
      <h1>List Of Tasks</h1>
    </div>
    @if(Auth::user()->hasUrlAccess('incident/create'))
	   <a href="{{url('incident/create')}}"><button type="button" class="primary">Create Incident</button></a>
     @endif
</div>
	<table class="table striped datatable">
    <thead>
        <tr>
             <th>Name</th>
             <th>Description</th>
             <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach($incidents as $incident)
         <tr>
             <td>{{ $incident->name }}</td>
             <td>{{ $incident->description}}</td>
             <td class="actions">
                <a href="{{url('incident/view',$incident->id)}}">
                    <button type="button" class="dark"><i class="fa fa-eye"></i></button>
                </a>
                <a href="{{url('incident/edit',$incident->id)}}">
                    <button type="button" class="dull"><i class="fa fa-pencil"></i></button>
                </a>
                <a href="{{url('incident/delete',$incident->id)}}">
                    <button type="button" class="dark"><i class="fa fa-trash"></i></button>
                </a>
             </td>
         </tr>
     @endforeach
     </tbody>
 </table>
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
@stop
