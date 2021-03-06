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

		Route::get('projects/edit/{id?}', [
			'as'   => 'project',
			'uses' => 'DashboardController@editProject'
		]);

		Route::post('projects/edit/{id?}', [
			'as'   => 'project_submit',
			'uses' => 'DashboardController@submitProject'
		]);

		Route::delete('projects/edit/{id?}', [
			'as'   => 'project_delete',
			'uses' => 'DashboardController@deleteProject'
		]);

		Route::get('members', [
			'as'   => 'members',
			'uses' => 'DashboardController@members'
		]);

		Route::get('members/edit/{id?}', [
			'as'   => 'member',
			'uses' => 'DashboardController@editMember'
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

Route::get('/projects/{company}/{projectId?}', [
	'as'   => 'projects_page',
	'uses' => 'FrontEndController@showProjects'
]);


