@extends('layouts/master')
@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $movie)
    <tr>
      <td>{{$movie->name}}</td>
      <a href="/edit">Edit</a>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
