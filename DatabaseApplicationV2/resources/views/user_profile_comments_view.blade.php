@extends('layouts.master')
@section('content')
<h1>Comments</h1>
  {!! Form::open(['url' => 'newComment/' .$userprofile->user_profile_id]) !!}
  <div class="form-group">
    {{Form::label('komment', 'Comment')}}
    {{Form::textarea('comment_string', '', ['class' => 'form-control', 'placeholder' => 'Type away...'])}}
  </div>
  <div>
    {{Form::submit('Create!', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
  @endsection
