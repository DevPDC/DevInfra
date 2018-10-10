<?php

use Illuminate\Http\Request;
use Eastwest\Json\Facades\Json;


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



Route::get('/serverSidePosts', [
    'as'   => 'serverSidePosts',
    'uses' => function () {
        $posts = App\Posts::join('lib_categories','=','service_requests.category.id')
                            ->join('lib_status.id','=','service_requests.status_id')
                            ->select(['id','user_id','category_name','request_details','created_at','status_name'])
                            ->get();
        return Datatables::of($posts)->make();
    }
]);

Route::get('serverSideFacilities', [
    'as'   => 'serverSideFacilities',
    'uses' => function () {
        $ssFacilities = App\Facility::select(['id','name','details'])->get();
        return Datatables::of($ssFacilities)->make();
    }
]);

Route::get('/api.allPosts',[
    'as'    =>  'api.allPosts',
    'uses'  =>  function() {
        $allPosts = App\Posts::join('lib_status','status_id','=','lib_status.id')
                            ->join('lib_categories','category_id','=','lib_categories.id')
                            ->select('service_requests.id','user_id','category_name','request_details','created_at','status_name')
                            ->orderBy('service_requests.id','desc')
                            ->get();
        return Datatables::of($allPosts)
            ->addColumn('action', function ($allPosts) {
                return '<a href="'.route("posts.show",$allPosts->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        <button type="button" id="changeStatusButton" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>   
                        <a href="#" data-toggle="modal" id="generateReport" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>
                        ';
            })
            ->make();
    }
]);

Route::get('allPostsInCategory',[
    'as'    =>  'allPostsInCategory',
    'uses'  =>  function(Request $request) {
        $allPostsInCategory = App\Posts::join('lib_status','status_id','=','lib_status.id')
                                    ->join('lib_categories','category_id','=','lib_categories.id')
                                    ->select('service_requests.id','user_id','category_name','request_details','status_name','created_at')
                                    ->where('category_id',$request->id)
                                    ->orderBy('service_requests.id','desc')
                                    ->get();

        return Datatables::of($allPostsInCategory)
            ->addColumn('action', function ($allPostsInCategory) {
                return '<a href="'.route("posts.show",$allPostsInCategory->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#changeStatus" data-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>   
                        <a href="#" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>';
            })
            ->make();
        }
]);

Route::get('identInspection',[
    'as'    =>  'identInspection',
    'uses'  =>  function(Request $request) {
        $identInspection    =   App\Inspection::select('details','recommendation','proposed_schedule')
                                                ->where('posts_id',$request->id)
                                                ->first();
            
            return $identInspection->toJson(JSON_PRETTY_PRINT);

            
    }
]);