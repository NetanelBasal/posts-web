@extends('template.template')

@section('menu')
    @include('menu')
@stop

@section('main')
    <div class="col-md-6 col-md-offset-3">

        <h1>הפרטים שלך</h1>
        <h2>שם פרטי:</h2> <h4>{{Auth::user()->firstname}}</h4>
        <h2>שם משפחה:</h2><h4>{{Auth::user()->lastname}}</h4>
        <h2>אימייל:</h2><h4>{{Auth::user()->email}}</h4>
        <p><a href="edit" class="btn btn-primary">ערוך פרטים</a></p>
    </div>
@stop
