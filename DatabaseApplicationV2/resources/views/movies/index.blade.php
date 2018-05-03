@extends('layouts/master')
@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Poster</th>
      <th scope="col">Name</th>
      <th scope="col">Release Date</th>
      <th scope="col" colspan="3">Options</th>
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $movie)
    <tr>
      <td>
        @if($movie->movie_poster)
        <img class="card-img-top" width="100" height="100"src="{{ Storage::url($movie->movie_poster->path)}}" alt="Card image cap">
      @endif</td>
      <td>{{$movie->name}}</td>
      <td>{{$movie->release_date}}</td>
      <td><a href="/movies/detail/{{$movie->id}}" class="btn btn-primary">View</a></td>
      @if(Auth::check() == true)
        @if(Auth::user()->status == 'ADMIN')
        <td><a href="/movies/show/{{$movie->id}}" class="btn btn-info">Edit</a></td>
        <td><a href="/movies/delete/{{$movie->id}}" class="btn btn-danger">Delete</a></td>
        @endif
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
