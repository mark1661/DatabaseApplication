@extends('layouts.master')
@section('content')
<h1>{{Auth::user()->username}}'s Movie List</h1>
<hr/>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Genre</th>
      <th scope="col">Release Date</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody style="background-color: grey; color: white">
    @if(Session::get('item')!=NULL)
      @foreach(Session::get('item') as $key=>$item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->genre}}</td>
        <td>{{$item->release_date}}</td>
        <td><a class="btn btn-info" href="/movies/detail/{{$item->id}}" style="margin-right: 5px">View</a><a class="btn btn-danger" href="/list/delete/{{$key}}">Delete</a></td>
      </tr>
      @endforeach
    @endif
  </tbody>
</table>
  <a class="btn btn-primary" href="/">< Back to home</a>
  <a class="btn btn-danger" href="/list/clear">Clear the list</a>
@endsection
