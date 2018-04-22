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
    @foreach($users as $user)
    <tr>


      <!-- $movie->poster?? -->
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td><a href="/viewuserprofile/{{$user->user_id}}">Show</a></td>
      <td><a href="/users/delete/{{$user->user_id}}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
