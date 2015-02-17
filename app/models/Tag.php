<?php

class Tag extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

    /**
     * Get random models
     */
    // public function scopeRandom($query)
    // {
    //     return $query->orderBy(DB::raw('RAND()'));
    // }
}