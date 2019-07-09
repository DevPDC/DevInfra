<?php

use Illuminate\Http\Request;
use Eastwest\Json\Facades\Json;
use Illuminate\Database\Eloquent\Collection;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api/postlogs',['uses' => 'ApiController@getIdentPostLog'])->name('api/postlogs');    
Route::get('api/allPostSupplies','ApiController@getPostSupplies')->name('api/allPostSupplies');
Route::get('api/allUserRequests', 'ApiController@getRequestOfUser')->name('api/allUserRequests');
Route::get('api/getServiceCategories', 'ApiController@getServiceCategories')->name('api/getServiceCategories');
Route::post('api/allFacilitiesInInfrastructure', 'ApiController@getFacilitiesInInfrastructure')->name('api/allFacilitiesInInfrastructure');
Route::get('api/allTechnicians','ApiController@getAllTechnicians')->name('api/allTechnicians');
Route::get('api/allRegisteredUsers','ApiController@getAllRegisteredUsers')->name('api/AllRegisteredUsers');
Route::get('api/assignedTechnician','ApiController@getAssignedTechnician')->name('api/assignedTechnician');
Route::get('api/getFilteredFacilities','ApiController@getFilteredFacilities')->name('api/getFilteredFacilities');
Route::get('api/allMarkers','ApiController@getAllMarkers')->name('api/allMarkers');
Route::get('api/allBrandsSelect','ApiController@getBrands')->name('api/allBrandsSelect');
Route::get('api/allSuppliesSelect','ApiController@getSupplies')->name('api/allSuppliesSelect'); 
Route::get('api/coordinatesOfFacility','ApiController@getCoordinateOfFacility')->name('api/coordinatesOfFacility');
Route::get('api/searchTicketDetails','ApiController@getTicketDetails')->name('api/searchTicketDetails');
Route::get('api/getReceiver','ApiController@getReceiver')->name('api/getReceiver');
Route::get('api/getFacilityProperties','ApiController@getFacilityProperties')->name('api/getFacilityProperties');
Route::get('api/WaterTank','ApiController@getWaterTank')->name('api/WaterTank');
Route::get('api/WaterCanal','ApiController@getWaterCanal')->name('api/WaterCanal');
Route::get('api/WaterPump','ApiController@getWaterPump')->name('api/WaterPump');
Route::get('api/GenSet','ApiController@getGeneratorSet')->name('api/GenSet');
Route::get('api/Drainage','ApiController@getDrainage')->name('api/Drainage');
Route::get('api/Building','ApiController@getBuilding')->name('api/Building');
Route::get('api/Trees','ApiController@getTrees')->name('api/Trees');
Route::get('api/getTicketNumber','ApiController@getTicketNumber')->name('api/getTicketNumber');
Route::get('api/getFacilityPropertiesDatable','ApiController@getFacilityPropertiesDatable')->name('api/getFacilityPropertiesDatable');
Route::get('api/getGeneratorCapacity','ApiController@getGeneratorCapacity')->name('api/getGeneratorCapacity');
Route::get('api/getCategorySelect','ApiController@getCategorySelect')->name('api/getCategorySelect');
Route::get('api/getStatusSelect','ApiController@getStatusSelect')->name('api/getStatusSelect');

Route::post('api/getFacilitySpecifications','ApiController@getFacilitySpecifications')->name('api/getFacilitySpecifications');
Route::post('api/getLatestLog','ApiController@getLatestLog')->name('api/getLatestLog');
Route::post('api/getProgress','ApiController@getProgress')->name('api/getProgress');
Route::post('api/getPercentageOfGenset','ApiController@getPercentageOfGenset')->name('api/getPercentageOfGenset');
Route::post('api/getGensetOperation','ApiController@getGensetOperation')->name('api/getGensetOperation');
Route::post('api/getCurrentOperationHours','ApiController@getCurrentOperationHours')->name('api/getCurrentOperationHours');
Route::post('api/getTotalOperationHours','ApiController@getTotalOperationHours')->name('api/getTotalOperationHours');
Route::post('api/revertCurrentOperation','ApiController@revertCurrentOperation')->name('api/revertCurrentOperation');
Route::post('api/getGensetAllOperation','ApiController@getGensetAllOperation')->name('api/getGensetAllOperation');
Route::post('api/getRequesterProfile','ApiController@getRequesterProfile')->name('api/getRequesterProfile');
Route::post('api/delFacility','ApiController@delFacility')->name('api/delFacility');
Route::post('api/storeGeneratorCapacity','ApiController@storeGeneratorCapacity')->name('api/storeGeneratorCapacity');
Route::post('api/modifyGeneratorCapacity','ApiController@modifyGeneratorCapacity')->name('api/modifyGeneratorCapacity');
Route::post('api/insertNewServiceRequest','ApiController@insertNewServiceRequest')->name('api/insertNewServiceRequest');
Route::post('api/getServiceReport','ApiController@getServiceReport')->name('api/getServiceReport');
Route::post('api/updateStatusToReceived','ApiController@updateStatusToReceived')->name('api/updateStatusToReceived');
Route::post('api/insertNewFacility','ApiController@insertNewFacility')->name('api/insertNewFacility');
Route::post('api/modifyTechnician','ApiController@modifyTechnician')->name('api/modifyTechnician');
Route::post('api/cancelRequest','ApiController@cancelRequest')->name('api/cancelRequest');
Route::post('api/getCurrentStatus','ApiController@getCurrentStatus')->name('api/getCurrentStatus');
Route::get('api/insertEvaluation','ApiController@insertEvaluation')->name('api/insertEvaluation');


Route::get('sendRequestsAlert', [
    'as' => 'sendRequestsAlert',
    'uses' => 'ApiController@sendServiceRequestsAlert'
]);

// 
Route::get('/serverSidePosts', [
    'as'   => 'serverSidePosts',
    'uses' => function () {
        $posts = App\Posts::join('lib_categories','=','service_requests.category.id')
                            ->join('lib_status.id','=','service_requests.status_id')
                            ->select(['id','category_name','request_details','created_at','status_name'])
                            ->get();
        return Datatables::of($posts)->make();
    }
]);

// All Facilities
Route::get('serverSideFacilities', [
    'as'   => 'serverSideFacilities',
    'uses' => function () {
        $ssFacilities = App\Facility::select(['id','name','details'])->get();

        return Datatables::of($ssFacilities)
            ->addColumn('action', function ($ssFacilities) {
                return '<a class="btn btn-sm btn-dark btn-view" id="btn-view"><i class="fa fa-search"></i></a>';
            })
            ->escapeColumns([0,1,2,'action'])
            ->make();
    }
]);
// End All Facilities

// All Filtered Posts API
Route::get('/api.allPosts',[
    'as'    =>  'api.allPosts',
    'uses'  =>  function() {
        $allPosts = App\Posts::join('lib_status','status_id','lib_status.id')
                            ->join('lib_categories','category_id','lib_categories.id')
                            ->select('service_requests.id','emp_idno','category_name','request_title','request_details','created_at','status_name','status_id')
                            ->where('status_id','!=', '1')
                            ->where('status_id','!=', '8')
                            ->where('status_id','!=', '9')
                            ->orderBy('service_requests.id','desc')
                            ->get();

        
        return Datatables::of($allPosts)
            ->addColumn('action', function ($allPosts) {
                return '<a href="'.route("posts.show",$allPosts->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
            })
            ->addColumn('date_created', function ($allPosts) {
                $date = date('M d, Y', strtotime($allPosts->created_at));
                return $date;
            })
            ->addColumn('details', function ($allPosts) {
                switch ($allPosts->status_id){
                    case 2:
                        $html = '<span class="badge badge-pill badge-dark pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'</span>';
                        break;

                    case 3:
                        $html = '<span class="badge badge-pill badge-primary pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'</span>';
                        break;

                    case 4:
                        $html = '<span class="badge badge-pill badge-info pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'.</span>';
                        break;

                    case 5:
                        $html = '<span class="badge badge-pill badge-warning pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'.</span>';
                        break;

                    case 7:
                        $html = '<span class="badge badge-pill badge-warning pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'.</span>';
                        break;

                    case 6:
                        $html = '<span class="badge badge-pill badge-secondary pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'.</span>';
                        break;

                    case 8 || 9:
                        $html = '<span class="badge badge-pill badge-success pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPosts->status_name.'.</span>';
                        break;
                }
                return '<span style="font-weight: bold; text-transform: capitalize">Title: </span><span style="text-transform: capitalize">'.$allPosts->request_title.'</span>  '.$html.'<br><span style="font-weight: bold">Details: </span>'.$allPosts->request_details;
            })
            ->addColumn('name', function($allPosts) {
                $name = App\Profile::select('emp_fullname')
                                ->where('emp_idno',$allPosts->emp_idno)
                                ->first();
                
                return $name->emp_fullname;
            })
            ->escapeColumns([0,1,2,3,4,5,6,7,'action','date_created','details','name'])
            ->make();
    }
]);
// End All Post API

// All Filtered Posts API
Route::get('/api.allPostsInStatus',[
    'as'    =>  'api.allPostsInStatus',
    'uses'  =>  function(Request $request) {

        
        $statid = $request->id;

        $allPostsStatus = App\Posts::join('lib_status','status_id','=','lib_status.id')
                            ->join('lib_categories','category_id','=','lib_categories.id')
                            ->select('service_requests.id','emp_idno','category_name','request_title','request_details','created_at','status_name','status_id')
                            ->where('status_id',$statid)
                            ->orderBy('service_requests.id','desc')
                            ->get();

        
        return Datatables::of($allPostsStatus)
            ->addColumn('action', function ($allPostsStatus) {
                return '<a href="'.route("posts.show",$allPostsStatus->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
            })
            ->addColumn('date_created', function ($allPostsStatus) {
                $date = date('M d, Y', strtotime($allPostsStatus->created_at));
                return $date;
            })
            ->addColumn('details', function ($allPostsStatus) {
                switch ($allPostsStatus->status_id){
                    case 2:
                        $html = '<span class="badge badge-pill badge-dark pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'</span>';
                        break;

                    case 3:
                        $html = '<span class="badge badge-pill badge-primary pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'</span>';
                        break;

                    case 4:
                        $html = '<span class="badge badge-pill badge-info pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'.</span>';
                        break;

                    case 5:
                        $html = '<span class="badge badge-pill badge-warning pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'.</span>';
                        break;

                    case 7:
                        $html = '<span class="badge badge-pill badge-warning pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'.</span>';
                        break;

                    case 6:
                        $html = '<span class="badge badge-pill badge-secondary pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'.</span>';
                        break;

                    case 8 || 9:
                        $html = '<span class="badge badge-pill badge-success pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsStatus->status_name.'.</span>';
                        break;
                }
                return '<span style="font-weight: bold; text-transform: capitalize">Title: </span><span style="text-transform: capitalize">'.$allPostsStatus->request_title.'</span>  '.$html.'<br><span style="font-weight: bold">Details: </span>'.$allPostsStatus->request_details;
            })
            ->addColumn('name', function($allPostsStatus) {
                $name = App\Profile::select('emp_fullname')
                                ->where('emp_idno',$allPostsStatus->emp_idno)
                                ->first();
                
                return $name->emp_fullname;
            })
            ->escapeColumns([0,1,2,3,4,5,6,7,'action','date_created','details','name'])
            ->make();
    }
]);

// All Unfiltered Posts API
Route::get('/api.allUnfilteredPosts',[
    'as'    =>  'api.allUnfilteredPosts',
    'uses'  =>  function() {
        $allUnfilteredPosts = App\Posts::join('lib_status','status_id','=','lib_status.id')
                            ->join('lib_categories','category_id','=','lib_categories.id')
                            ->join('hris.employees','service_requests.emp_idno','employees.emp_idno')
                            ->select('service_requests.id','emp_fullname','category_name','request_title','request_details','created_at','status_name')
                            ->where('status_id','1')
                            ->orderBy('service_requests.id','desc')
                            ->get();
        return Datatables::of($allUnfilteredPosts)
            ->addColumn('action', function ($allUnfilteredPosts) {
                return '<a href="'.route("posts.show",$allUnfilteredPosts->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="modal" id="generateReport" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>
                        ';
            })
            ->escapeColumns([0,1,2,3,4,5,6,7,'action'])
            ->make();
    }
]);
// End All Unfiltered Post API

// All Posts in Category API
Route::get('allPostsInCategory',[
    'as'    =>  'allPostsInCategory',
    'uses'  =>  function(Request $request) {
        $allPostsInCategory = App\Posts::join('lib_status','status_id','=','lib_status.id')
                                    ->join('lib_categories','category_id','=','lib_categories.id')
                                    ->join('hris.employees','service_requests.emp_idno','employees.emp_idno')
                                    ->select('service_requests.id','emp_fullname','category_name','request_title','request_details','status_name','status_id','created_at')
                                    ->where('category_id',$request->id)
                                    ->orderBy('service_requests.id','desc')
                                    ->get();

        return Datatables::of($allPostsInCategory)
        ->addColumn('status', function ($allPostsInCategory) {
            switch ($allPostsInCategory->status_id){
                case 2:
                    $html = '<span class="badge badge-pill badge-dark pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'</span>';
                    break;

                case 3:
                    $html = '<span class="badge badge-pill badge-primary pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'</span>';
                    break;

                case 4:
                    $html = '<span class="badge badge-pill badge-info pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'.</span>';
                    break;

                case 5:
                    $html = '<span class="badge badge-pill badge-warning pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'.</span>';
                    break;

                case 7:
                    $html = '<span class="badge badge-pill badge-warning pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'.</span>';
                    break;

                case 6:
                    $html = '<span class="badge badge-pill badge-secondary pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'.</span>';
                    break;

                case 8 || 9:
                    $html = '<span class="badge badge-pill badge-success pull-right" style="font-family: arial; letter-spacing: 2px">'.$allPostsInCategory->status_name.'.</span>';
                    break;
            }
        })
        ->addColumn('action', function ($allPostsInCategory) {
            return '<a href="'.route("posts.show",$allPostsInCategory->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('date_created', function ($allPostsInCategory) {
            $date = date('M d, Y', strtotime($allPostsInCategory->created_at));
            return $date;
        })
        ->addColumn('details', function ($allPostsInCategory) {
            return '<span style="font-weight: bold">Title: </span><span style="text-transform: capitalize">'.$allPostsInCategory->request_title.'</span><br><span style="font-weight: bold">Details: </span>'.$allPostsInCategory->request_details;
        })
        ->escapeColumns([0,1,2,3,4,5,6,7,'status','action','date_created','details'])
        ->make();
    }
]);
// End All Posts in Category API

// Identified Post - Inspection API
Route::get('identInspection',[
    'as'    =>  'identInspection',
    'uses'  =>  function(Request $request) {
        $identInspection    =   App\Inspection::select('details','recommendation','proposed_schedule','load_points')
                                                ->where('posts_id',$request->id)
                                                ->first();
            
            return $identInspection->toJson(JSON_PRETTY_PRINT);

            
    }
]);
// End Identified Post - Inspection API

// Schedules of Service Request
Route::get('allScheduledRequests',[
    'as'    =>  'allScheduledRequests',
    'uses'  =>  function() {
        $allScheduledRequests = App\Posts::join('lib_status','status_id','=','lib_status.id')
                                    ->join('inspections','service_requests.id','=','inspections.posts_id')
                                    ->select('service_requests.id AS id','inspections.proposed_schedule AS start','request_title AS title')
                                    ->get();

        foreach($allScheduledRequests as $req)
        {
            $currdate = date('Y-m-d');
            $start = date($req['start']);

            if($start < $currdate)
            {
                $first = $req['backgroundColor'] = 'rgb(9, 153, 25)';
                $second = $req["url"] = route("posts.show",$req->id);
                $third = $req['borderColor'] = 'rgb(9, 153, 25)';
                $req .= $first;
                $req .= $second;
                $req .= $third;
            }
            elseif($start == $currdate)
            {
                $first = $req['backgroundColor']  = 'rgb(210, 141, 1)';
                $second = $req["url"] = route("posts.show",$req->id);
                $third = $req['borderColor'] = 'rgb(210, 141, 1)';
                $req .= $first;
                $req .= $second;
                $req .= $third;
            }
            elseif($start > $currdate)
            {
                $first = $req['backgroundColor'] = 'rgb(211, 2, 12)';
                $second = $req["url"] = route("posts.show",$req->id);
                $third = $req['borderColor'] = 'rgb(211, 2, 12)';
                $req .= $first;
                $req .= $second;
                $req .= $third;
            }
        }

        return $allScheduledRequests->toJson(JSON_PRETTY_PRINT);
        }
]);
// End Schedules

// All Posts in Category API
Route::get('allPostsIndividual',[
    'as'    =>  'allPostsIndividual',
    'uses'  =>  function(Request $request) {
        $allPostsIndividual = App\Posts::join('lib_status','status_id','=','lib_status.id')
                                    ->join('lib_categories','category_id','=','lib_categories.id')
                                    ->select('service_requests.id','user_id','category_name','request_details','status_name','created_at')
                                    ->where('service_requests.user_id',$request->userid)
                                    ->orderBy('service_requests.id','desc')
                                    ->get();

        return Datatables::of($allPostsIndividual)
            ->addColumn('action', function ($allPostsIndividual) {
                return '<a href="'.route("posts.show",$allPostsIndividual->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>';
            })
            ->escapeColumns([0,1,2,3,4,5,'action'])
            ->make();
        }
]);
// End All Posts in Category API

// All Posts in Category API
Route::get('allPostsDivision',[
    'as'    =>  'allPostsDivision',
    'uses'  =>  function(Request $request) {
        $allPostsDivision = App\Posts::join('lib_status','status_id','=','lib_status.id')
                                    ->join('lib_categories','category_id','=','lib_categories.id')
                                    ->join('hris.employees','user_id','=','employees.emp_idno')
                                    ->select('service_requests.id','user_id','category_name','request_details','status_name','created_at')
                                    ->where('emp_division',$request->divid)
                                    ->orderBy('service_requests.id','desc')
                                    ->get();

        return Datatables::of($allPostsDivision)
            ->addColumn('action', function ($allPostsDivision) {
                return '<a href="'.route("posts.show",$allPostsDivision->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>';
            })
            ->escapeColumns([0,1,2,3,4,5,'action'])
            ->make();
        }
]);
// End All Posts in Category API

// Search By Employee ID

Route::post('searchByEmpid', [
    'as' => 'searchByEmpid',
    'uses' => function(Request $request) 
    {
        $result = App\Profile::join('lib_divisions','emp_division','=','lib_divisions.id_division')
                                ->join('lib_stations','emp_station','=','lib_stations.id_station')
                                ->select('emp_idno','emp_fullname','division_name','station_name','emp_email_official')
                                ->where('emp_idno',$request->id)
                                ->first();
        if($result['emp_fullname'] !== null)
        {
            return $result->toJson(JSON_PRETTY_PRINT);
        }
        elseif($result['emp_fullname'] === null)
        {
            $res['emp_idno'] = 'No Result';
            $res['emp_fullname'] = 'No Result';
            $res['division_name'] = 'No Result';
            $res['station_name'] = 'No Result';
            $res['emp_email_official'] = 'No Result';

            return $res->toJson(JSON_PRETTY_PRINT);
        }
                                
    }
]);

Route::get('technicianOptions', [
    'as' => 'technicianOptions',
    'uses' => function(){
        $options = App\Technician::join('hris.employees','user_idno','=','employees.emp_idno')
                                ->select('technicians.id','emp_fullname')
                                ->orderBy('id','ASC')
                                ->get();

        return $options->toJson(JSON_PRETTY_PRINT);
    }
]);

Route::get('allFacilitiesInSelect2', [
        'as' => 'allFacilitiesInSelect2',
        'uses' => function() {
            $facilities = App\Facility::select('id','name')
                                        ->get();

            return $facilities->toJson(JSON_PRETTY_PRINT);
        }
]);

Route::get('allFacilitiesCategoryInSelect2', [
    'as' => 'allFacilitiesCategoryInSelect2',
    'uses' => function() {
        $facilities = App\Infrastructure::select('id','infra_name')
                                    ->get();

        return $facilities->toJson(JSON_PRETTY_PRINT);
    }
]);

Route::get('AllScheduledFacilityMaintenance', [
    'as' => 'AllScheduledFacilityMaintenance',
    'uses' => function(){
        $maintenances = App\Maintenance::join('facilities','facility_id','=','facilities.id')
                                        ->select('facilities.id AS id','facilities.name AS title','maintenance_schedule as start')
                                        ->get();

        foreach($maintenances as $maintenance)
        {
            $currdate = date('Y-m-d');
            $start = date($maintenance['start']);
        
            if($start < $currdate)
            {
                $first = $maintenance['backgroundColor'] = 'rgb(9, 153, 25)';
                $second = $maintenance["url"] = route("facility.show",$maintenance->id);
                $third = $maintenance['borderColor'] = 'rgb(9, 153, 25)';
                $maintenance .= $first;
                $maintenance .= $second;
                $maintenance .= $third;
            }
            elseif($start == $currdate)
            {
                $first = $maintenance['backgroundColor']  = 'rgb(211, 2, 12)';
                $second = $maintenance["url"] = route("facility.show",$maintenance->id);
                $third = $maintenance['borderColor'] = 'rgb(211, 2, 12)';
                $maintenance .= $first;
                $maintenance .= $second;
                $maintenance .= $third;
            }
            elseif($start > $currdate)
            {
                $first = $maintenance['backgroundColor'] = 'rgb(0, 153, 255)';
                $second = $maintenance["url"] = route("facility.show",$maintenance->id);
                $third = $maintenance['borderColor'] = 'rgb(0, 153, 255)';
                $maintenance .= $first;
                $maintenance .= $second;
                $maintenance .= $third;
            }
        }
        
        return $maintenances->toJson(JSON_PRETTY_PRINT);

    }
]);
// End Search


// All Supplies API
Route::get('api/allSupplies',[
    'as'    =>  'api/allSupplies',
    'uses'  =>  function() {
        $allSupplies = App\Supply::join('lib_supply_brands','brand_id','=','lib_supply_brands.id')
                            ->select('supplies.id','supply_name','brand_name','quantity','supplies.created_at','supplies.updated_at')
                            ->get();
        
        return Datatables::of($allSupplies)
            ->addColumn('action', function ($allSupplies) {
                return '<a href="'.route("supply.show",$allSupplies->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        ';
            })
            ->escapeColumns([0,1,2,3,4,5,'action'])
            ->make();
    }
]);
// End All Supplies API