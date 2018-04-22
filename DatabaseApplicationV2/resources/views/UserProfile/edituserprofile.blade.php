@extends('layouts.master')
@section('content')
<h1>Edit Profile</h1>
 @include('layouts.messages')
<div class="form-group">
  {!! Form::open(['url' => '/submit/'.$userprofile->user_profile_id, 'files' => true]) !!}
  <div class="form-group">
    {{Form::label('userfirstname', 'First Name:')}}
    {{Form::text('userfirstname', $userprofile->first_name, ['class' => 'form-control', 'placeholder' => $userprofile->first_name])}}
  </div>
  <div class="form-group">
    {{Form::label('userlastname', 'Last Name:')}}
    {{Form::text('userlastname', $userprofile->last_name, ['class' => 'form-control', 'placeholder' => $userprofile->last_name])}}
  </div>
  <div class="form-group">
    {{Form::label('usergender', 'Gender: ')}}
    {{Form::select('usergender', ['Female' => 'Female',
                                  'Male' => 'Male'], $userprofile->gender, ['class' => 'form-control', 'placeholder' => 'Pick a gender'])}}
  </div>
  <div class="form-group">
    {{Form::label('location', 'Location: ')}}
    {{Form::text('location', $userprofile->location, ['class' => 'form-control', 'placeholder' => $userprofile->location])}}
  </div>
  <div class="form-group">
    {{Form::label('userage', 'Age: ')}}
    {{Form::text('userage', $userprofile->age, ['class' => 'form-control', 'placeholder' => $userprofile->age])}}
  </div>
  <div class="form-group">
    {{Form::label('userprofilepicture', 'Add a new Profile Picture: ')}}
    <br>
    {{Form::file('image', ['accept' => '.jpg, .png'])}}
  </div>
  <!--
  <div class="form-group">
    {{Form::label('userdateofbirth', 'Birthday:')}}
    {{Form::date('userdateofbirth', '', ['class' => 'form-control'])}}
  </div>
-->
  <div class="form-group">
    {{Form::label('userprofileprivacy', 'Profile Privacy')}}
    {{Form::select('userprofileprivacy', ['Public' => 'Public',
                                          'Only Me' => 'Only Me',
                                          'Friends' => 'Friends'], $userprofile->profile_privacy, ['class' => 'form-control', 'placeholder' => 'Pick an option'])}}
  </div>
  {{Form::submit('Apply Changes', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
