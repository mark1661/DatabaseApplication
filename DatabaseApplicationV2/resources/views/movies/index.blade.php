@extends('layouts/master')
@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Poster</th>
      <th scope="col">Name</th>
      <th scope="col">asdsa</th>
      <th scope="col">Release Date</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $movie)
    <tr>



      <!-- $movie->poster?? -->
      <td><img class="card-img-top" src="{{ Storage::url($movie->poster) }}" alt="Card image cap"></td>
      <td>{{$movie->name}}</td>
      <td>{{$movie->name}}</td>
      <td>{{$movie->name}}</td>
      <td><a href="movies/show/{{$movie->id}}">Edit</a></td>
      <td><a href="movies/delete/{{$movie->id}}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
