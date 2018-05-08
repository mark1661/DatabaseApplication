@extends('layouts.master')
@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if($movie->movie_poster != null)
<h1 style="color: white">{{$movie->name}}</h1>
@else
<h1>{{$movie->name}}</h1>
@endif
<hr/>
@if(Auth::check() == true)
<script type="text/javascript">
$(document).on('click','#like',function(){
  $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
  $.ajax({
    url:'/like', //the page containing php script
    type: "POST", //request type
    data: {movie_id: "{{$movie->id}}", user_id: "{{Auth::user()->user_id}}"},
    success:function(result){
      $('#like').html('Unlike');
      $('#like').attr('id','unlike');
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
  });
});
$(document).on('click','#unlike', function(){
  $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
  $.ajax({
    url:'/unlike', //the page containing php script
    type: "POST", //request type
    data: {movie_id: "{{$movie->id}}", user_id: "{{Auth::user()->user_id}}"},
    success:function(result){
      $('#unlike').html('Like '+ {{count($movie->likes)}});
      $('#unlike').attr('id','like');
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
  });
});
</script>
@endif
<br/>
<div class="jumbotron">
  <table class="table" onload="">
    <tbody>
      <tr>
        <td style="background-color: navy; color: white; width: 15%; height: auto">Movie poster: </td>
        @if($movie->movie_poster != null)
        <td style="background-color: white; width: 20%; height: auto" id="movieposter"><img class="card-img-top" id="imgElement" src="{{ Storage::url($movie->movie_poster->path)}}" alt="Card image cap"></td>
        @else
        <td style="background-color: white; width: 20%; height: auto" id="movieposter"><img class="card-img-top" id="imgElement" src="https://vignette.wikia.nocookie.net/pandorahearts/images/a/ad/Not_available.jpg/revision/latest?cb=20141028171337" alt="Card image cap"></td>
        @endif
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie Plot: </td>
        <td style="background-color: white" id="movieoverview">{{$movie->overview}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie Actors: </td>
        <td style="background-color: white">
            {{\App\Http\Controllers\ActorController::getActorName($movie->id)}}
        </td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie release date: </td>
        <td style="background-color: white" id="moviereleasedate">{{$movie->release_date}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie Genre: </td>
        <td style="background-color: white" id="moviegenre">{{$movie->genre}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">Movie Trailer: </td>
        <td style="background-color: white" id="moviereleasedate">
            @if(isset($movie->movie_clip))
              <video style="width: 90%; height: auto" controls autoplay>
              <source src="{{Storage::url($movie->movie_clip->path)}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            @endif
        </td>
      @if(isset($reviewsWithAverageScore))
      <tr>
        <td style="background-color: navy; color: white">Average Score by Users: </td>
        @if($reviewsWithAverageScore->score != NULL)
        <td style="background-color: white" id="moviegenre">{{$reviewsWithAverageScore->score}} / 100</td>
        @else
        <td style="background-color: white" id="moviegenre">No rating yet</td>
        @endif
      </tr>
      @endif
      </tr>
        @if(Auth::check()==true)
          @if(Auth::user()->status == 'ADMIN')
            <tr>
              <td style="background-color: navy; color: white">Manage Movie Clips: </td>
              <td style="background-color: white" id="Movie_clip">
                <ul>
                  @foreach($movie->movie_clips as $movie_clip)
                    <li>
                      Belongs to: {{ $movie_clip->user->username }}
                      <br>
                      <video width="320" height="240" controls>
                        <source src="{{Storage::url($movie->movie_clip->path)}}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                      <br>
                      <a href="/movies/setTrailer/{{$movie_clip->id}}">Set it to trailer</a> |
                      <a href="/movies/clip/{{$movie_clip->id}}">Delete</a>
                    </li>
                  @endforeach
                </ul>
              </td>
            </tr>
          @endif
        @endif
    </tbody>
  </table>
  @if(isset($reviews))
  @foreach($reviews as $review)
  <div class="form-group">
    <a href="/viewuserprofile/{{$review->user_id}}">{{\App\Http\Controllers\UserController::getUserName($review->user_id)}}:</a>
    <textarea readonly class="form-control" rows="5" id="comment" style="margin-bottom: 10px">{{$review->review_content}}</textarea>
    @if(Auth::user()->user_id == $review->user_id)
    <label>The User has Rated: {{$review->score}}</label>
    <br>
    <a href="/editReview/{{$review->review_id}}" class="btn btn-info">Edit Review</a>
    <a href="/deleteReview/{{$review->review_id}}" class="btn btn-danger">Delete Review</a>
    @endif
  </div>
  @endforeach
  @endif
  <hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0;padding: 0">
  @if(Auth::check() == true)
  <a class="btn btn-info" href="/createReview/{{$movie->id}}">Add a new review!</a>
  @endif
    @if(Auth::check() == true)
    <hr/>
    <form method="POST" action="/movies/detail/{{$movie->id}}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="upload">Upload movie clips:</label>
      <input type="file" class="form-control-file" name="clip" id="upload">
      <button type="submit" class="btn btn-primary" style="margin-top: 5px; margin-left: 580px">Submit</button>
    </div>
    </form>
    <hr/>
    @endif
    @if(Auth::check()==true)
      <!-- Add to my list -->
      <?php
        $found=false;
        if (Session::has('item')) {
          $items = Session::get('item');
          foreach ($items as $item) {
            if ($item->id==$movie->id) {
              $found=true;
            }
          }
          if ($found==true) {
            echo "<a class='btn btn-warning disabled'>Movie is already in your list!</a>";
          }
          else{
            echo "<a class='btn btn-primary' href=\"/list/add/$movie->id\">Add this movie to my list!</a>";
          }
        }
        else {
          echo "<a class='btn btn-primary' href=\"/list/add/$movie->id\">Add this movie to my list!</a>";
        }
       ?>

      @if($movie->likes->isEmpty())
        <button id="like" class="btn btn-success">Like {{count($movie->likes)}}</button>
      @else
        @foreach($movie->likes as $like)
        @if(($like->user_id)!=Auth::user()->user_id)
          <button id="like" class="btn btn-success">Like {{count($movie->likes)}}</button>
          @break
        @else
          <button id="unlike" class="btn btn-danger">Unlike</button>
        @endif
        @endforeach
      @endif
    @endif
  <hr/>
  <a class="btn btn-primary" href="/movies">< Back</a>
</div>
<script>
var srcOfPoster = document.getElementById("imgElement").src;
document.getElementById("container").style.backgroundImage = "url(\"" + srcOfPoster + "\")";
document.getElementById("container").style.backgroundRepeat = "no-repeat";
document.getElementById("container").style.backgroundSize = "cover";
</script>
@endsection
