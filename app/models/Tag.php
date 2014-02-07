<?php

class Tag extends Eloquent {
	protected $guarded = array();
	protected $softDelete = true;

	public static $rules = array(
		// 'owner_type' => 'required',
		// 'owner_id' => 'required',
		// 'tagged_type' => 'required',
		// 'tagged_id' => 'required',
		// 'status1' => 'required',
		// 'status2' => 'required',
		// 'status3' => 'required',
		// 'status4' => 'required',
		// 'status5' => 'required'
	);
}
