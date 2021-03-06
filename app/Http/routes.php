<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['middlewareGroups'=>['web']], function() {
	//authentication
	Route::auth();
	// Route::get('auth/login', 'Auth\AuthController@getlogin');

	Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@single'])
			->where('slug', '[\w\d\-\_]+');

	Route::get('blog', ['as'=>'blog.index', 'uses'=>'BlogController@index']);

	Route::get('/', 'BlogController@index');

	Route::resource('crud', 'CrudController');

	Route::post('file', 'CrudController@file');

});

