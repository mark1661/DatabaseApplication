@extends('layouts/master')
@section('content')
  <div class="form-group">
    {!! Form::open(['url' => '/delete/'.$user->user_id, 'files' => true]) !!}
    <div class="form-group">
      {{Form::label('User_ID', 'USER_ID:')}}
      {{Form::text('user_id',  '', ['class' => 'form-control', 'placeholder' => $user->user_id])}}
    </div>
    <div class="form-group">
      {{Form::label('Username', 'UserName:')}}
      {{Form::text('Username',  '', ['class' => 'form-control', 'placeholder' => $user->username])}}
    </div>
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
  </div>
  @endsection
