@extends('layouts.master')
@section('content')
<h1>Review</h1>
  {!! Form::open(['url' => 'submitEditReview/' .$review->review_id]) !!}
  <div class="form-group">
    {{Form::label('review', 'Review')}}
    {{Form::textarea('review_content', $review->review_content, ['class' => 'form-control', 'placeholder' => $review->review_content])}}
  </div>
  <div>
    {{Form::submit('Create!', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
  @endsection
