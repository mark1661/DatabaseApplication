@extends('layouts.master')
@section('content')
@if(Auth::user()->status == 'ADMIN')
    <h1>Add Movie</h1>
    <p>Add a new movie to the site!</p>
    <hr/>
    <div class="form-group">
      {!! Form::open(['url' => 'movies/store', 'files' => 'true']) !!}
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
        {{Form::label('overview', 'Plot Summary:')}}
        {{Form::textarea('overview', '', ['class' => 'form-control', 'placeholder' => 'Enter a short summary of the movie plot...'])}}
      </div>
      <div class="form-group">
        <label for="overview">Add A Default Poster</label>
        <input type="file" class="form-control-file" name="image">
      </div>
      {{Form::submit('Add Movie', ['class' => 'btn btn-primary'])}}
      {!! Form::close() !!}
    </div>
@else
<div class="jumbotron" style="background-color: red; color: white">
<h1>You entered a prohibited section!</h1>
<hr/>
<a href="/" class="btn btn-warning">CLICK HERE TO GO BACK TO HOME!!</a>
</div>
@endif
@endsection
