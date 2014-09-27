<?php
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Auth routes
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
	});
});