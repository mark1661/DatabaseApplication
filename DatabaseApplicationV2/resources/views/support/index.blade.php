@extends('layouts.master')
@section('content')
<h1>Support Tickets List</h1>
<hr/>
<div class="jumbotron">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Message</th>
      <th scope="col">User</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="3" style="text-align: center">Options</th>
    </tr>
  </thead>
  <tbody style="background-color: white">
    @foreach($tickets as $ticket)
    <tr>
      <td>{{$ticket->message}}</td>
      <td>{{\App\Http\Controllers\UserController::getUsername($ticket->user_id)}}</td>
      <td>{{$ticket->status}}</td>
      <td style="padding-right: 1px"><a href="/support/show/{{$ticket->id}}" class="btn btn-primary">View</a></td>
      <td style="padding-right: 1px"><a href="/support/edit/{{$ticket->id}}" class="btn btn-warning">Edit</a></td>
      <td><a href="/support/delete/{{$ticket->id}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
