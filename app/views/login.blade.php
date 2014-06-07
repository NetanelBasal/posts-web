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
        <label for="email">אימייל</label>
        <input type="email" class="form-control" id="email" placeholder="אימייל" name="email">
      </div>
      <div class="form-group">
        <label for="password">סיסמא</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

        <label>
          <input type="checkbox" name="remember">
          זכור אותי!
        </label>



      <button type="submit" class="btn btn-default pull-left">התחבר!</button>
      <p><a href="{{url('password/reset')}}">שכחתי סיסמא</a></p>
      </fieldset>
      @if(Session::has('message'))
         <p class="alert alert-danger">{{ Session::get('message') }}</p>
      @endif
   </form>

</div>

@stop