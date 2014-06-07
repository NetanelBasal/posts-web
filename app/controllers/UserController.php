<?php

class UserController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getRegister()
	{
		return View::make('register');
	}

	public function postRegister() {
		$input = Input::all();
		$code = md5(Input::get('firstname'));
		$validation = Validator::make($input, User::validRules(), User::validMessages());
		if($validation->passes()) {
			$new_user = new User;
			$new_user->firstname = Input::get('firstname');
			$new_user->lastname = Input::get('lastname');
			$new_user->email = Input::get('email');
			$new_user->code = md5(Input::get('firstname'));
			$new_user->password = Hash::make(Input::get('password'));
			$new_user->save();

			Mail::send('emails.auth.activate', array('link' => url('accountactivate/'. $code), 'username' => Input::get('firstname')), function($message) {
				 $message->to(Input::get('email'), Input::get('firstname'))->subject('Activated Account');
			});

			return Redirect::to('/')->with('message', 'ההרשמה הצליחה, אימייל אקטיבציה נשלח אליך');

		}else {
			Input::flash();
			return Redirect::to('register')->withErrors($validation);
		}
}

	public function activateUser($code) {
		$user = User::where('code', '=', $code);
		if($user->count()) {
			$user = $user->first();
			$user->activate = 1;
			$user->code = '';
			$user->save();

			return Redirect::to('/')->with('message', 'החשבון אוקטב בהצלחה!');
		}
	}

	public function getLogin() {
			return View::make('login');
		}

	public function postLogin() {
		$remember = Input::has('remember') ? true : false;
		if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), $remember)) {
			return Redirect::to('/')->with('message', 'ברוך הבא '. Auth::user()->firstname);
		}else {
			return Redirect::to('login')->with('message', 'שם משתמש/סיסמא לא נכונים');
		}
	}

	public function getLogOut() {
		Auth::logout();
		return Redirect::to('/')->with('message', 'אתה מנותק');
	}

	public function getProfile() {
		return View::make('profile');
	}

	public function getUpdate() {
		return View::make('editprofile');
	}

	public function postUpdate() {
		try {
		$user = User::find(Auth::user()->id);
		$user->firstname = Input::get('firstname', Auth::user()->firstname);
		$user->lastname = Input::get('lastname', Auth::user()->lastname);
		$user->email = Input::get('email', Auth::user()->email);
		$user->save();
		return Redirect::to('/')->with('message', 'הפרטים עודכנו בהצלחה!');
		}
		catch(\Exception $e){
    	return Redirect::to('edit')->with('message', 'הייתה בעיה עם העדכון');
							}

	}


}
