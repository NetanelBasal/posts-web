@extends('template.template')

@section('menu')
    @include('menu')
@stop

@section('main')
    @if(Session::has('message'))
        <p class="alert alert-warning">{{ Session::get('message')}}</p>
    @endif
    <div class="col-md-6 col-md-offset-3">

        <h1>הפרטים שלך</h1>
        <form method="post" action="" />
        {{Form::token()}}
            <div class="form-group">
                <label for="email">אימייל</label>
                <input type="email" class="form-control" id="email" value="{{ Auth::user()->email}}" name="email">
            </div>
            <div class="form-group">
                <label for="firstname">שם פרטי</label>
                <input type="text" class="form-control" id="firstname" value="{{ Auth::user()->firstname}}" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">שם משפחה</label>
                <input type="text" class="form-control" id="lastname" value="{{ Auth::user()->lastname}}" name="lastname">
            </div>
              <input type="submit" value="עדכן" class="btn btn-primary">
        </form>
    </div>



@stop