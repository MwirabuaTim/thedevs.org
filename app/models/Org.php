<?php

class Org extends Eloquent {
	protected $guarded = array();
	protected $softDelete = true;

	public static $rules = array(
		// 'name' => 'required',
		// 'logo' => 'required',
		// 'video' => 'required',
		// 'creator' => 'required',
		// 'elevator' => 'required',
		// 'description' => 'required',
		// 'type' => 'required',
		// 'contacts' => 'required',
		// 'forum_id' => 'required',
		// 'location' => 'required',
		// 'map' => 'required',
		// 'views' => 'required',
		// 'votes' => 'required',
		// 'notes' => 'required',
		// 'status' => 'required',
		// 'public' => 'required'
	);
}
