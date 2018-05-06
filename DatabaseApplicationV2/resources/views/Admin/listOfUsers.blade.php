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
        <th>Options</th>
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
        <td><a class="btn btn-success" href="/admin/sendEmail/{{$user->user_id}}">Send Email</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
