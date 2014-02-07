<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {

		protected $fillable = array(
		// 'id',
		'email',
		'password',
		'permissions',
		'activated',
		// 'activation_code',
		// 'activated_at',
		// 'last_login',
		// 'persist_code',
		// 'reset_password_code',
		'first_name',
		'last_name',
		// 'created_at',
		// 'updated_at',
		'pic',
		'video',
		'phone',
		'elevator',
		'about',
		'location',
		'map',
		'last_map',
		'contacts',
		'notes',
		'public',
		'views',
		'votes',
		'status',
		// 'deleted_at'
		);
		
	protected $softDelete = true;

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

	public function profiles() //@tim
    {
        return $this->hasMany('Profile');
    }

}