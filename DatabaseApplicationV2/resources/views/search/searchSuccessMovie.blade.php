@extends('layouts.master')
@section('content')
<h1>Search Results</h1>
<hr/>
<div class="jumbotron" style="background-color: lime; color: white">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Poster</th>
        <th scope="col">Name</th>
        <th scope="col">Release Date</th>
        <th scope="col" colspan="3">Options</th>
      <tr/>
  </thead>
  <tbody>
  @foreach($searchResults as $result)
  <tr style="background-color: white; color: black">
      @if($result->poster)
    <td>
      <img class="card-img-top" width="100" height="100"src="{{ Storage::url($result->poster->path)}}" alt="Card image cap">
    </td>
    @else
    <td width="100">
      <img class="card-img-top" height="90" src="http://selectoinc.com/images/image_not_available.png" alt="Card image cap">
    </td>
    @endif
    <td>{{$result->name}}</td>
    <td>{{$result->release_date}}</td>
    <td><a href="/movies/detail/{{$result->id}}" class="btn btn-primary">View</a></td>
    @if(Auth::check() == true)
      @if(Auth::user()->status == 'ADMIN')
      <td><a href="/movies/show/{{$result->id}}" class="btn btn-info">Edit</a></td>
      <td><a href="/movies/delete/{{$result->id}}" class="btn btn-danger">Delete</a></td>
      @endif
    @endif
  </tr>
  @endforeach
</tbody>
  </table>
</div>
<a class="btn btn-primary" href="/">< Back to home</a>
@endsection
