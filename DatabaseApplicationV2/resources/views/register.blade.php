@extends('layouts.app')

@section('content')
<h1>Register</h1>
<p>Make your account here!</p>
<hr>
  {!! Form::open(['url' => 'register/createAccount']) !!}
  <div class="form-group">
    {{Form::label('username', 'Username')}}
    {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Enter Name'])}}
  </div>
  <div class="form-group">
    {{Form::label('email', 'E-Mail Address')}}
    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email'])}}
  </div>
  <div class="form-group">
    {{Form::label('password', 'Password')}}
    {{Form::password('password', ['class' => 'form-control'])}}
  </div>
  <div>
    {{Form::submit('Create account', ['class' => 'btn btn-primary'])}}
  </div>
  {!! Form::close() !!}
@endsection
