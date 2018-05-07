@extends('layouts.master')
@section('content')
<h1>Error!</h1>
<hr/>
<div class="jumbotron" style="background-color: maroon; color: white">
  <h2>You have tried to view a profile that has been set to private!</h2>
  <hr/>
  <a class="btn btn-primary" href="/">Click here to go back to home!</a>
</div>
@endsection
