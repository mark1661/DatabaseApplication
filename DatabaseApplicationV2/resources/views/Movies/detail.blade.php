@extends('layouts.master')
@section('content')
<h1>{{$movie->name}}</h1>
<hr/>
<br/>
<div class="jumbotron">
  <table class="table">
    <tbody>
      <tr>
        <td style="background-color: navy; color: white">Movie poster: </td>
        <td style="background-color: white" id="movieposter">{{$movie->poster}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie Plot: </td>
        <td style="background-color: white" id="movieoverview">{{$movie->overview}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie release date: </td>
        <td style="background-color: white" id="moviereleasedate">{{$movie->release_date}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie Genre: </td>
        <td style="background-color: white" id="moviegenre">{{$movie->genre}}</td>
      </tr>
    </tbody>
  </table>
  <hr/>
  <a class="btn btn-primary" href="/movies">< Back</a>
</div>
@endsection
