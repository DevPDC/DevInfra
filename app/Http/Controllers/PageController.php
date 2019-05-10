<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use App\Category;
use App\Infrastructure;
use App\Maintenance;
use App\Facility;
use App\Posts;

class PageController extends Controller
{
    public function getMapDashboard(){
        $dt = Carbon::now()->toDateString();

        $infrastructures = Infrastructure::all();
        $categories = Category::all();

        // $facilities = Facility::all();

        $facilities = Facility::select('facilities.id','name','details','coordinates','facilities.created_at', 'facilities.updated_at','infra_name','infrastructure_id')
                                ->join('lib_infrastructures','facilities.infrastructure_id','=','lib_infrastructures.id')
                                ->get();

        // dd($facilities);

        $newFacilities = [];
        for($i=0; $i< $facilities->count(); $i++)
        {
            $push = Maintenance::select('maintenance_schedule')
                                ->where('facility_id','=',$facilities[$i]->id)
                                ->orderBy(DB::raw('ABS(DATEDIFF(maintenance_schedule, NOW()))'))
                                ->first();

            if($push === null)
            {
                $facilities[$i]->maintenance_schedule = null;
            }
            else
            {
                $facilities[$i]->maintenance_schedule = $push->maintenance_schedule;
            }
            array_push($newFacilities,$facilities[$i]);
        }

        $posts = Posts::all();
        $count = $facilities->count();

        $filtered = array();

        return view('pages.map_dashboard')
                ->withCategories($categories)
                ->withInfrastructures($infrastructures)
                ->withFacilities($newFacilities);
    }

    public function getCalendar(){
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::all();
        $facilities = Facility::all();

        return view('pages.calendar')->withCategories($categories)->withInfrastructures($infrastructures)->withPosts($posts)->withFacilities($facilities);
    }

    public function getErrorDenied(){
        return view('errors.access-denied');
    }

    public function getServiceDashboard()
    {
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::all();
        $facilities = Facility::all();
        
        return view('pages.home')->withCategories($categories)->withInfrastructures($infrastructures)->withPosts($posts)->withFacilities($facilities);
    }

    public function getHtmlReport()
    {
        $view = view('coreui.dashboard');
        return PDF::loadHTML($view)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('myfile.pdf');
    }
}
