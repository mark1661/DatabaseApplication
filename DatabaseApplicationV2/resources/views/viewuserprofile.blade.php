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
                            <h2 id="username">username goes here</h2>
                          </div>
                            <hr>
                          <div class="col-md-8">
                          <ul class=" details">
                            <li><p id="userfirstname"><span class="glyphicon glyphicon-earphone one"></span>First Name goes here</p></li>
                            <li><p id="userlastname"><span class="glyphicon glyphicon-envelope one"></span>Last Name goes here</p></li>
                            <li><p id="usermaritalstatus"><span class="glyphicon glyphicon-map-marker one"></span>Marital Status goes here</p></li>
                            <li><p id="useremail"><span class="glyphicon glyphicon-credit-card one"></span>Email goes here</p></li>
                          </ul>
                          </div>
                          <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item bg-info text-white">Other Information</li>
                              <li class="list-group-item bg-light"><b>Birthday: </b><p style="display:inline" id="userdateofbirth">Date of birth goes here</p></li>
                              <li class="list-group-item bg-light"><b>Address: </b><p style="display:inline" id="useraddress">Address goes here</p></li>
                              <li class="list-group-item bg-light"><b>Gender: </b><p style="display:inline" id="usergender">Gender goes here</p></li>
                              <li class="list-group-item bg-light"><b>Profile Privacy: </b><p style="display:inline" id="useraddress">Profile Privacy goes here</p></li>
                            </ul>
                            <br/>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item bg-secondary text-white">Options</li>
                              <li class="list-group-item"><a href="/" class="btn btn-primary">View Movie List</a></li>
                              <li class="list-group-item"><a href="/" class="btn btn-primary">View Favorite Movie Clips</a></li>
                              <li class="list-group-item"><a href="/" class="btn btn-primary">View User Likes</a></li>
                              <li class="list-group-item"><a href="/" class="btn btn-primary">View Favorite Movie Clips</a></li>
                              <li class="list-group-item"><a href="/" class="btn btn-primary">View User Reviews</a></li>
                            </ul>
                          </div>
                      </div>
                    </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <div class="form-group"  style="border-bottom:1px solid black">
                              <h2>Options (only viewable to the user)</h2>
                          </div>
                          <p><a href="/user/ToBeRemoved--PutIdHere/edituserprofile" class="btn btn-primary">Edit Profile</a></p>
                          <p><a href="/user/ToBeRemoved--PutIdHere/deleteuserprofile" class="btn btn-danger">Delete Profile</a></p>
                          <p><a href="/user/ToBeRemoved--PutIdHere/viewfriends" class="btn btn-success">View Friends</a></p>
                        </div>
                      </div>
                </div>
            </div>
@endsection
