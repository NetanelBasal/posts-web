<?php

class PasswordController extends BaseController {

  public function remind()
  {
    return View::make('remind');
  }

  public function request()
{
  $credentials = array('email' => Input::get('email'));

   Password::remind($credentials);
   return Redirect::to('/')->with('message','נשלח אליך אימייל עם קישור לאיפוס סיסמא!');
}

public function reset($token)
{
  return View::make('reset')->with('token', $token);
}

public function update()
{
  $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'), 'password_confirmation' => Input::get('password_confirmation'), 'token' => Input::get('token'));

   Password::reset($credentials, function($user, $password)
  {
    $user->password = Hash::make($password);

    $user->save();
  });
  return Redirect::to('/')->with('message', 'הסיסמא שונתה בהצלחה');
}
}