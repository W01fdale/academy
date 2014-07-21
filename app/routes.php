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

Route::get('/', function() { return Redirect::action('PostController@index'); });

Route::get('posts/own', 'PostController@own');
Route::resource('posts', 'PostController');

Route::controller('users', 'UserController');