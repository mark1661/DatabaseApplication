@extends('layouts.master')
@section('content')
<h1>Search Results</h1>
<hr/>
<div class="jumbotron" style="background-color: lime; color: white">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Username</th>
        <th scope="col">email</th>
        <th scope="col" colspan="3">Options</th>
      <tr/>
  </thead>
  <tbody>
      @foreach($searchResults as $result)
      <tr style="background-color: white; color: black">
        <td>{{$result->username}}</td>
        <td>{{$result->email}}</td>
        <td><a href="/viewuserprofile/{{$result->user_id}}" class="btn btn-primary">View</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<a class="btn btn-primary" href="/">< Back to home</a>
@endsection
