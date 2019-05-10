<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use App\Maintenance;
use App\Posts;
use App\Category;
use App\Infrastructure;
use App\ScheduleCategory;
use Carbon\Carbon;
use Session;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::orderBy('id','desc')->get();
        $facilities = Facility::all();
        $schedcategories = ScheduleCategory::all();
        // Maintenance Array
        $maintenances = Maintenance::all();
        // Sending View with Variables
        return view('maintenance.index')->withInfrastructures($infrastructures)
                                        ->withCategories($categories)
                                        ->withPosts($posts)
                                        ->withFacilities($facilities)
                                        ->withMaintenances($maintenances)
                                        ->withSchedulecategories($schedcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Carbon::now());

        $this->validate($request, [
            'classification' => 'required',
            'maintenance_schedule' => 'required',
            'maintenance_type' => 'required',
            'scope' => 'required',
            'maintenance_duration' => 'integer'
        ]);

        $schedcategory = ScheduleCategory::where('id',$request->maintenance_type)->first();

        $period = $schedcategory->schedule_category_value;
        $duration = $request->maintenance_duration;

        $fullduration = $period*$duration;
        // dd($fullduration);


        switch($request->classification) {
            case 'single':
                foreach($request->scope as $scope)
                {
                    for($i=0; $i<$fullduration; $i++)
                    {
                        $getlatestsingle = Maintenance::where('facility_id',$scope)->latest('id','desc')->first();
                        // $date = Carbon::createFromFormat('Y-m-d', $getlatestsingle->maintenance_schedule)->toDateTimeString();
                        // dd(Carbon::parse($getlatestsingle->maintenance_schedule)->format('Y-m-d')->addMonth());
                        // dd($getlatestsingle);
            
                        $maintenance = new Maintenance;
                        $maintenance->facility_id = $scope;
                        $maintenance->maintenance_status_id = '1';
                        $maintenance->schedule_category_id = $schedcategory->id;

                        switch($request->maintenance_type)
                        {
                            case 1:
                                if($i==0)
                                {
                                    $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                }
                                else
                                {
                                    // dd(Carbon::parse($getlatestsingle->maintenance_schedule)->addMonth());
                                    $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonth();
                                }

                                break;


                            case 2:

                                if($i==0)
                                {
                                    $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                }
                                else
                                {
                                    $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonths(3);
                                }
                                break;


                            case 3:

                                if($i==0)
                                {
                                    $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                }
                                else
                                {
                                    $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonths(6);
                                }

                                break;


                            case 4:

                                if($i==0)
                                {
                                    $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                }
                                else
                                {
                                    $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonths(12);
                                }
                                
                                break;
                        }
            
                        $maintenance->save();
                    }
                }

                Session::flash('success','New Maintenance Schedules has been added to the calendar.');

                return redirect()->route('maintenance.index');

                break;

            case 'group':
                foreach($request->scope as $scope)
                {
                    $facilities = Facility::select('id')
                                            ->where('infrastructure_id',$scope)
                                            ->get();

                    foreach($facilities as $facility)
                    {
                        
                        for($i=0; $i<$fullduration; $i++)
                        {
                            $getlatestsingle = Maintenance::where('facility_id',$facility->id)->latest('id','desc')->first();
                            // $date = Carbon::createFromFormat('Y-m-d', $getlatestsingle->maintenance_schedule)->toDateTimeString();
                            // dd(Carbon::parse($getlatestsingle->maintenance_schedule)->format('Y-m-d')->addMonth());
                            // dd($getlatestsingle);
                
                            $maintenance = new Maintenance;
                            $maintenance->facility_id = $facility->id;
                            $maintenance->maintenance_status_id = '1';
                            $maintenance->schedule_category_id = $schedcategory->id;

                            switch($request->maintenance_type)
                            {
                                case 1:
                                    if($i==0)
                                    {
                                        $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                    }
                                    else
                                    {
                                        // dd(Carbon::parse($getlatestsingle->maintenance_schedule)->addMonth());
                                        $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonth();
                                    }

                                    break;


                                case 2:

                                    if($i==0)
                                    {
                                        $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                    }
                                    else
                                    {
                                        $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonths(3);
                                    }
                                    break;


                                case 3:

                                    if($i==0)
                                    {
                                        $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                    }
                                    else
                                    {
                                        $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonths(6);
                                    }

                                    break;


                                case 4:

                                    if($i==0)
                                    {
                                        $maintenance->maintenance_schedule = $request->maintenance_schedule;
                                    }
                                    else
                                    {
                                        $maintenance->maintenance_schedule = Carbon::parse($getlatestsingle->maintenance_schedule)->addMonths(12);
                                    }
                                    
                                    break;
                                }
                    
                                $maintenance->save();
                        }
                    }
                }

                Session::flash('success','New Maintenance Schedules has been added to the calendar!');

                return redirect()->route('maintenance.index');

                break;
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
