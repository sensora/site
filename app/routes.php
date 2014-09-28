<?php
/**
 * Route patterns
 */
Route::pattern('id', '[0-9]+');

/**
 * Generic
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Authentication
 */
Route::group(['before' => 'guest'], function() {
	Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
	Route::post('login', ['uses' => 'AuthController@postLogin', 'before' => 'csrf']);

	Route::get('register', ['as' => 'auth.register', 'uses' => 'AuthController@getRegister']);
	Route::post('register', ['uses' => 'AuthController@postRegister', 'before' => 'csrf']);
});

Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout', 'before' => 'auth']);

/**
 * Dashboard
 */
Route::group(['before' => 'auth', 'prefix' => 'dashboard'], function() {
	Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

	Route::group(['prefix' => 'sensors'], function() {
		Route::get('/', ['as' => 'dashboard.sensors.index', 'uses' => 'DashboardSensorsController@index']);

		Route::get('add', ['as' => 'dashboard.sensors.add', 'uses' => 'DashboardSensorsController@getAdd']);
		Route::post('add', ['uses' => 'DashboardSensorsController@postAdd', 'before' => 'csrf']);

		Route::get('{id}/edit', ['as' => 'dashboard.sensors.edit', 'uses' => 'DashboardSensorsController@getEdit']);
		Route::get('{id}/delete', ['as' => 'dashboard.sensors.delete', 'uses' => 'DashboardSensorsController@getDelete']);
	});
});

/**
 * Profile
 */
Route::group(['before' => 'auth', 'prefix' => 'profile'], function() {
	Route::get('/', ['as' => 'profile.index', 'uses' => 'ProfileController@index']);

	Route::get('update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

	Route::get('api', ['as' => 'profile.api.index', 'uses' => 'ProfileController@apiKeyIndex']);
	Route::post('api/generate', ['as' => 'profile.api.generate', 'uses' => 'ProfileController@generateApiKey', 'before' => 'csrf']);
	Route::post('api/revoke', ['as' => 'profile.api.revoke', 'uses' => 'ProfileController@revokeApiKey', 'before' => 'csrf']);
});

/**
 * API
 */
Route::group(['prefix' => 'api/v1'], function() {
	Route::get('/', ['uses' => 'ApiController@index']);
});