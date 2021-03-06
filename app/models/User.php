<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	protected $hidden = array('password', 'remember_token');

	public static function findUser($id)
	{
		if (ctype_digit($id)) {
		    $user = User::findOrFail($id);
		} else {
		    $user = User::where('username', '=', $id)->firstOrFail();
		}

		return $user;
	}
	
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}
	
	public function posts()
	{
		return $this->hasMany('Post');
	}

	// // Builds relationship between this user and their assigned manager.
	// public function manager() {
	// 	return $this->belongsTo('User', 'user_id');
	// }

	// // Builds relationship between this user and any users which are managed by them.
	// public function employees() {
	// 	return $this->hasMany('User', 'user_id');
	// }
}
