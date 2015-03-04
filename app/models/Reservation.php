<?php

class Reservation extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required | alpha',
        'email' => 'required | email',
        'phone' => 'required | numeric',
        'date' => 'required | date',
        'time' => 'required | time',
        'num_hours' => 'required|integer'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'email', 'phone', 'skype_username', 'date', 'time', 'num_hours'];

}