<?php

use Carbon\Carbon;

class Post extends Eloquent
{
    public static $rules = array(
        'title' => 'required|max:100',
        'body'  => 'required'
    );

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
}
