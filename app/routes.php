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
// protection from cross-site request forgeries
Route::when('*', 'csrf', array('post', 'put', 'delete'));

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * landing page
 */
Route::get('home','HomeController@showHome');
// contact us form
Route::post('contact','HomeController@saveContactUs');
