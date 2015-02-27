<?php

class Tag extends \Eloquent {

	public static $rules = [
		'name' => 'required'
	];

	protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    public function fingTag($name)
    {
        $tag = self::where('name', '=', $id)->firstOrCreate();
        return $tag;
    }

    /*
     * Get all tags in the db.
     */
    public static function getAll()
    {
        return Tag::orderBy('name')->get();
    }
}