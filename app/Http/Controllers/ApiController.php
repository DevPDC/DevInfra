<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;
use App\Log;

use Datatables;

class ApiController extends Controller
{
    
    public function __contruct(){
        $this->middleware('auth');
    }

    public function getIndRequests($id)
    {
        $posts = Posts::where('user_id',$id)->get();

        return Datatables::of($posts)->make();
    }

    public function getAllRequests()
    {
        $allPosts = Posts::select('id','user_id','request_details','name','created_at')->get();
    }

    public function getIdentPostLog(Request $request)
    {
        $identPostLog = Log::join('lib_log_status','logstatus_id','=','lib_log_status.id')
                            ->select('created_at','name')
                            ->where('posts_id',$request->id)
                            ->orderBy('created_at','desc')
                            ->get();

        return Datatables::of($identPostLog)->make();
    }

    public function getPostSupplies(Request $request)
    {
        $postSupplies = DB::table('inspection_supply')
                            ->select('supply_name')
                            ->join('supplies','supply_id','=','supplies.id')
                            ->join('inspections','inspection_id','=','inspections.id')
                            ->where('inspections.posts_id',$request->id)
                            ->get();

                            return Datatables::of($postSupplies)->make();
    }

    
}
