<?php

class Message extends Eloquent {
    
    protected $table = 'messages';
    
    public static $rules = array(
        'name'      => 'required',
        'email'     => 'required|email',
        'content'   => 'required|max:1000',
        'honey_pot' => 'honey_pot'
    );
    
    protected $fillable = ['name', 'email', 'content', 'honey_pot'];
}