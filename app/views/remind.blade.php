@extends('template.template')
@section('menu')
    @include('menu')
@stop

@section('main')
<div class="col-md-6 col-md-offset-3">


{{ Form::open(array('url' => url('password/reset'))) }}
 <div class="form-group">
  <p>{{ Form::label('email', 'email') }}
  {{ Form::text('email') }}</p>
 </div>
  <p>{{ Form::submit('שלח') }}</p>

{{ Form::close() }}


</div>

@stop