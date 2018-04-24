@extends('layouts.master')
@section('content')
<h1>Delete Ticket</h1>
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
  <h4>Are you sure?</h4>
  <hr/>
  <p><a style="margin-right: 25px" href="/support/deleteToPost/{{$ticket->id}}" class="btn btn-success">Yes</a>
     <a class="btn btn-danger" href="/support/index">No</a>
  </p>
</div>
@endsection
