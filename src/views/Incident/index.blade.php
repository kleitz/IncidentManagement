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
      <h1>Incident Management</h1>
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
             <th>Incident Type</th>
             <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach($incidents as $incident)
         <tr>
             <td>{{ $incident->name }}</td>
             <td>{{ $incident->description}}</td>
             <td>{{ $incident->incidentType->name}}</td>
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
@stop
