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

/*
 * this function is an auto created one from artisan command. links to routes for
 * get/post login, register, password resets
 * 
 * Auth::routes();
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kill', function () {
    Session::flush();
    return view('welcome');
});


Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('logging', 'Auth\LoginController@handleProviderCallback');

Route::get('/dashboard', 'DashboardController@index') ->middleware('auth','menu')->name('dashboard');

//Profile Routes
Route::get('/profile', 'ProfileController@index') ->middleware('auth','menu')->name('profile');
Route::post('/profile', 'ProfileController@mobileUpdate');

Route::get('/dog', 'DogController@index') ->middleware('auth','menu')->name('dog');
Route::get('/oto', 'OtoController@index') ->middleware('auth','menu')->name('oto');

//Calendar Routes
Route::get('/calendar', 'CalendarController@index') ->middleware('menu')->name('calendar');
Route::post('/addEvent', 'CalendarController@addEvent');
Route::post('/addMockEvent', 'CalendarController@addMockEvent');
Route::post('/attendMockEvent', 'CalendarController@attendMockEvent');
Route::post('/attendCalEvent', 'CalendarController@attendCalEvent');
Route::get('/calEvents', 'CalFeedController@getCalEvents');
Route::get('/calMocks', 'CalFeedController@getCalMocks');
