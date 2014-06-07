@extends('template.template')
@section('menu')
@include('menu')
@stop

@section('main')
<div class="col-md-12">
   @if(Session::has('message'))
         <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif
    <div class="jumbotron clearfix">
      <h1>מערכת הפוסטים של ישראל</h1>
      <hr>
      <p>הרשם כבר עכשיו וכתוב פוסטים בכל נושא שתרצה</p>
      <p>אנשים מכל העולם יוכלו לקרוא מה שכתבת ולהגיב....</p>
      <img src="<?php echo asset('images/keyboard.jpg');?>" alt="פוסטים" class="pull-left">
    </div>
</div>
<div class="row">
<div class="col-md-12 clearfix">


        <h1>{{$post->title}}</h1>
        <p style="text-align:left;"><i>{{$post->created_at}}</i></p>
        <p>{{$post->body}}</p>

</div>
</div>

@if(count($comments) > 0)
  @foreach ($comments as $comment)
    <div class="row">
      <div class="col-md-4 col-md-offset-8">
        <p>מאת: {{ $comment->firstname }}</p>
        <p>{{$comment->created_at}}</p>
        <input type="hidden" name="comment_id" value="{{$comment->id}}">
        <textarea name="body" id="body" class="form-control" disabled="disabled">{{ $comment->body }}</textarea>
      </div>
    </div>
  @endforeach
@else
<h4>אין תגובות על מאמר זה</h4>
@endif
@if(Auth::check())
<div class="row">
  <div class="col-md-12">
         <h2>כתוב תגובה</h2>
        <form method="post" action="" />
        {{Form::token()}}
            <div class="form-group">
                <label for="body">שם פרטי:</label>
                <input type="text" class="form-control" id="firstname" value="{{ Auth::user()->firstname}}" name="firstname" disabled="disabled">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </div>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            <br>
              <input type="submit" value="הגב" class="btn btn-primary  pull-left">
        </form>
  </div>
</div>
@else
  <p class="alert alert-warning">עליך להיות רשום על מנת להגיב.</p>
@endif


@stop