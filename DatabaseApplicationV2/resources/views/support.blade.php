@extends('layouts.master')

@section('content')
<h1>Support</h1>
<p>Got any issues? Report them here and our adminstrators can help you!</p>
<hr>
  {!! Form::open(['url' => 'support/submit']) !!}
  <div class="form-group">
    {{Form::label('message', 'Message')}}
    {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter Message'])}}
  </div>
  <div>
    {{Form::submit('Submit Support Ticket', ['class' => 'btn btn-primary'])}}
  </div>
  {!! Form::close() !!}
@endsection
