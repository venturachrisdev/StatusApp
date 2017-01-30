<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/login', [
		'as'	=> 'login.authenticate',
		'uses'	=> 'loginController@authenticate'
	]);

Route::get('/', [
	'as'	=>	'status.index',
	'uses'	=> 	'StatusController@index'
	]);

Route::group(['middleware' => 'auth'], function() {

	Route::post('/', [
		'as'	=> 'status.create',
		'uses'	=> 'StatusController@create'
		]);

	Route::delete('/', [
		'as'	=> 'status.destroy',
		'uses'	=> 'StatusController@destroy'
		]);

	Route::get('/users/{id}', [
		'as'	=> 'users.show',
		'uses'	=> 'UsersController@show'
		]);



	Route::group([ 'prefix' => 'status'], function() {

		Route::get('/{id?}', [
			'as'	=>	'status.show',
			'uses'	=> 	'StatusController@show'
		]);

	});

	Route::group([ 'prefix' => 'comments'], function() {
		Route::post('/create', [
			'as'	=> 	'comments.create',
			'uses'	=>  'CommentsController@create'
		]);

		Route::delete('/destroy', [
			'as'	=> 'comments.destroy',
			'uses'	=> 'CommentsController@destroy'
		]);

	});

	Route::resource('/users', 'UsersController');


	Route::group([ 'prefix' => 'admin'], function() {
		Route::get('/', [
			'as'	=> 'admin.index',
			'uses'	=> 'AdminController@index'
			]);

		Route::get('/logout', [
			'as'	=> 'admin.logout',
			'uses'	=> 'AdminController@logout'
			]);

		Route::get('/deactivate-accout', [
			'as'	=> 'user.destroy',
			'uses'	=> 'UsersController@destroy'
			]);
	});
});
