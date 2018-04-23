@extends('layouts.master')
@section('content')
<h1>Review</h1>
  {!! Form::open(['url' => 'newreview/' .$movie->id]) !!}
  <div class="form-group">
    {{Form::label('review', 'Review')}}
    {{Form::textarea('review_content', '', ['class' => 'form-control', 'placeholder' => 'Type away...'])}}
  </div>
  <div>
    {{Form::submit('Create!', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
  @endsection
