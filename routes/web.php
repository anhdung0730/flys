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

// index


/*
  Flight routes
*/

// Index
Route::get('/', [
  'uses' => 'FlightController@index',
  'as' => 'index'
]);

// Search flights
Route::get('/flight-list', [
  'uses' => 'FlightController@search',
  'as' => 'searchFlight'
]);

// Create flight
Route::get('/admin/flight/create', [
  'uses' => 'FlightController@create',
  'as' => 'createFlight'
])->middleware('admin');

/*
  Admin routes
*/
Route::get('admin/index', [
  'uses' => 'AdminController@index',
  'as' => 'adminIndex'
])->middleware('admin');

/*
  User routes
*/
Auth::routes();
Route::get('user/update', 'Auth\UpdateController@index')->name('user.update');
Route::post('user/update', 'Auth\UpdateController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home');
