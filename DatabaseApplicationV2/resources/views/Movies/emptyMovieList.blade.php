@extends('layouts.master')
@section('content')
<h1>{{Auth::user()->username}}'s Movie List</h1>
<hr/>
<div class="jumbotron" style="background-color: maroon; color: white">
  <h2>Empty Movie List!</h2>
  <hr/>
  <a href="/" class="btn btn-primary">< Back to home</a>
</div>
@endsection
