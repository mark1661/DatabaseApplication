@extends('layouts.master')
@section('content')
<h1>Delete Actor</h1>
<hr>
<div class="jumbotron">
  <div class="jumbotron" style="background-color: maroon; color: white">
    <ul>
      <li><b>First Name: </b>{{$actor->first_name}}</li>
      <br>
      <li><b>Last Name: </b>{{$actor->last_name}}</li>
    </ul>
  </div>
  <a href="/actor/remove/{{$actor->id}}" class="btn btn-danger">Confirm Delete</a>
  <a href="/actor/index" class="btn btn-warning">Cancel</a>
</div>
@endsection
