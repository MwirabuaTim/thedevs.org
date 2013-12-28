<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {
		protected $fillable = array(
		'first_name', 
		'last_name', 
		'email', 
		'phone',
		'elevator',
		'about',
		'pic', 
		'video',
		'location', 
		'activated',
		'map',
		'last_map',
		'views',
		'votes',
		'notes',
		'status',
		'public'
		);

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

	public function profiles() //tim
    {
        return $this->hasMany('Profile');
    }

	public function getName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
	public function getNameLink()
	{
		return link_to_route('devs.show', $this->getName(), $this->id);
	}
	public static function hasEditRight($record){
		if(User::getCreator($record) == Sentry::getUser()->id || Sentry::getUser()->hasAccess('admin')){
			return true;
		}
		else{
			return false;
		}
	}
	public static function getModel($path){  //edit rights bro
		if($path == 'stories'){ //check for weird plurals to resolve singular
			$model = ucwords(substr($path, 0, strlen($path) -3).'y');
		}
		else{
			$model = ucwords(substr($path, 0, strlen($path) -1));
		}
		return $model;
	}
	public static function getRecord($path, $id){ 
		$model = User::getModel($path);
		return $model::find($id);
	}

	public static function getPath($record){
		$cname = strtolower(get_class($record));
		if(substr($cname, strlen($cname)-1, strlen($cname)) == 'y'){ //check for singulars ending with 'y'
			$path = substr($cname, 0, strlen($cname) -1).'ies';
			// $path = substr($cname, strlen($cname)-1, strlen($cname));
		}
		else{
			$path = $cname.'s';
		}
		return $path;
	}


	public static function getCreator($record){
		$creator = $record->creator ? $record->creator : $record->organizer; //For eventts
		$creator = get_class($record) == 'Dev' ? $record->id : $creator; //For devs
		return $creator;
	}

	public static function getPublicity($record){
		if(Sentry::check()):

			if(User::hasEditRight($record)):
				return $record->public ? 'Public' : 'Not Public';
			endif;

		endif;
	}

	public static function getEditLink($record){
		if(Sentry::check()):

			if(User::hasEditRight($record)):
				return link_to_route(User::getPath($record).'.edit', 'Edit', array($record->id), array('class' => 'btn btn-info'));
			endif;
			// return var_dump(get_class($record));

		endif;

	}
	public static function getImageLink($record, $classes){
		$path = User::getPath($record);
		$img = $path == 'projects' || $path == 'orgs' ? $record->logo : $record->pic;
		$img = $path == 'eventts' || $path == 'stories' ? User::find(User::getCreator($record))->pic : $img; //using creator pic for eventts and stories

		$i_link = "/$path/$record->id";
		$i_link = $path == 'eventts' || $path == 'stories' ? "/devs/".User::getCreator($record) : $i_link; //using creator pic for eventts and stories

		return "<a href=\"$i_link\"><img src=\"$img\" class=\"$classes\" /></a>";
	}
}