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

/* WARNING: root is /app-dev! So, /phone -> /app-dev/phone */

Route::resource('posts', 'PostController');

Route::resource('users', 'UserController', ['only'  => ['create', 'show', 'destroy', 'store'],
                                             'names' => ['create' => 'register', 'show' => 'profile',
                                             'destroy' => 'delete']]);