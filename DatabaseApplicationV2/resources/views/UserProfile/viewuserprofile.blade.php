@extends('layouts.master')
@section('content')
<h1>View Profile</h1>
            <div class="container">
                <div class="jumbotron">
                  <div class="row">
                      <div class="col-md-3 col-xs-12 col-sm-6 col-lg-3">
                        <div class="thumbnail text-center photo_view_postion_b" >
                          <img src="http://selectoinc.com/images/image_not_available.png" alt="stack photo" class="img" height="150" width="120">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-12 col-sm-6 col-lg-9">
                          <div class="" style="border-bottom:1px solid black">
                            <h2 id="username">{{$name}}</h2>
                          </div>
                            <hr>
                          <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item bg-info text-white">Other Information</li>
                              <li class="list-group-item bg-light"><b>First Name: </b><p style="display:inline" id="userdateofbirth">{{$userprofile->first_name}}</p></li>
                              <li class="list-group-item bg-light"><b>last Name: </b><p style="display:inline" id="useraddress">{{$userprofile->last_name}}</p></li>
                              <li class="list-group-item bg-light"><b>Gender: </b><p style="display:inline" id="usergender">{{$userprofile->gender}}</p></li>
                              <li class="list-group-item bg-light"><b>Age: </b><p style="display:inline" id="useraddress">{{$userprofile->age}}</p></li>
                              <li class="list-group-item bg-light"><b>Profile Privacy: </b><p style="display:inline" id="useraddress">{{$userprofile->profile_privacy}}</p></li>
                            </ul>
                            <br/>
                          </div>
                      </div>
                    </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          @if(Auth::check())
                          <div class="form-group"  style="border-bottom:1px solid black">
                              <h2>Options (only viewable to the user)</h2>
                          </div>
                          <p><a href="/edituserprofile/{{Auth::user()->user_id}}" class="btn btn-primary">Edit Profile</a></p>
                          <p><a href="/user/ToBeRemoved--PutIdHere/deleteuserprofile" class="btn btn-danger">Delete Profile</a></p>
                          <p><a href="/user/ToBeRemoved--PutIdHere/viewfriends" class="btn btn-success">View Friends</a></p>
                        </div>
                        @endif
                      </div>
                </div>
            </div>
@endsection
