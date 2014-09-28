<?php
/**
 * Route patterns
 */
Route::pattern('id', '[0-9]+');
// Route::pattern('uuid', '[a-f0-9]{8}-[a-f0-9]{4}-4[a-f0-9]{3}-[89aAbB][a-f0-9]{3}-[a-f0-9]{12}');

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
		Route::post('{id}/edit', ['uses' => 'DashboardSensorsController@postEdit', 'before' => 'csrf']);

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



/***
* Payments
*/
Route::group(['before' => 'auth', 'prefix' => 'payment'], function() {
	Route::get('/', ['uses' => 'PaypalPaymentController@create']);
	Route::get('list', ['uses' => 'PaypalPaymentController@getAll']);
	Route::get('confirmpayment', ['uses' => 'PaypalPaymentController@getConfirmpayment']);
});
/**
 * API
 */

Route::group(['prefix' => 'api'], function() {
	Route::get('locate/{latitude}/{longitude}/{areasize?}', ['as' => 'api.locate', 'uses' => 'ApiController@locateSensors']);

	Route::group(['prefix' => 'sensor'], function() {
		Route::post('/', ['as' => 'api.sensor.upload', 'uses' => 'ApiController@sensorUpload']);

		Route::get('{uuid}', ['as' => 'api.sensor.upload', 'uses' => 'ApiController@sensorInfo']);

		Route::get('{uuid}/{from?}/{to?}', ['as' => 'api.sensors.data', 'uses' => "ApiController@sensorData"]);
	});
});