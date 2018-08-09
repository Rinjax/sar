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
    if(\Illuminate\Support\Facades\Auth::user()) return redirect('dashboard');
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

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Profile Routes
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@mobileUpdate')->name('updatemob.post');

    Route::get('/dog', 'DogController@index')->name('dog')->middleware('has.permission:Dog Menu');
    Route::get('/oto', 'OtoController@index')->name('oto');
    Route::get('/to', 'ToController@index')->name('to');
    Route::post('/addassessment', 'OtoController@index')->name('addAssessment.post');
    
    //Calendar Routes
    Route::get('/calendar', 'CalendarController@index')->name('calendar');
    Route::post('/addEvent', 'CalendarController@addEvent')->name('addTraining')->middleware('event.expired');
    Route::post('/addMockEvent', 'CalendarController@addEvent')->name('addMock')->middleware('event.expired');
    Route::post('/attendMockEvent', 'CalendarController@attendEvent')->name('attendMock')->middleware('event.expired');
    Route::post('/attendCalEvent', 'CalendarController@attendEvent')->name('attendEvent')->middleware('event.expired');
    Route::get('/calEvents', 'CalFeedController@getCalEvents');
    Route::get('/calMocks', 'CalFeedController@getCalMocks');
    Route::get('/modifyEvent/', 'CalendarController@modifyEvent')->name('modify.event.url')->middleware('has.permission:dev'); // this one is just used to generate the url for modal
    Route::get('/modifyEvent/{id}', 'CalendarController@modifyEvent')->name('modify.event')->middleware('has.permission:sec|dev');
    Route::post('/modifyEvent', 'CalendarController@modifyEventPost')->name('modifyEvent.post')->middleware('has.permission:Secretary|dev');
    
    Route::get('/timesheet/{id}', 'CalendarController@timesheetIndex')->name('timesheet')->middleware('has.permission:Secretary|dev');
    Route::post('/timesheet', 'CalendarController@timesheetPost')->name('timesheet.post')->middleware('has.permission:Secretary|dev');
    
    //Admin Routes
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::post('/addMember', 'AdminController@addMember')->name('addMember');
    Route::get('/permissions', 'AdminController@permissionIndex')->name('permissions');
    Route::get('/admin/addasset', 'AdminController@addAssetIndex')->name('permissions');

    //location
    Route::get('/traininglocations', 'LocationController@index')->name('location.index');
    Route::get('/traininglocations/{id}', 'LocationController@Location');

    //Equipment Officer
    Route::get('/eo', 'EoController@index')->name('equipment.index');
    
    //file system
    Route::get('/filesystem', 'FileSystemController@index')->name('filesystem.index');
    Route::post('/filesystem/upload', 'FileSystemController@uploadPoliceVettingForm')->name('filesystem.upload.policevet');

    Route::get('/test', 'TestDevController@index');


});


// function routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/permission-members/{id}', 'AdminController@getPermissionMembers')->name('permission.members');
    Route::post('/permission-member' , 'AdminController@addPermissionMembers')->name('addPermission.post');
    Route::post('/permission-member/remove', 'AdminController@removePermissionMembers')->name('removePermission.post');
    Route::post('/assessment/addsecondassessor', 'CalendarController@addSecondAssessor')->name('addSecondAssessor');
});

//test dev routes

Route::get('/mail', 'EmailController@sendTest');

Route::get('ical', 'TestDevController@ical');
/*
Route::get('/mail', function(){
   return new \App\Mail\firstTest();
});
*/

Route::get('/jeff', function() {

    $g = new \Google_Client();
    $g->useApplicationDefaultCredentials();
    $g->setScopes([Google_Service_Calendar::CALENDAR]);
    $g->setSubject('steve.temple@searchdogssussex.com');

    $s = new Google_Service_Calendar($g);

    $e = $s->events->quickAdd('primary', 'Training at Duncton on August 23rd 10am');

    dd($e);


});


