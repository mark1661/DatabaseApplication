@extends('layouts.master')
@section('content')
<h1>Add an Actor</h1>
<hr>
<div class="jumbotron">
  {!!Form::open(['url' => '/actor/store'])!!}
  <div class="form-group">
    {{Form::label('first_name', 'First Name:')}}
    {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'Enter the first name of the actor'])}}
  </div>
  <div class="form-group">
    {{Form::label('last_name', 'Last Name:')}}
    {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Enter the last name of the actor'])}}
  </div>
  {{Form::submit('Add Actor', ['class' => 'btn btn-success'])}}
  {!!Form::close() !!}
</div>
@endsection
