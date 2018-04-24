@extends('layouts.master')
@section('content')
<h1>View Support Ticket Details</h1>
<hr/>
<div class="jumbotron">
  <p><b>Ticket Submitted by:</b> {{\App\Http\Controllers\UserController::getUsername($ticket->user_id)}}</p>
  <p><b>User ID: </b>{{$ticket->user_id}}</p>
  <p><b>Ticket Submit Date: </b>
     {{$ticket->created_at}}
   </p>
  <p><b>Message: </b></p>
  <textarea readonly rows="15" cols="70" style="resize: none">
    {{$ticket->message}}
  </textarea>
</div>
<div class="jumbotron">
  <a href="/support/index" class="btn btn-primary">< Go Back To Ticket List</a>
</div>
@endsection
