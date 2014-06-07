<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	protected $fillable = array('firstname', 'lastname', 'email', 'password');
	public function posts() {
        return $this->hasMany('Post');
    }

    public function comment() {
    	return $this->hasMany('Comment');
    }
	public static function validRules() {
		$rules = array(
			'firstname' => array('alpha', 'min:2', 'required'),
			'lastname' => array('alpha', 'min:2', 'required'),
			'email' => array('email', 'unique:users,email', 'required'),
			'password' => array('min:6', 'max:20', 'required' ),
			'password_again' => array('same:password', 'required')
			);
		return $rules;
	}
	public static function validMessages() {
		$messages = array(
			'firstname.min' => 'מינימום שתי תווים',
			'lastname.min' => 'מינימום שתי תווים',
			'password.min' => 'מינימום שישה תווים',
			'required' => 'שדה חובה',
			'email' => 'אימייל לא תקין',
			'unique' => 'אימייל כבר קיים במערכת',
			'same' => 'הסיסמא לא מתאימה',
			'max' => 'מקסימום 20 תווים',
			'alpha' => 'שדה זה מכיל רק אותיות'
			);
		return $messages;
	}
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}