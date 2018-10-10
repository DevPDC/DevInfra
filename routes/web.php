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

Route::group(['middleware' => ['web']], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    // Sample pages of CoreUI
    Route::get('/toast', 'CoreuiController@getToastr');
    Route::get('/coreicons','CoreuiController@getCoreIcons');
    Route::get('/alerts','CoreuiController@getAlerts');
    Route::get('/datatable','CoreuiController@getDatatable');
    Route::get('/fawesome','CoreuiController@getFawesome');
    Route::get('/dashboard','CoreuiController@getDashboard');
    Route::get('/simpleicons','CoreuiController@getSimpleIcons');
    Route::get('/loadbuttons','CoreuiController@getLoadingButtons');
    Route::get('/advforms','CoreuiController@getAdvForms');
    Route::get('/calendar','CoreuiController@getCalendar');
    Route::get('/basicforms','CoreuiController@getBasicForms');
    // End Sample Pages
    Route::get('auth/logout', ['as' => 'user.logout','uses' => 'Auth\LoginController@logout']);
    Route::get('/', ['uses' => 'PageController@getIndex', 'as' => 'home_dashboard']);
    Route::get('dashboard', 'PageController@getDashboard');
    Route::get('calendar', 'PageController@getCalendar');
    Route::resource('infrastructure', 'InfrastructureController', ['except' => ['create']]);
    Route::resource('category', 'CategoryController',['except' => ['create']]);
    Route::resource('posts','PostController',['except' => ['changeStatus']]);
    Route::resource('facility', 'FacilityController', ['except' => ['create']]);
    Route::resource('status', 'StatusController', ['except' => ['create']]);
    Route::resource('profile', 'ProfileController', ['except' => ['create']]);
    Route::resource('logstatus', 'LogStatusController', ['except' => ['create']]);
    Route::resource('inspection', 'InspectionController');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/report', "ReportController@index");
    Route::resource('supply','SupplyController', ['except' => ['create']]);
    
    Route::get('api/postlogs',['uses' => 'ApiController@getIdentPostLog']);    
    Route::get('api/allPostSupplies','ApiController@getPostSupplies')->name('api/allPostSupplies');
    


    

});
Route::post('changestatus',['uses' => 'PostController@changeStatus', 'as' => 'changestatus']);
