@extends('template.template')
@section('menu')
    @include('menu')
@stop

@section('main')
<div class="col-md-6 col-md-offset-3">
        <h2>מלא את הפרטים הבאים:</h2>

    <form role="form" method="post" action="">
    <fieldset>
     <legend>הרשמה</legend>
      <div class="form-group">
        {{Form::token()}}
        <label for="firstname">שם פרטי</label>
        <input type="text" class="form-control" id="firstname" placeholder="שם פרטי" name="firstname"
        value="<?php echo Input::old('firstname'); ?>">
        {{ $errors->first('firstname', '<p class="alert alert-danger">:message</p>') }}
      </div>
      <div class="form-group">
        <label for="lastname">שם משפחה</label>
        <input type="text" class="form-control" id="lastname" placeholder="שם משפחה" name="lastname"
        value="<?php echo Input::old('lastname'); ?>">
        {{ $errors->first('lastname', '<p class="alert alert-danger">:message</p>') }}
      </div>
      <div class="form-group">
        <label for="email">אימייל</label>
        <input type="email" class="form-control" id="email" placeholder="אימייל" name="email"
        value="<?php echo Input::old('email'); ?>">
        {{ $errors->first('email', '<p class="alert alert-danger">:message</p>') }}
      </div>
      <div class="form-group">
        <label for="password">סיסמא</label>
        <input type="password" class="form-control" id="password" name="password">
        {{ $errors->first('password', '<p class="alert alert-danger">:message</p>') }}
      </div>
      <div class="form-group">
        <label for="password_again">אמת סיסמא</label>
        <input type="password" class="form-control" id="password_again"  name="password_again">
        {{ $errors->first('password_again', '<p class="alert alert-danger">:message</p>') }}
      </div>

      <button type="submit" class="btn btn-default pull-left">הרשם!</button>
      </fieldset>
   </form>

</div>

@stop