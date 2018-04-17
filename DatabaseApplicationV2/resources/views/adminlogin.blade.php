@extends('layouts.master')

@section('content')
  <h1>Log In (Admin)</h1>
  <div class="panel-heading">
    <h3 class="panel-title">Please log in with your username and password</h3>
  </div>
  <hr>
  {!! Form::open(['url' => 'admin/login/submit']) !!}
  <div class="form-group">
    {{Form::label('username', 'Username:')}}
    {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Enter Username'])}}
  </div>
  <div class="form-group">
    {{Form::label('password', 'Password:')}}
    {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter Password'))}}
  </div>
  <div>
    {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
@endsection
