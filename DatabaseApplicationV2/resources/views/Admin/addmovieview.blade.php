@extends('layouts.master')

@section('content')
<h1>Add Movie</h1>
<p>Add a new movie to the site!</p>
<hr>
<div class="form-group">
  {!! Form::open(['url' => 'admin/addmoviesubmit', 'files' => true]) !!}
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
    {{Form::label('moviedescription', 'Plot Summary:')}}
    {{Form::textarea('moviedescription', '', ['class' => 'form-control', 'placeholder' => 'Enter a short summary of the movie plot...'])}}
  </div>
  <div class="form-group">
    {{Form::label('movielength','Movie Length: ')}}
    {{Form::text('movielength', '', ['class' => 'form-control', 'placeholder' => 'Enter the runtime following this format: (HH:MM:SS)'])}}
  </div>
  <div class="form-group">
    {{Form::label('movielength','Movie Length: ')}}
    {{Form::text('movielength', '', ['class' => 'form-control', 'placeholder' => 'Enter the runtime following this format: (HH:MM:SS)'])}}
  </div>
  <div class="form-group">
    {{Form::label('moviestudio', 'Movie Studio: ')}}
    {{Form::text('moviestudio', '', ['class' => 'form-control'])}}
  </div>
  {!! Form::close() !!}
</div>
@endsection
