@extends('layouts.master')

@section('content')
<h1>Add Movie</h1>
<p>Add a new movie to the site!</p>
<hr>
<div class="form-group">
  {!! Form::open(['url' => 'admin/submitMovie', 'files' => true]) !!}
  <div class="form-group">
    {{Form::label('moviename', 'Movie Name:')}}
    {{Form::text('moviename', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Title'])}}
  </div>
  <div class="form-group">
    {{Form::label('moviereleasedate', 'Movie Release Date:')}}
    {{Form::date('moviereleasedate', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('moviedirector', 'Movie Name:')}}
    {{Form::text('moviedirector', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Director'])}}
  </div>
  <div class="form-group">
    {{Form::label('movieposter', 'Movie Poster:')}}
    {{Form::file('movieposter', ['accept' => '.jpg, .png'])}}
  </div>
  <div class="form-group">
    {{Form::label('movieactors', 'Movie Actors:')}}
    {{Form::text('movieactors', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Actors (comma separated if there is more than 1)'])}}
  </div>
  <div class="form-group">
    {{Form::label('movieproducer', 'Movie Producer')}}

  </div>
  {!! Form::close() !!}
</div>
@endsection
