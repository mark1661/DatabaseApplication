@extends('layouts.master')
@section('content')
<h1>Editing Actor: {{$actor->first_name}}, {{$actor->last_name}}</h1>
<hr>
<div class="jumbotron">
  {!! Form::open(['url' => '/actor/update/' . $actor->id]) !!}
  <div class="form-group">
    {{Form::label('first_name', 'First Name:')}}
    {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => ''. $actor->first_name])}}
  </div>
  <div class="form-group">
    {{Form::label('last_name', 'Last Name:')}}
    {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => ''. $actor->last_name])}}
  </div>
  {{Form::submit('Edit Actor', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
