@extends('layouts.master')
@section('content')
<h1>Are you sure you want to delete this clip?</h1>
<div class="jumbotron">
  <table class="table">
    <tbody>
      <tr>
        <td style="background-color: navy; color: white">Movie name: </td>
        <td style="background-color: white">{{$clip->movie->name}}</td>
      </tr>
      <tr>
        <td style="background-color: navy; color: white">User: </td>
        <td style="background-color: white">{{$clip->user->username}}</td>
      </tr>
    </tbody>
  </table>
  <form method="POST" action="{{$clip->id}}">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary">Delete</button>
  </form>
  <hr/>
  <a class="btn btn-primary" href="/movies/detail/{{$clip->movie->id}}">< Back</a>
</div>
@endsection
