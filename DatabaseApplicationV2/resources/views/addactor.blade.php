@extends('layouts.master')

@section('content')
<h1>Add an Actor</h1>
<p>Add an actor to the site! (admins only)</p>
<hr/>
<div class="form-group">
  {!! Form::open(['url' => 'admin/submitactor', 'files' => true]) !!}
    <div class="form-group">
      {{Form::label('actorfirstname', 'Actor\'s First Name')}}
      {{Form::text('actorfirstname', '', [ 'class' => 'form-control', 'placeholder' => 'Enter The Actor\'s First Name: ' ])}}
    </div>
    <div class="form-group">
      {{Form::label('actorlastname', 'Actor\'s Last Name')}}
      {{Form::text('actorlastname', '', ['class' => 'form-control', 'placeholder' => 'Enter the Actor\'s Last Name: '])}}
    </div>
    <div class="form-group">
      {{Form::label('actorpicture', 'Actor\'s Picture: ')}}
      {{Form::file('actorpicture', ['accept' => '.jpg, .png'])}}
    </div>
    {{Form::submit('Add this actor into the database', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
