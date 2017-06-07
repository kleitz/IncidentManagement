@extends('app')
@section('content')
<div class="container">
	<center><h2>Incedent Management</h2></center>
	<a href="{{url('incident/create')}}"><button class="btn btn-success pull-right">Create Task</button></a>
	<table class="table table-striped table-bordered table-hover">
    	 <thead>
     		<tr class="bg-info">         
        		 <th>Incident</th>
	        	 <th>Description</th>
	         	<th>Actions</th>         
    		 </tr>
    	 </thead>
     <tbody>  
     @foreach($incidents as $incident)
         <tr>
             <td>{{ $incident->name }}</td>
             <td>{{ $incident->description}}</td>
             <td>
            <a href="{{url('incident/view',$incident->id)}}"><button type="button">View</button></a>
        	<a href="{{url('incident/edit',$incident->id)}}"><button type="button">Edit</button></a>
       		 <a href="{{url('incident/delete',$incident->id)}}"><button type="button">delete</button></a>
             </td> 
         </tr>
     @endforeach    
     </tbody>
 </table>
</div>
@endsection