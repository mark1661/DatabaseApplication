@extends('layouts.master')
@section('content')
<h1>Error with deleting your profile!</h1>
<hr>
<div class="jumbotron" style="background-color: maroon; color: white">
  <h2>You Entered a invalid password!</h2>
  <hr>
  <hr>
  <a class="btn btn-danger" href="/user/{{$user->user_id}}/deleteuserprofile">Click here to delete your profile again</a>
  <a class="btn btn-success" href="/">Click here to go to the main page</a>
</div>
@endsection
