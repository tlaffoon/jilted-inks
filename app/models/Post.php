<?php

class Post extends Eloquent
{
    public static $rules = array(
        'title' => 'required|max:100',
        'body'  => 'required'
    );
}
