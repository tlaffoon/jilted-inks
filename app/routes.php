<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('parks', function() {
    return View::make('parks');
});

Route::post('parks', function() {
    return 'Post to Parks!';
});

Route::get('say-hello/{name}', function($name) {
    $data = array(
        'name' => $name,
        'age'  => 0
    );
    
    return View::make('sayhello', $data);
});

Route::get('say-hello/{name}/{age}', function($name, $age) {
    return View::make('sayhello')->with('name', $name)->with('age', $age);
});
