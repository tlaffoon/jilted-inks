<?php

use Carbon\Carbon;

class Post extends Eloquent
{
    protected $table = 'posts';

    protected $imgDir = 'img-upload';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    public function renderBody($summary = false) 
    {
        return $body = ($summary == false) ? $this->body : str_limit($this->body, 300);
    }

    public function addUploadedImage($image) 
    {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }

    public static function findPost($id)
    {
        if (ctype_digit($id)) {
            $post = self::findOrFail($id);
            return $post;
        } else {
            $post = self::where('slug', '=', $id)->firstOrFail();
            return $post;
        }        
    }

    public static function findBySlug() 
    {
        $post = self::where('slug', $slug)->first();
        return ($post == null) ? App::abort(404) : $post;
    }
}
