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
      <h1>Incident Types</h1>
    </div>
    @if(Auth::user()->hasUrlAccess('incident/create'))
	   <a href="{{url('incident/type/create')}}"><button type="button" class="primary">Create Incident Type</button></a>
     @endif
</div>
	<table class="table striped datatable">
    <thead>
        <tr>
             <th>Name</th>
             <th>Description</th>
             <th>Forms</th>
             <th>WorkStreams</th>
             <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach($incident_types as $incident_type)
         <tr>
             <td>{{ $incident_type->name }}</td>
             <td>{{ $incident_type->description}}</td>
             <td>
               {{$incident_type->form->name}}
             </td>
             <td>
               <ul>
               @foreach($incident_type->workstreams as $workstream)
                 <li>{{$workstream->name}}</li>
               @endforeach
               </ul>
             </td>
             <td class="actions">
                <a href="{{url('incident/type/view',$incident_type->id)}}">
                    <button type="button" class="dark"><i class="fa fa-eye"></i></button>
                </a>
                <a href="{{url('incident/type/edit',$incident_type->id)}}">
                    <button type="button" class="dull"><i class="fa fa-pencil"></i></button>
                </a>
                <a href="{{url('incident/type/delete',$incident_type->id)}}">
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
