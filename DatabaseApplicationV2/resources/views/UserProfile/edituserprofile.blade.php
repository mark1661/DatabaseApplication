@extends('layouts.master')
@section('content')
<h1>Edit Profile</h1>
 @include('layouts.messages')
<div class="form-group">
  {!! Form::open(['url' => '/submit/'.$userprofile->user_profile_id, 'files' => true]) !!}
  <div class="form-group">
    {{Form::label('userfirstname', 'First Name:')}}
    {{Form::text('userfirstname', '', ['class' => 'form-control', 'placeholder' => $userprofile->first_name])}}
  </div>
  <div class="form-group">
    {{Form::label('userlastname', 'Last Name:')}}
    {{Form::text('userlastname', '', ['class' => 'form-control', 'placeholder' => $userprofile->last_name])}}
  </div>
  <div class="form-group">
    {{Form::label('usergender', 'Gender: ')}}
    {{Form::select('usergender', ['Female' => 'Female',
                                  'Male' => 'Male'], null, ['class' => 'form-control', 'placeholder' => $userprofile->gender])}}
  </div>
  <div class="form-group">
    {{Form::label('location', 'Location: ')}}
    {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => $userprofile->location])}}
  </div>
  <div class="form-group">
    {{Form::label('userage', 'Age: ')}}
    {{Form::text('userage', '', ['class' => 'form-control', 'placeholder' => $userprofile->age])}}
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
                                          'Friends' => 'Friends'], null, ['class' => 'form-control', 'placeholder' => $userprofile->profile_privacy])}}
  </div>
  {{Form::submit('Apply Changes', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
