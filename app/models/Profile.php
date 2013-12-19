<?php

class Profile extends Eloquent {
	protected $fillable = array(
		'provider', 
		'first_name', 
		'last_name', 
		'email', 
		'pic', 
		'location', 
		'description', 
		'username', 
		'uid', 
		'link', 
		'code', 
		'field1', 
		'field2', 
		'field3', 
		'field4', 
		'field5'		
		);
	// protected $guarded = array();

	public static $rules = array(
		// 'provider' => 'required',
		// 'first_name' => 'required',
		// 'last_name' => 'required',
		// 'email' => 'required',
		// 'pic' => 'required',
		// 'location' => 'required',
		// 'description' => 'required',
		// 'username' => 'required',
		// 'uid' => 'required',
		// 'link' => 'required',
		// 'code' => 'required',
		// 'field1' => 'required',
		// 'field2' => 'required',
		// 'field3' => 'required',
		// 'field4' => 'required',
		// 'field5' => 'required'
	);
	public function user()//tim
    {
        return $this->belongsTo('User');
    }	
}

