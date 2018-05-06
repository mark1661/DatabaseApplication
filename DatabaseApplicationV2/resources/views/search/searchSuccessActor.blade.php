@extends('layouts.master')
@section('content')
<h1>Search Results</h1>
<hr/>
<div class="jumbotron" style="background-color: lime; color: white">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
      @if(Auth::check() == true && Auth::user()->status == 'ADMIN')
        <th scope="col">Options</th>
      @endif
      <tr/>
  </thead>
  <tbody>
  @foreach($searchResults as $result)
  <tr style="background-color: white; color: black">
    <td>{{$result->first_name}}</td>
    <td>{{$result->last_name}}</td>
    @if(Auth::check() == true)
      @if(Auth::user()->status == 'ADMIN')
      <td><a href="/actor/edit/{{$result->id}}" class="btn btn-info">Edit</a>
          <a href="/actor/delete/{{$result->id}}" class="btn btn-danger">Delete</a>
      </td>
      @endif
    @endif
  </tr>
  @endforeach
</tbody>
  </table>
</div>
<a class="btn btn-primary" href="/">< Back to home</a>
@endsection
