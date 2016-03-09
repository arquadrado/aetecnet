<?php

Route::group(['middleware' => ['web']], function () {

	Route::get('/login', [
		'as'   => 'login',
		'uses' => 'Admin\LoginController@login'
	]);

	Route::post('/login', [
		'as'   => 'post_login',
		'uses' => 'Admin\LoginController@authenticate'
	]);

	Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function()
	{
		Route::get('/', [
			'as'   => 'admin',
			'uses' => 'LoginController@dashboard',
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


