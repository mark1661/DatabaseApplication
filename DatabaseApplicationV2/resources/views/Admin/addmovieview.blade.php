@extends('layouts.master')

@section('content')
<h1>Add Movie</h1>
<p>Add a new movie to the site!</p>
<hr>
<div class="form-group">
  {!! Form::open(['url' => 'movies/store']) !!}
  <div class="form-group">
    {{Form::label('name', 'Movie Name:')}}
    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Title'])}}
  </div>
  <div class="form-group">
    {{Form::label('release_date', 'Movie Release Date:')}}
    {{Form::date('release_date', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('genre', 'Movie Genre: ')}}
    {{Form::select('genre', ['Action' => 'Action',
                                         'Adventure' => 'Adventure',
                                         'Comedy' => 'Comedy',
                                         'Crime' => 'Crime',
                                         'Drama' => 'Drama',
                                         'Horror' => 'Horror'], null, ['class' => 'form-control', 'placeholder' => 'Choose the Movie Genre..'])}}
  </div>
  <div class="form-group">
    {{Form::label('actor', 'Movie Actors:')}}
    {{Form::text('actor', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Actors (comma separated if there is more than 1)'])}}
  </div>
  <div class="form-group">
    {{Form::label('overview', 'Plot Summary:')}}
    {{Form::textarea('overview', '', ['class' => 'form-control', 'placeholder' => 'Enter a short summary of the movie plot...'])}}
  </div>
  {{Form::submit('Add Movie', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
