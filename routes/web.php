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

    Auth::routes();
    Route::group(['middleware' => ['authenticated']], function() {// Sample pages of CoreUI
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
        Route::get('/collapse','CoreuiController@getCollapse');
        Route::get('/progress', 'CoreuiController@getProgress');
        Route::get('/list-group','CoreuiController@getListGroup');


        // End Sample Pages
        Route::get('/individual-request','PDFController@pdfIndividualReport');
        Route::get('summarize-report','ApiController@generateSummarizeServiceReport')->name('summarize-report');

        
        Route::get('/htmlReport','PageController@getHtmlReport');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/report', "ReportController@index");
        Route::get('auth/logout', ['as' => 'user.logout','uses' => 'Auth\LoginController@logout']);
        Route::get('home_dashboard', 'PageController@getServiceDashboard');
        Route::get('map_dashboard', 'PageController@getMapDashboard');
        Route::get('calendar', 'PageController@getCalendar');
        Route::get('access-denied','PageController@getErrorDenied');
        Route::get('sendFeedbackFormToClients',['as' => 'sendFeedbackFormToClients', 'uses' =>'EmailController@sendFeedbackFormToClients']);


        Route::post('assignTechnician',['as' => 'assignTechnician', 'uses' =>'RequestUpdateController@assignedTechnician']);
        Route::resource('infrastructure', 'InfrastructureController', ['except' => ['create']]);
        Route::resource('category', 'CategoryController',['except' => ['create']]);
        Route::resource('posts','PostController',['except' => ['changeStatus']]);
        Route::resource('facility', 'FacilityController', ['except' => ['create']]);
        Route::resource('profile', 'ProfileController', ['except' => ['create']]);
        Route::resource('logstatus', 'LogStatusController', ['except' => ['create']]);
        Route::resource('unfiltered','UnfilteredPostController', ['except' => ['create']]);
        Route::resource('status', 'StatusController', ['except' => ['create']]);
        Route::resource('inspection','InspectionController');
        Route::resource('technician','TechnicianController',['except' => ['create']]);
        Route::resource('supply','SupplyController', ['except' => ['create']]);
        Route::resource('maintenance','MaintenanceController', ['except' => ['create']]);
        Route::resource('evaluation','EvaluationController', ['except' => ['create']]);
        Route::resource('facilityImage','FacilityImageController', ['except' => ['create']]);
        Route::resource('brand','BrandController', ['except' => ['create']]);
        Route::resource('facilityproperty','FacilityPropertyController', ['except' => ['create']]);
        Route::resource('property','PropertyCategoryController', ['except' => ['create']]);
        Route::resource('operation','OperationController', ['except' => ['create']]);
        Route::resource('gencapacity','GensetCapacityController', ['except' => ['index','create','edit']]);

        

        Route::match(['get', 'post'],'email', 'EmailController@sampleEmail');
            
        Route::group(['middleware' => ['accman']], function() {
            Route::resource('account','AccountController');
        });
        Route::get('serviceAlerts','EmailController@serviceAlerts')->name('serviceAlerts');
    });
    Route::post('changestatus',['uses' => 'PostController@changeStatus', 'as' => 'changestatus']);

    // PDF Reports
    Route::post('pdfServiceReport',['uses' => 'PDFController@pdfServiceReport', 'as' => 'pdfServiceReport']);
});
