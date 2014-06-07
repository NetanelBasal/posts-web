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


    <h1>נוספו לאחרונה:</h1>
    @if(count($posts) > 0)

      @foreach($posts as $post)
        <h2>{{$post->title}}     <span class="author">מאת <i>{{$post->firstname}}</i></span></h2>
        <p style="text-align:left;"><i>{{$post->created_at}}</i></p>

        <p>{{substr($post->body, 0, 200)}}</p>
        <p style="text-align:left;"><a href="{{url('fullpost/'. $post->id)}}">המשך לקרוא &larr;</a></p>
      @endforeach

    @else
        <h1>אין פוסטים כרגע</h1>
    @endif

</div>