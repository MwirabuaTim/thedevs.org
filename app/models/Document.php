<?php

class Document extends Eloquent {
	protected $guarded = array();
	protected $softDelete = true;

	public static $rules = array(
		'title' => 'required',
		'body' => 'required'
	);
}
