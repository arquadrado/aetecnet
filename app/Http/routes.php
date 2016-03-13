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
			'uses' => 'DashboardController@show',
		]);

		Route::get('projects', [
			'as'   => 'projects',
			'uses' => 'DashboardController@projects'
		]);

		Route::get('members', [
			'as'   => 'members',
			'uses' => 'DashboardController@members'
		]);

		Route::get('members/edit/{id?}', [
			'as'   => 'member',
			'uses' => 'DashboardController@edit'
		]);

		Route::post('members/edit/{id?}', [
			'as'   => 'member_submit',
			'uses' => 'DashboardController@submitMember'
		]);

		Route::delete('members/edit/{id?}', [
			'as'   => 'member_delete',
			'uses' => 'DashboardController@deleteMember'
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


