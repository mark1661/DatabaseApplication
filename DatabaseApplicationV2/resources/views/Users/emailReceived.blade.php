@extends('layouts.master')
@section('content')
<h1>Reset Your Password</h1>
<hr>
{!! Form::open(['url' => 'user/passwordSuccess/' . $user->user_id]) !!}
<div class="form-group">
  {{Form::label('userpassword', 'New Password: ')}}
  {{Form::password('userpassword',  array('class' => 'form-control', 'placeholder' => 'Enter Your New Password'))}}
</div>
{{Form::submit('Save New Password', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
