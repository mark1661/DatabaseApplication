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
        @if(Auth::check()==true)
          @if(Auth::user()->status == 'ADMIN')
            <tr>
              <td style="background-color: navy; color: white">Movie Clips: </td>
              <td style="background-color: white" id="Movie_clip">
                <ul>
                  @foreach($movie->movie_clips as $movie_clip)
                    <li>{{ $movie_clip->file_name }}
                    Belongs to: {{ $movie_clip->user->username }}
                    <a href="/movies/setTrailer/{{$movie_clip->id}}">Set it to trailer</a>
                    <a href="/movies/clip/{{$movie_clip->id}}">Delete</a>
                  </li>
                  @endforeach
                </ul>
              </td>
            </tr>
          @endif
        @endif
      </tr>
    </tbody>
  </table>
  <form method="POST" action="/movies/detail/{{$movie->id}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="upload">Upload movie clips:</label>
      <input type="file" class="form-control-file" name="clip" id="upload">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <hr/>
  <a class="btn btn-primary" href="/movies">< Back</a>
</div>
@endsection
