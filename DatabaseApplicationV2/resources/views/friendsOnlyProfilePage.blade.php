@extends('layouts.master')
@section('content')
<h1>Error!</h1>
<hr/>
<div class="jumbotron" style="background-color: maroon; color: white">
  <h2>You have tried to view a profile that only friends can view!</h2>
  <hr/>
  <a class="btn btn-primary" href="/">Click here to go back to home!</a>
</div>
@endsection
