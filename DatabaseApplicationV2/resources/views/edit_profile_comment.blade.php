@extends('layouts.master')
@section('content')
<h1>Comments</h1>
  {!! Form::open(['url' => 'submitComment/' .$comment->user_profile_comment_id]) !!}
  <div class="form-group">
    {{Form::label('komment', 'Comment')}}
    {{Form::textarea('comment_string', $comment->comment_string, ['class' => 'form-control', 'placeholder' => $comment->comment_string])}}
  </div>
  <div>
    {{Form::submit('Finish!', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
  @endsection
