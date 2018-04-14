@extends('layouts.master')

@section('content')
<h1>Add Movie</h1>
<p>Add a new movie to the site! (Only  Admins)</p>
<hr>
<div class="form-group">
  {!! Form::open(['url' => 'admin/submitmovie', 'files' => true]) !!}
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
    {{Form::text('movieproducer', '', ['class' => 'form-control', 'placeholder' => 'Who are the producers of this movie? (comma separated if there is more than 1)'])}}
  </div>
  <div class="form-group">
    {{Form::label('moviestudio', 'Movie Studio: ')}}
    {{Form::text('moviestudio', '', ['class' => 'form-control', 'placeholder' => 'Enter a movie studio'])}}
  </div>
  <div class="form-group">
    {{Form::label('moviedescription', 'Movie Description: ')}}
    {{Form::textarea('moviedescription', '', ['class' => 'form-control' , 'placeholder' => 'Enter a plot summary'])}}
  </div>
  <div class="form-group">
    {{Form::label('movielength', 'Movie length')}}
    {{Form::text('movielength', '', ['class' => 'form-control', 'placeholder' => 'Enter the movie\'s length'])}}
  </div>
  <div class="form-group">
    {{Form::label('moviegenre', 'Movie Genre: ')}}
    {{Form::select('moviegenre', ['Action' => 'Action',
                                  'Adventure' => 'Adventure',
                                  'Comedy' => 'Comedy',
                                  'Crime' => 'Crime',
                                  'Drama' => 'Drama',
                                  'Historical' => 'Historical',
                                  'Horror' => 'Horror',
                                  'Musical' => 'Musical',
                                  'Science Fiction' => 'Science Fiction',
                                  'War' => 'War',
                                  'Western' => 'Western'], null, array('class' => 'form-control', 'placeholder' => 'Select a movie genre..'))}}
 </div>
 {{Form::submit('Add This Movie to the database', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
