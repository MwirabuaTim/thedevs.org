<?php

class Star extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'giver' => 'required',
		'recipient' => 'required',
		'count' => 'required'
	);
}
