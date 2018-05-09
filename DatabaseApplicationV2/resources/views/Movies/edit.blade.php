@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
      url:'/add/actors', //the page containing php script
      type: "GET", //request type
      data: {movie_id: "{{$movie->id}}"},
      success:function(result){
        console.log(result);
        var actors=result.split(" ");
        for(i=0;i<actors.length-1;i++){
          var obj = jQuery.parseJSON(actors[i]);
          var actor_id=obj.id;
          var first_name=obj.first_name;
          var last_name=obj.last_name;
          console.log(obj);
          console.log(first_name);
          $('#addActor').append('<option value=\"'+actor_id+'\">'+first_name+' '+last_name+'</option>');
        }
        console.log(result);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
    $.ajax({
      url:'/delete/actors', //the page containing php script
      type: "GET", //request type
      data: {movie_id: "{{$movie->id}}"},
      success:function(result){
        var actors=result.split(" ");
        for(i=0;i<actors.length-1;i++){
          var obj = jQuery.parseJSON(actors[i]);
          var actor_id=obj.id;
          var first_name=obj.first_name;
          var last_name=obj.last_name;
          console.log(obj);
          console.log(first_name);
          $('#deleteActor').append('<option value=\"'+actor_id+'\">'+first_name+' '+last_name+'</option>');
        }
        console.log(result);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });
  });
</script>
<form method="POST" action="/movies/edit/{{$movie->id}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="{{$movie->name}}" value="{{$movie->name}}">
  </div>
  <div class="form-group">
    <label for="actor">Add Actors:</label>
    <select multiple class="form-control" id="addActor" name="addActors[]">
    </select>
  </div>
  <div class="form-group">
    <label for="actor">Remove Actors:</label>
    <select multiple class="form-control" id="deleteActor" name="deleteActors[]">
    </select>
  </div>
  <div class="form-group">
    <label for="release_date">Release Date:</label>
    <input type="text" class="form-control" id="release_date" name="release_date" placeholder="{{$movie->release_date}}" value="{{$movie->release_date}}">
  </div>
  <div class="form-group">
    <label for="genre">Genre:</label>
    <select id="genre" name="genre">
    </select>
    <input type="text" class="form-control" id="genre" name="genre" placeholder="{{$movie->genre}}" value="{{$movie->genre}}">
  </div>
  <div class="form-group">
    <label for="overview">Overview</label>
    <textarea class="form-control" id="overview" rows="3" name="overview">{{$movie->overview}}</textarea>
  </div>
  <div>
    <label>Posters:</label>
    @if($movie->movie_posters)
      <ul>
      @foreach($movie->movie_posters as $poster)
        <li><img class="card-img-top" width="10" height="500"src="{{ Storage::url($poster->path)}}" alt="Card image cap">
        <a href="/movies/setPoster/{{$poster->id}}">Set it to poster</a> |
        <a href="/movies/poster/{{$poster->id}}">Delete</a></li>
      @endforeach
      </ul>
    @endif
  </div>
  <div class="form-group">
    <label for="upload">Upload More Posters:</label>
    <input type="file" class="form-control-file" name="image" id="upload">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
