@extends('template.template')
@section('menu')
    @include('menu')
@stop

@section('main')
<div class="col-md-6 col-md-offset-3">


    <form role="form" method="post" action="">
    <fieldset>
     <legend>התחבר</legend>

      <div class="form-group">
        {{Form::token()}}
        <label for="title">כותרת</label>
        <input type="text" class="form-control" id="title"  name="title" value="{{ Input::old('title') }}">
        {{ $errors->first('title', '<p class="alert alert-danger">:message</p>') }}
      </div>
      <div class="form-group">
        <label for="body">גוף הפוסט:</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ Input::old('body')}}</textarea>
        {{ $errors->first('body', '<p class="alert alert-danger">:message</p>') }}
      </div>
      <p>קטגוריה:</p>
      <select class="form-control" name="category">
          <option value="1">מחשבים</option>
          <option value="2">כלכלה</option>
          <option value="3">טיולים</option>
          <option value="4">מכוניות</option>

        </select>
        <br>


      <button type="submit" class="btn btn-default pull-left">צור פוסט!</button>
      </fieldset>

   </form>

</div>

@stop