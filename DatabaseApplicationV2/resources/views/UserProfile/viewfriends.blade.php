@extends('layouts.master')
@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h1>Friends<h1>
<hr/>
<div class="container">
  <div class="jumbotron">
    <!-- Follow this div element to add a friend into the list -->
    @foreach($userprofiles as $userprofile)
    <div class="row" id="friend-list">
      @if(empty($userprofile->file_path))
      <img src="http://selectoinc.com/images/image_not_available.png" alt="stack photo" class="img" height="150" width="120">
      @else
      <img src='{{ Storage::url($userprofile->file_path) }}' alt="profile pic" class="img" height="150" width="150">
      @endif
        <div class="col-sm-8" id="friend-list-information">
          <ul>
            <li style="list-style-type: none" id="userfriendname">{{$userprofile->username}}</li>
            <a href="/viewuserprofile/{{$userprofile->user_id}}" class="btn btn-primary" style="margin-right: 15px">View Profile</a>
            <a href="/deleteFromList/{{\App\Http\Controllers\RelationshipController::getId($userprofile->user_id)}}" class="btn btn-primary" style="margin-right: 15px">Delete</a>
            <br/>
          </ul>
        </div>
    </div>
    <hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0;padding: 0">
  @endforeach
</div>
  <!-- End of comment -->
</div>
@endsection
