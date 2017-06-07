@extends('app')
@section('content')
<center>
  <h3>{{$incident->name}}</h3>
  <p>{{$incident->description}}</p>
</center>
@endsection
