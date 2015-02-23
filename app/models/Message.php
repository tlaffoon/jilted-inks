<?php

class Message extends Eloquent {
    
    protected $table = 'messages';
    
    public static $rules = array(
        'name'      => 'required',
        'email'     => 'required|email',
        'content'   => 'required|max:1000'
    );
    
    protected $fillable = ['name', 'email', 'content'];
}