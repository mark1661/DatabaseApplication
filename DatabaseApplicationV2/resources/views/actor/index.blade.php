@extends('layouts.master')
@section('content')
<h1>List of Actors</h1>
<hr>
<div class="jumbotron">
  <a class="btn btn-success" href="/actor/create" style="margin-bottom: 10px">Add an actor</a>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody style="background-color: white">
      @foreach($actors as $actor)
      <tr>
        <td>{{$actor->first_name}}</td>
        <td>{{$actor->last_name}}</td>
        <td>
          <a class="btn btn-info" href="/actor/edit/{{$actor->id}}">Edit</a>
          <a class="btn btn-danger" href="/actor/delete/{{$actor->id}}">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
