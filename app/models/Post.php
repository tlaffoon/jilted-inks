<?php

use Carbon\Carbon;

class Post extends Eloquent
{
    protected $table = 'posts';

    protected $imgDir = 'img-upload';

    // Builds relationship to user.
    public function user()
    {
        return $this->belongsTo('User');
    }

    // Builds relationship to tags.
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    // Setter for title.
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    // Setter for body. Formats post body to include paragraph breaks.
    public function setBody($string) {
        
        $array = explode("\n", $string);
        foreach ($array as $key => $value) {
            $array[$key] = '<p>    ' . $value . '</p>';
        }
        $formattedInput = implode("\n", $array);
        $this->attributes['body'] = $formattedInput;
    }

    // Can render full body or front-page summary.
    public function renderBody($summary = false) 
    {
        return $body = ($summary == false) ? $this->body : str_limit($this->body, 300);
    }

    // Processes images on post creation, if present.
    public function addUploadedImage($image) 
    {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }

    // Can find post by either id or slug.
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

    // Can only find post by slug, or 404.
    public static function findBySlug() 
    {
        $post = self::where('slug', $slug)->first();
        return ($post == null) ? App::abort(404) : $post;
    }
}
