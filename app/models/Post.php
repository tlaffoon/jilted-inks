<?php

use Carbon\Carbon;

class Post extends \Eloquent
{
    protected $table = 'posts';

    protected $imgDir = 'img-upload';

    protected $fillable = ['body', 'description', 'title', 'slug', 'tag_list', 'image'];

    // Builds relationship to user.
    public function user()
    {
        return $this->belongsTo('User');
    }

    // Builds relationship to series.
    public function series() 
    {
        return $this->belongsTo('Series');
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

    public function renderBody() {
        $dirtyHTML = Parsedown::instance()->parse($this->body);
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($dirtyHTML);
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

    /*
     * Get a comma delimited tags list for this post.
     */
    public function getTagListAttribute()
    {
        $tagList = array();
        foreach ($this->tags as $tag)
        {
            $tagList[] = $tag->name;
        }
        return implode(',', $tagList);
    }
    
    /*
     * Store user input tags to this post.
     */
    public function syncTags($commaSeparatedTags)
    {
        $tagIds = array();
        // process the tags
        if (!empty($commaSeparatedTags))
        {
            $tagList = explode(',', $commaSeparatedTags);
            foreach ($tagList as $tagName)
            {
                // clean the tag name
                $tagName = Tag::clean($tagName);
                // lookup the tag by name
                $tag = Tag::findTag($tagName);
                if (!$tag)
                {
                    // tag doesn't exist, add it
                    $tag = new Tag;
                    $tag->name = $tagName;
                    $tag->save();
                }
                // add the tag id to the ids array
                $tagIds[] = $tag->id;
            }
        }
        // syncronize linked tags with those in ids array
        $this->tags()->sync($tagIds);
    }
}
