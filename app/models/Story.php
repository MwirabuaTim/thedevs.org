<?php

class Story extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'creator' => 'required',
		'body' => 'required',
		'location' => 'required',
		'map' => 'required',
		'views' => 'required',
		'votes' => 'required',
		'notes' => 'required',
		'status' => 'required',
		'public' => 'required'
	);
}
