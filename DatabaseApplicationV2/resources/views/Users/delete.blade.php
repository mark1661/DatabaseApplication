@extends('layouts/master')
@section('content')
<h1>Confirm Delete</h1>
<hr/>
<div class="jumbotron" style="background-color: maroon; color: white">
    <h3>Information</h3>
    <br>
    <ul style="list-style-type: none">
      <li><b>Username: </b>{{$user->username}}</li>
      <li><b>Email: </b>{{$user->email}}</li>
      @if($user->status == NULL)
        <li><b>Status: </b>User</li>
      @else
        <li><b>Status: </b>{{$user->status}}</li>
      @endif
    </ul>
    <hr/>
    <hr/>
    <h3>Other Information</h3>
    <br>
    @if(isset($userProfile))
    <ul style="list-style-type: none">
      <li>
        @if(empty($userprofile->file_path))
        <img src="http://selectoinc.com/images/image_not_available.png" alt="stack photo" class="img" height="150" width="120">
        @else
        <img src='{{ Storage::url($userprofile->file_path) }}' alt="profile pic" class="img" height="150" width="150">
        @endif
      </li>
      <br>
      <li><b>First Name: </b>{{$userProfile->first_name}}</li>
      <li><b>Last Name: </b>{{$userProfile->last_name}}</li>
      <li><b>Age: </b>{{$userProfile->age}}</li>
      <li><b>Location: </b>{{$userProfile->location}}</li>
      <li><b>Gender: </b>{{$userProfile->gender}}</li>
      <li><b>Profile Privacy: </b>{{$userProfile->profile_privacy}}</li>
    </ul>
    <hr/>
    <hr/>
    @endif
    <div class="form-group">
      {!! Form::open(['url' => '/delete/' . $user->user_id]) !!}
      <div class="form-group">
        {{Form::label('userpassword', 'Enter your password to delete your profile')}}
        {{Form::password('userpassword', array('class' => 'form-control', 'placeholder' => 'Enter your password'))}}
      </div>
      {{Form::submit('Delete your Profile', ['class' => 'btn btn-danger'])}}
      {!! Form::close() !!}
    </div>
</div>
  @endsection
