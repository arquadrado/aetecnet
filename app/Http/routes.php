<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', ], function()
{
	Route::get('/', [
		'as'   => 'admin',
		'uses' => 'LoginController@dashboard',
	]);

	Route::get('/login', [
		'as'   => 'login',
		'uses' => 'LoginController@login'
	]);

	Route::post('/login', [
		'as'   => 'post_login',
		'uses' => 'LoginController@authenticate'
	]);

	Route::get('test', [
		'as'   => 'test',
		'uses' => 'DashboardController@show'
	]);

	Route::post('test', [
		'as'   => 'test_post',
		'uses' => 'DashboardController@submit'
	]);

});


/* Frontend routes*/

Route::get('/', [
	'as'   => 'home',
	'uses' => 'FrontEndController@mainPage',
]);

Route::get('/projects/{company}', [
	'as'   => 'project',
	'uses' => 'FrontEndController@showProject'
]);


