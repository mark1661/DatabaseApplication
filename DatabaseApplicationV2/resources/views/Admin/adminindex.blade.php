@extends('layouts.master')
@section('content')
@if(Auth::user()->status == 'ADMIN')
<h1>Welcome to the Administrator Menu!</h1>
<hr/>
<div class="jumbotron" style="background-color: teal; color: white">
  <h3>Select an option below to continue!</h3>
  <hr/>
  <ol style="list-style-type: none">
    <li style="margin-bottom: 10px"><a class="btn btn-success" href="/admin/addmovie">Add a movie to the database</a></li>
    <li style="margin-bottom: 10px"><a class="btn btn-primary" href="/support/index">Check Support Tickets</a></li>
    <li style="margin-bottom: 10px"><a class="btn btn-info" href="/actor/index">View List of Actors</a></li>
    <li style="margin-bottom: 10px"><a class="btn btn-warning" href="/admin/listOfUsers">Reset a user's password</a></li>
  </ol>
</div>
@else
<div class="jumbotron" style="background-color: red; color: white">
<h1>You entered a prohibited section!</h1>
<hr/>
<a href="/" class="btn btn-warning">CLICK HERE TO GO BACK TO HOME!!</a>
</div>
@endif
@endsection
