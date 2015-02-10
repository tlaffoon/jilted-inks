<?php

use Carbon\Carbon;

class Post extends Eloquent
{

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function renderBody($summary = false) {

        $body = $this->body;

        if ($summary) {
            $body = str_limit($body, 20);
        }

        return $body;
    }
}
