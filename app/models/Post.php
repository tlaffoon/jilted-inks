<?php

use Carbon\Carbon;

class Post extends Eloquent
{
    protected $table = 'posts';

    protected $imgDir = 'img-upload';

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }

    // public function tags()
    // {
    //     return $this->belongsToMany('Tag', 'post_tags');
    // }

    // public function findBySlug() {
    //     $post = self::where('slug', $slug)->first();
    //     return ($post == null) ? App::abort(404) : $post;
    // }

    public function renderBody($summary = false) {

        $body = $this->body;

        if ($summary) {
            $body = str_limit($body, 20);
        }

        return $body;
    }

    public function addUploadedImage($image) {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }
}
