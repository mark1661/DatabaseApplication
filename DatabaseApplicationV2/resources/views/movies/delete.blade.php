@extends('layouts/master')
@section('content')
<form method="post" action="{{$movie->id}}">
{{ csrf_field() }}
<ul class="list-group">
  <h2>Delete:</h2>
  <li class="list-group-item">{{$movie->name}}</li>
  <li class="list-group-item"><button type="submit" class="btn btn-danger">Delete</button></li>
</ul>
</form>
@endsection
