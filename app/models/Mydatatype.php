<?php

class Mydatatype extends Eloquent {
	protected $guarded = array();
	protected $softDelete = true;

	public static $rules = array(
		// 'mycheckbox' => 'required',
		// 'myints' => 'required',
		// 'mydates' => 'required',
		// 'mystring' => 'required',
		// 'myfloat' => 'required',
		// 'mybigint' => 'required'
	);
}
