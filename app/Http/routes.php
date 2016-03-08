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
    Route::controller('/','LoginController');
    Route::get('/login', array('as' => 'login', 'uses' => 'LoginController@getLogin'));
    Route::post('/login', array('as' => 'login', 'uses' =>'LoginController@postLogin'));
    Route::get('/logout', array('as' => 'logout', 'uses' =>'LoginController@getLogout'));
});

Route::controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController',
]);

Route::group(['middleware' => 'web'], function () {
    Route::get('/', array('as' => 'home', 'uses' =>'HomeController@indexPage'));
    Route::post('/stats', array('as' => 'stat.save', 'uses' =>'StatController@saveStats'));
});
