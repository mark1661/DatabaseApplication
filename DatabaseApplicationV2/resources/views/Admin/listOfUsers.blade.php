@extends('layouts.master')
@section('content')
<h1>List of Users</h1>
<hr>
<div class="jumbotron">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Username</th>
        <th>E-mail</th>
        <th>Status</th>
        <th>Account Creation Date</th>
        <th colspan="2">Options</th>
      </tr>
    </thead>
    <tbody style="background-color: white">
      @foreach($users as $user)
      <tr>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        @if($user->status == NULL)
        <td>User</td>
        @elseif($user->status == 'ADMIN')
        <td>Admin</td>
        @endif
        <td>{{$user->created_at}}</td>
        <td><a class="btn btn-success" href="/admin/sendEmail/{{$user->user_id}}" style="margin-bottom: 10px">Send Email</a>
        @if(Auth::user()->user_id !== $user->user_id)
        <a class="btn btn-danger" href="/users/delete/{{$user->user_id}}">Delete this User</a>
        </td>
        @else
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
