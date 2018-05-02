@extends('layouts/master')
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
        var actors=result.split(" ");
        for(i=0;i<actors.length-1;i++){
          var obj = jQuery.parseJSON(actors[i]);
          var actor_id=obj.id;
          var first_name=obj.first_name;
          var last_name=obj.last_name;
          console.log(obj);
          console.log(first_name);
          $('#actorList').append('<option value=\"'+actor_id+'\">'+first_name+' '+last_name+'</option>');
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
    <label for="actor">Actor:</label>
    <select multiple class="form-control" id="actorList" name="actors[]">
    </select>
  </div>
  <div class="form-group">
    <label for="release_date">Release Date:</label>
    <input type="text" class="form-control" id="release_date" name="release_date" placeholder="{{$movie->release_date}}" value="{{$movie->release_date}}">
  </div>
  <div class="form-group">
    <label for="genre">Genre:</label>
    <input type="text" class="form-control" id="genre" name="genre" placeholder="{{$movie->genre}}" value="{{$movie->genre}}">
  </div>
  <div class="form-group">
    <label for="overview">Overview</label>
    <textarea class="form-control" id="overview" rows="3" name="overview">{{$movie->overview}}</textarea>
  </div>
  <div class="form-group">
    <label>Posters:</label>
    @if($movie->movie_poster)
      <ul>
        <li><img class="card-img-top" width="100" height="100"src="{{ Storage::url($movie->movie_poster->path)}}" alt="Card image cap"></li>
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
