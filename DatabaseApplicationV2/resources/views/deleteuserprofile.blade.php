@extends('layouts.master')
@section('content')
<h1>Delete Profile</h1>
<hr/>
<div class="jumbotron">
  <h2 class="list-group-item active bg-secondary">Profile Contents</h2>
  <hr/>
  <ul>
    <li id="username">Username goes here</li>
    <br>
    <li id="useremail">Email goes here </li>
    <br>
    <li>
      <p id="userLastName" style="display: inline">Last Name goes here,</p>
      <p id="userFirstName" style="display: inline">First Name goes here</p>
    </li>
    <br>
    <li id="userDateOfBirth">Date of Birth</li>
  </ul>
</div>
<div class="jumbotron">
  <h3>Are you sure?</h3>
  <hr/>
  <a href="/" class="btn btn-success">Yes</a>
  <a href="/user/{id}/viewuserprofile" class="btn btn-danger">No</a>
</div>
@endsection
