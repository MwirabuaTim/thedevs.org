<?php

class Kit extends Eloquent {
	protected $guarded = array();
	protected $softDelete = true;

	public static $rules = array(
		// 'name' => 'required',
		// 'creator' => 'required',
		// 'about' => 'required',
		// 'public' => 'required',
		// ' notes' => 'required',
		// 'views' => 'required',
		// 'votes' => 'required',
		// 'status' => 'required'
	);
}
