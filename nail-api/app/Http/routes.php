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

Route::get('/', function () {
    return view('welcome');
});

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

Route::group(['middleware' => ['web']], function () {
    //
    Route::auth();
    Route::get('nailist/home', 'HomeController@index');
    Route::controller('nailist/profile', 'ProfilesController');
    Route::controller('nailist/schedules', 'SchedulesController');
    Route::controller('nailist/others', 'OthersController');
    Route::get('users/home', 'UserController@index');
    Route::get('users/map', 'UserController@map');
    Route::controller('users/reservations', 'ReservationsController');
    Route::controller('nailist/portfolio', 'PortfoliosController');

    /*
    // Route::controller('nailist/talks', 'TalksController');
    // Route::controller('nailist/info', 'InfoController');
    // Route::controller('nailist/service', 'ServiceController');
    // Route::controller('nailist/guide', 'GuideController'); */

});
