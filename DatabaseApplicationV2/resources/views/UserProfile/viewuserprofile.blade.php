@extends('layouts.master')
@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h1>Your Profile</h1>
<hr>
            <div class="container">
                <div class="jumbotron">
                  <div class="row">
                      <div class="col-md-3 col-xs-12 col-sm-6 col-lg-3">
                        <div class="thumbnail text-center photo_view_postion_b" >
                          @if(empty($userprofile->file_path))
                          <img src="http://selectoinc.com/images/image_not_available.png" alt="stack photo" class="img" height="150" width="120">
                          @else
                          <img src='{{ Storage::url($userprofile->file_path) }}' alt="profile pic" class="img" height="150" width="150">
                          @endif
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-12 col-sm-6 col-lg-9">
                          <div class="" style="border-bottom: 1px solid black">
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
                                  <h2>Options</h2>
                              </div>
                                @if($userprofile->user_profile_id === Auth::user()->user_id)
                                  <p><a href="/edituserprofile/{{Auth::user()->user_id}}" class="btn btn-primary">Edit Profile</a></p
                                  <p><a href="/user/{{Auth::user()->user_id}}/deleteuserprofile" class="btn btn-danger">Delete Profile</a></p>
                                  <p><a href="/getFriends" class="btn btn-success">View Friends</a></p>
                                @endif
                                    <!-- crap, check with lin for the post method of this button -->
                                    @if($userprofile->user_profile_id !== Auth::user()->user_id)
                                        @if(\App\Http\Controllers\RelationshipController::getRelationship($userprofile->user_profile_id) != 'FRIEND')
                                            <button id="addFriend" class="btn btn-primary">Add as Friend</button>
                                              <script type="text/javascript">
                                                $('#addFriend').click(function(){
                                                    $.ajaxSetup({
                                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                                                        });
                                                    $.ajax({
                                                        url:'/addFriend', //the page containing php script
                                                        type: "POST", //request type
                                                        data: {other_user_id: "{{$userprofile->user_profile_id}}"},
                                                        success:function(result){
                                                          $("#addFriend").attr("disabled", true);
                                                          window.location.href = "/success/{{$userprofile->user_profile_id}}";
                                                          //alert(result);
                                                          },
                                                          error: function(jqXHR, textStatus, errorThrown) {
                                                            console.log(JSON.stringify(jqXHR));
                                                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                            }
                                                          });
                                                        });
                                              </script>
                        </div>
                                      @endif
                                      @if(\App\Http\Controllers\RelationshipController::getRelationship($userprofile->user_profile_id) === 'FRIEND')
                                        <button id="unfriend" class="btn btn-primary">Unfriend</button>
                                          <script type="text/javascript">
                                          $(document).on('click','#unfriend', function(){
                                            $.ajaxSetup({
                                              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                                            });
                                            $.ajax({
                                              url:'/unfriend', //the page containing php script
                                              type: "POST", //request type
                                              data: {other_user_id: "{{$userprofile->user_profile_id}}", user_id: "{{Auth::user()->user_id}}"},
                                              success:function(result){
                                                window.location.href = "/successDelete/{{$userprofile->user_profile_id}}";
                                              },
                                              error: function(jqXHR, textStatus, errorThrown) {
                                                  console.log(JSON.stringify(jqXHR));
                                                  console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                              }
                                            });
                                          });
                                          </script>
                    </div>
                                        @endif
                                  @endif
                                @endif
                </div>
            </div>
@endsection
