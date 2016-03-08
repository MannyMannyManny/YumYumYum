<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['namespace'=>'Admin', 'prefix' => 'admin', 'middleware' => 'web'], function()
{
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/users', 'UsersController');
    //As used for horizontal menu
    Route::get('/settings', array('as'=>'settings', 'uses'=>'SettingsController@index'));
    Route::post('/settings', 'SettingsController@saveSetting');
    Route::controller('/','LoginController');
    Route::get('/login', 'LoginController@getLogin');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/logout', 'LoginController@getLogout');
});

Route::controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController',
]);

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@indexPage');
    Route::post('/stats', 'StatController@saveStats');
});
