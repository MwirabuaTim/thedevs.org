<?php

class Profile extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'provider' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required',
		'pic' => 'required',
		'location' => 'required',
		'description' => 'required',
		'username' => 'required',
		'uid' => 'required',
		'link' => 'required',
		'code' => 'required',
		'field1' => 'required',
		'field2' => 'required',
		'field3' => 'required',
		'field4' => 'required',
		'field5' => 'required'
	);
	public function user()//tim
    {
        return $this->belongsTo('User');
    }	
}

