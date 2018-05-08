@extends('layouts.master')
@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(Auth::user()->user_id == $userprofile->user_profile_id)
<h1>Your Profile</h1>
@else
<h1>Profile</h1>
@endif
<hr>
            <div class="container">
                <div class="jumbotron">
                  <div class="row">
                      <div class="col-md-3 col-xs-12 col-sm-6 col-lg-3">
                        <div class="thumbnail text-center photo_view_postion_b" >
                          @if(empty($userprofile->file_path))
                          <img src="http://selectoinc.com/images/image_not_available.png" alt="stack photo" class="img" height="150" width="120">
                          @else
                          <img src='{{ Storage::url($userprofile->file_path)}}' alt="profile pic" class="img" style="width: 100%; height: auto">
                          @endif
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-12 col-sm-6 col-lg-9">
                          <div style="border-bottom: 1px solid black">
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

                                      @endif
                                      @if(\App\Http\Controllers\RelationshipController::getRelationship($userprofile->user_profile_id) === 'FRIEND')
                                        <button id="unfriend" class="btn btn-danger">Unfriend</button>
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
                                          @endif
                                    @endif

                                  </div>
                    </div>
                    <div class="form-group"  style="border-bottom:1px solid black">
                        <h2>Comments</h2>
                    </div>
                    <div class="form-group row">
                      <a href="/createComment/{{$userprofile->user_profile_id}}" class="btn btn-success" style="margin-left: 15px">Add a new Comment!</a>
                    </div>
                    @isset($user_comments)
                    @foreach($user_comments as $user_comment)
                    <div class="form-group row" style="margin-left: 4px; margin-right: 4px">
                      <a href="/viewuserprofile/{{$user_comment->user_id}}">{{\App\Http\Controllers\UserController::getUserName($user_comment->user_id)}}:</a>
                      <textarea readonly class="form-control" rows="5" id="comment" style="margin-bottom: 10px; resize: none">{{$user_comment->comment_string}}</textarea>
                      @if(Auth::user()->user_id == $user_comment->user_id)
                      <a href="/editComment/{{$user_comment->user_profile_comment_id}}" class="btn btn-info" style="margin-right: 5px">Edit Comment</a>
                      <form method="POST" action="/deleteComment/{{$user_comment->user_profile_comment_id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

                      @endif
                    </div>
                    @endforeach
                    @endisset
                    @endif


                </div>
            </div>
@endsection
