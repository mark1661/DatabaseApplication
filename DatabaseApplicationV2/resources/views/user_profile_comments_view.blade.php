@extends('layouts.master')
@section('content')
<h1>Add a comment</h1>
<hr/>
<div class="jumbotron">
  {!! Form::open(['url' => 'newComment/' .$userprofile->user_profile_id]) !!}
  <div class="form-group">
    {{Form::label('komment', 'Type your comment here: ')}}
    {{Form::textarea('comment_string', '', ['class' => 'form-control', 'placeholder' => 'Type away...'])}}
  </div>
  <div>
    {{Form::submit('Create!', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
</div>
@endsection
