<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Auth::routes();

// Social Logins
Route::get('social/auth/redirect/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('social/auth/{provider}', 'Auth\AuthController@handleProviderCallback');

// Routes for Front
Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');





// Route::get('/admin/login', 'Auth\LoginController@showLoginForm');

// Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index');

    Route::resource('facility', 'Admin\FacilityController');
    Route::resource('destination', 'Admin\DestinationController');
    Route::resource('travel_medium', 'Admin\TravelMediumController');
    Route::resource('hotel', 'Admin\HotelController');
    Route::resource('slider', 'Admin\SliderController');

    Route::get('agency', 'Admin\AgencyController@index');
    Route::delete('agency/{id}', 'Admin\AgencyController@destroy');
    Route::post('agency/{id}/status', 'Admin\AgencyController@status');

    // User Routes
    Route::resource('user', 'Admin\UserController');
    Route::get('user/{id}/profile', 'Admin\UserController@profile');
    Route::put('user/{id}/profile', 'Admin\UserController@update_profile');
    Route::get('user/{id}/setting', 'Admin\UserController@setting');
    Route::put('user/{id}/setting', 'Admin\UserController@update_setting');

    // Route routes
    Route::group(['prefix' => 'destination'], function() {
        Route::get('/{id}/route', 'Admin\DestinationRouteController@index');
        Route::get('/{id}/route/create', 'Admin\DestinationRouteController@create');;
        Route::post('/{id}/route', 'Admin\DestinationRouteController@store');
        Route::get('/{id}/route/{route_id}/edit', 'Admin\DestinationRouteController@edit');
        Route::put('/{id}/route/{route_id}', 'Admin\DestinationRouteController@update');
        Route::delete('/{id}/route/{route_id}', 'Admin\DestinationRouteController@destroy');
    });
});


