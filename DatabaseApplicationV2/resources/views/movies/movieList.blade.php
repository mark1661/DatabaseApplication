@extends('layouts.master')
@section('content')
  @if(Session::has('item'))
  <ul>
    @foreach(Session::get('item') as $key=>$item)
      <li>{{$item->name}}</li>
      <a href="/list/delete/{{$key}}">Delete</a>
    @endforeach
  </ul>
  @endif
  <button><a href="/list/clear">Clear the list</a></button>

@endsection
