@extends('layouts.master')
@section('content')
<h1>Actor Information</h1>
<hr/>
<div class="jumbotron">
  <ul>
    <li><b>First Name: </b>{{$actor->first_name}}</li>
    <br/>
    <li><b>Last Name: </b>{{$actor->last_name}}</li>
  </ul>
  <hr/>
  <a class="btn btn-primary" href="/actor/index">< Back to list</a>
</div>
@endsection
