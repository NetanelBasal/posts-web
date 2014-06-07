<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">תפריט</a>
    </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <form class="navbar-form navbar-left" role="search" method="post" action="{{url('/')}}">

        <button type="submit" class="btn btn-default">חפש על פי קטגוריה:</button>
          <select name="category" class="select">
          <option value="1">מחשבים</option>
          <option value="2">כלכלה</option>
          <option value="3">טיולים</option>
          <option value="4">מכוניות</option>
        </select>
        </form>


      <ul class="nav navbar-nav navbar-left">

          @if(Auth::check())
          <li><a href="{{ url('logout')}}">התנתק</a></li>
          @endif
          @if(!Auth::check())
          <li><a href="{{ url('login')}}">התחבר</a></li>
          <li><a href="{{ url('register')}}">הרשם</a></li>
          @endif

      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li><a href="#">צור קשר</a></li>
        @if(Auth::check() && (Auth::user()->admin == 1 ))
        <li><a href="{{ url('admin')}}">נהל פוסטים</a></li>
        @endif
        @if(Auth::check())
        <li><a href="{{ url('profile')}}">הפרופיל שלי</a></li>
        <li><a href="{{ url('myposts')}}">הפוסטים שלי</a></li>
        <li><a href="{{ url('createpost')}}">צור פוסט חדש</a></li>
        @endif
        <li><a href="{{ url('posts')}}">כל הפוסטים</a></li>
        <li><a href="/">דף הבית</a></li>

      </ul>
      {{Form::open(array('url' => 'search', 'method' => 'get', 'class' => 'form-inline navbar-form navbar-right', 'role' => 'form'))}}
      <!--  <form class="form-inline navbar-form navbar-right" role="form"  > -->
        <div class="form-group">
          <label class="sr-only" for="search">חפש</label>
          <input type="text" class="form-control" id="search" placeholder="חפש באתר..." name="search">
        </div>
          <button type="submit" class="btn btn-default">חפש</button>
        </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->