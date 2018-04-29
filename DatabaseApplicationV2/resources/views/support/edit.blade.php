@extends('layouts.master')
@section('content')
<h1>Edit Ticket</h1>
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
  {!! Form::open(['url' => '/support/update/' .$ticket->id]) !!}
  <div class="form-group">
    {{Form::label('status', 'Status: ')}}
    {{Form::select('status', ['OPEN' => 'OPEN',
                              'IN PROGRESS' => 'IN PROGRESS',
                              'CLOSED' => 'CLOSED'], null, ['class' => 'form-control', 'placeholder' => 'Choose the progress of this ticket..'])}}
  </div>
  {{Form::submit('Apply Changes', ['class' => 'btn btn-warning'])}}
  {!! Form::close() !!}
</div>
@endsection
