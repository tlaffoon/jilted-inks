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

    // Builds relationship to tags.
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    // Builds relationship to parent post.
    public function parent() {
        return $this->belongsTo('Post', 'post_id');
    }

    // Builds relationship to child posts.
    public function children() {
        return $this->hasMany('Post');
    }

    // This function will generate an html list containing its name, and it's children posts.
    public function childList($post) {
        $html = '';
            $html .= '<ul>';
                $html .= '<li>';
                    $html .= "<a href='/posts/" . $post->slug . "'>" . $post->title . "</a>";

                    // Recursively call this function to get lists of this post's children.
                    foreach ($post->children as $child) {
                        $html .= $child->childList($child);
                    }

                $html .= '</li>';
            $html .= '</ul>';
        $html .= '';

        return "$html";
    }


    // public static function generateChildList($post) {

    //     $html = '';

    //     foreach ($post->children->toArray() as $child) {
    //         $html += '<ul>';
    //             $html += '<li>';
    //                 $html +=  $child->title;
    //             $html += '</li>';
    //         $html += '</ul>';

    //     }

    //     return "$html";
    // }

    // public function postList() {
        
    //     $post = Post::findOrFail($this->id);

    //     $html = '';
        
    //     $html += '<ul>';
    //         $html += '<li>';
    //             $html +=  $post->title ;

    //             foreach ($post->children as $child) {
    //                 $html += $this->postList($child);
    //             }

    //         $html += '</li>';
    //     $html += '</ul>';

    //     return $html;
    // }

    // public function generatePostList($posts) {
        
    //     foreach ($posts as $post) {
    //         $html = "<ul>";
    //         $html += "<li>" . $post->title;

    //         $html += generateList($post->children);

    //         $html += "</li>";

    //         $html += "</ul>";
    //     }

    //     return $html;
    // }

    // public static function generateSiteMap() {
    //     $posts = Post::where('post_id', '=', null)->orderBy('title')->get();
    //     $html = generatePostList($posts);
    //     return $html;
    // }

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
