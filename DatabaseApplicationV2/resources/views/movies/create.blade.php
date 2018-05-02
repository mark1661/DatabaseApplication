@extends('layouts/master')
@section('content')
<form method="POST" action="/movies/store" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="actor">Actor:</label>
    <input type="text" class="form-control" id="actor" name="actor">
  </div>
  <div class="form-group">
    <label for="release_date">Release Date:</label>
    <input type="text" class="form-control" id="release_date" name="release_date">
  </div>
  <div class="form-group">
    <label for="genre">Genre:</label>
    <input type="text" class="form-control" id="genre" name="genre">
  </div>
  <div class="form-group">
    <label for="overview">Overview</label>
    <textarea class="form-control" id="overview" rows="3" name="overview"></textarea>
  </div>
  <div class="form-group">
    <input type="file" class="form-control-file" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
