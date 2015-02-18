<?php

class Address extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['street_number', 'street_name', 'city', 'state', 'zip', 'country', 'latitude', 'longitude'];

}