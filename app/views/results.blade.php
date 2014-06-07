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

<div class="col-md-12 clearfix">


    @if(count($result) > 0)

      @foreach($result as $post)
        <h2>{{$post->title}}       <span class="author">מאת <i>{{$post->firstname}}</i></span></h2>
        <p class="left"><i>{{$post->created_at}}</i></p>
        <p>{{$post->body}}</p>
      @endforeach
      <ul class="pagination">
    <?php echo $result->links(); ?>
    </ul>

    @else
        <h1>לא נמצאו תוצאות</h1>
    @endif

</div>

@stop