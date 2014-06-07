@extends('template.template')
@section('menu')
    @include('menu')
@stop

@section('main')
<div class="col-md-6 col-md-offset-3">




{{ Form::open(array('url' =>  URL::to('password/reset', array($token))) ) }}
 <div class="form-group">
  <p>{{ Form::label('email', 'אימייל') }}
  {{ Form::text('email') }}</p>
 </div>
 <div class="form-group">
  <p>{{ Form::label('password', 'סיסמא') }}
  {{ Form::text('password') }}</p>
 </div>
 <div class="form-group">
  <p>{{ Form::label('password_confirmation', 'סיסמא פעם שניה') }}
  {{ Form::text('password_confirmation') }}</p>
 </div>
  {{ Form::hidden('token', $token) }}

  <p>{{ Form::submit('אפס') }}</p>

{{ Form::close() }}


</div>

@stop