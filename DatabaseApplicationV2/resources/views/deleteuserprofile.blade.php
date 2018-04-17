@extends('layouts.master')
@section('content')
<h1>Delete Profile</h1>
<hr/>
<div class="jumbotron">

</div>
<div class="jumbotron">
  <h3>Are you sure?</h3>
  <hr/>
  <a href="/" class="btn btn-success">Yes</a>
  <a href="/user/{id}/viewuserprofile" class="btn btn-danger">No</a>
</div>
@endsection
