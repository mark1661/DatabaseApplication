@extends('layouts.master')
@section('content')
<h1>Friends<h1>
<hr/>
<div class="container">
  <!-- Follow this div element to add a friend into the list -->
  <div class="row" id="friend-list-profile-picture">
      <div class="col-sm-4">
        <img src="http://selectoinc.com/images/image_not_available.png"  id="userprofilepicture" width="200"/>
      </div>
      <div class="col-sm-8" id="friend-list">
        <ul>
          <li style="list-style-type: none" id="userfriendname">Username goes here</li>
          <li style="list-style-type: none">
          <br/>
            <div class="row">
              <a href="/user/{id}/viewuserprofile" class="btn btn-primary" style="margin-right: 15px">View Profile</a>
              <a href="/user/{id}/deletefriend" class="btn btn-danger" style="margin-right: 15px">Delete Friend</a>
            </div>
          </li>
        </ul>
      </div>
  </div>
  <!-- End of comment -->
</div>
@endsection
