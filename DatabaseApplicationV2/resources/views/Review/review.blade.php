@extends('layouts.master')
@section('content')
<h1>Review</h1>
  {!! Form::open(['url' => 'newreview/' .$movie->id]) !!}
  <div class="form-group">
    {{Form::label('review', 'Review')}}
    {{Form::textarea('review_content', '', ['class' => 'form-control', 'placeholder' => 'Type away...'])}}
  </div>
  <div class="form-group">
    {{Form::label('userprofileprivacy', 'Score:')}}
    {{Form::select('scores', ['1' => 1,
                              '2' => 2,
                              '3' => 3,
                              '4' => 4,
                              '5' => 5,
                              '6' => 6,
                              '7' => 7,
                              '8' => 8,
                              '9' => 9,
                              '10' => 10,
                              ], '1', ['class' => 'form-control'])}}
  </div>
  <div>
    {{Form::submit('Create!', ['class' => 'btn btn-success'])}}
  </div>
  {!! Form::close() !!}
  @endsection
