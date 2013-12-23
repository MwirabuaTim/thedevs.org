<?php

class Eventt extends Eloquent {
	protected $guarded = array();
	// protected $fillable = array();

	public static $rules = array(
		'name' => 'required',
		// 'pic' => 'required',
		// 'organizer' => 'required',
		// 'elevator' => 'required',
		// 'description' => 'required',
		// 'type' => 'required',
		// 'location' => 'required',
		// 'map' => 'required',
		// 'start_time' => 'required',
		// 'end_time' => 'required',
		// 'time_zone' => 'required',
		// 'recurrence_period' => 'required',
		// 'recurrence_count' => 'required',
		// 'public' => 'required',
		// 'notes' => 'required',
		// 'views' => 'required',
		// 'votes' => 'required',
		// 'status' => 'required'
	);
}
