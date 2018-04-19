@extends('layouts.master')
@section('content')
<h1>Welcome to the Administrator Menu!</h1>
<hr/>
<div class="jumbotron" style="background-color: teal; color: white">
  <h3>Select an option below to continue!</h3>
  <hr/>
  <ol style="list-style-type: none">
    <li style="margin-bottom: 10px"><a class="btn btn-success" href="/admin/addmovie">Add a movie to the database</a></li>
    <li style="margin-bottom: 10px"><a class="btn btn-danger">Delete a user's comment</a></li>
    <li style="margin-bottom: 10px"><a class="btn btn-primary" href="/admin/supportindex">Check Support Tickets</a></li>
    <li style="margin-bottom: 10px"><a class="btn btn-warning">Recover a user's password</a></li>
  </ol>
</div>
@endsection
