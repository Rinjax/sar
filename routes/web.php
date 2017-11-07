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
    return view('login');
})->name('login');

Route::get('/kill', function () {
    Session::flush();
    Auth::logout();
    return view('login');
});


Route::get('logon', 'Auth\LoginController@redirectToProvider')->name('logon');
Route::get('logging', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['auth','menu']], function () {

    Route::get('/dashboard', 'ProfileController@index')->name('dashboard');

    //Profile Routes
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@mobileUpdate')->name('updatemob.post');

    Route::get('/dog', 'DogController@index')->name('dog');
    Route::get('/oto', 'OtoController@index')->name('oto');
    Route::get('/to', 'ToController@index')->name('to');
    Route::post('/addassessment', 'OtoController@index')->name('addAssessment.post');
    
    //Calendar Routes
    Route::get('/calendar', 'CalendarController@index')->name('calendar');
    Route::post('/addEvent', 'CalendarController@addEvent')->name('addTraining')->middleware('event.expired');
    Route::post('/addMockEvent', 'CalendarController@addMockEvent')->name('addMock')->middleware('event.expired');
    Route::post('/attendMockEvent', 'CalendarController@attendMockEvent')->name('attendMock')->middleware('event.expired');
    Route::post('/attendCalEvent', 'CalendarController@attendCalEvent')->name('attendEvent')->middleware('event.expired');
    Route::get('/calEvents', 'CalFeedController@getCalEvents');
    Route::get('/calMocks', 'CalFeedController@getCalMocks');
    Route::get('/modifyEvent/', 'CalendarController@modifyEvent')->name('modify.event.url');
    Route::get('/modifyEvent/{id}', 'CalendarController@modifyEvent')->name('modify.event');
    Route::post('/modifyEvent', 'CalendarController@modifyEventPost')->name('modifyEvent.post');
    
    //Admin Routes
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::post('/addMember', 'AdminController@addMember')->name('addMember');

    //test dev routes
    Route::get('/test', 'TestDevController@index'); 

});



