<?php

class Series extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
        'description' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description'];


    // Build relationship between one series and multiple posts.
    public function posts() {
        return $this->hasMany('Post');
    }

}