
  {!! Form::open(['url' => '/submit']) !!}
  <div class="form-group">
    {{Form::label('message', 'Message')}}
    {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter Message'])}}
  </div>
  <div>
    {{Form::submit('Submit Comment', ['class' => 'btn btn-primary'])}}
  </div>
  {!! Form::close() !!}
