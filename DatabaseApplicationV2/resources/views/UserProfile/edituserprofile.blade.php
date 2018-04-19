@extends('layouts.master')
@section('content')
<h1>Edit Profile</h1>
<hr/>
<div class="form-group">
  {!! Form::open(['url' => 'user/{id}/userprofile', 'files' => true]) !!}
  <div class="form-group">
    {{Form::label('userfirstname', 'First Name:')}}
    {{Form::text('userfirstname', '', ['class' => 'form-control', 'placeholder' => 'Change your first name..'])}}
  </div>
  <div class="form-group">
    {{Form::label('userlastname', 'Last Name:')}}
    {{Form::text('userlastname', '', ['class' => 'form-control', 'placeholder' => 'Change your last name...'])}}
  </div>
  <div class="form-group">
    {{Form::label('usergender', 'Gender: ')}}
    {{Form::select('usergender', ['Female' => 'Female',
                                  'Male' => 'Male'], null, ['class' => 'form-control', 'placeholder' => 'Choose your gender..'])}}
  </div>
  <div class="form-group">
    {{Form::label('useraddress', 'Address: ')}}
    {{Form::text('useraddress', '', ['class' => 'form-control', 'placeholder' => 'Change your address..'])}}
  </div>
  <div class="form-group">
    {{Form::label('userprofilepicture', 'Add a new Profile Picture: ')}}
    <br>
    {{Form::file('actorpicture', ['accept' => '.jpg, .png'])}}
  </div>
  <div class="form-group">
    {{Form::label('userdateofbirth', 'Birthday:')}}
    {{Form::date('userdateofbirth', '', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('usermaritalstatus', 'Marital Status')}}
    {{Form::select('usermaritalstatus', ['Single' => 'Single',
                                         'In a relationship' => 'In a relationship',
                                         'Engaged' => 'Engaged',
                                         'Married' => 'Married',
                                         'Widowed' => 'Widowed',
                                         'Divorced' => 'Divorced'], null, ['class' => 'form-control', 'placeholder' => 'Choose your Marital Status..'])}}
  </div>
  <div class="form-group">
    {{Form::label('userprofileprivacy', 'Profile Privacy')}}
    {{Form::select('userprofileprivacy', ['Public' => 'Public',
                                          'Only Me' => 'Only Me',
                                          'Friends' => 'Friends'], null, ['class' => 'form-control', 'placeholder' => 'Set your profile privacy..'])}}
  </div>
  {{Form::submit('Apply Changes', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
