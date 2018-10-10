<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Infrastructure;
use App\Category;
use App\Facility;
use App\Profile;
use App\Division;
use App\Station;
use App\Office;
use App\Unit;
use App\Position;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $facilities = Facility::all();
        
        $profiles = Profile::all();

        return view('profiles.index')->withCategories($categories)->withPosts($posts)->withInfrastructures($infrastructures)->withProfiles($profiles)->withFacilities($facilities);

        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $posts = Posts::all();
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $facilities = Facility::all();
        
        $profile = Profile::select('emp_idno','emp_fullname','emp_division','emp_station','emp_office','emp_unit','emp_mname','emp_lname','emp_fname','emp_cpno','emp_email_official','emp_email_personal')->where('emp_idno', $id)->first();
        $reqs = Posts::where('user_id', $id)->get();

        $positionid = Profile::select('emp_position')->where('emp_idno', $id)->first();
        $divisionid = Profile::select('emp_division')->where('emp_idno', $id)->first();
        $stationid = Profile::select('emp_station')->where('emp_idno', $id)->first();
        $unitid = Profile::select('emp_unit')->where('emp_idno', $id)->first();
        $officeid = Profile::select('emp_office')->where('emp_idno', $id)->first();

        $position = Position::find($positionid)->first();
        $division = Division::find($divisionid)->first();
        $station = Station::find($stationid)->first();
        $unit = Unit::find($unitid)->first();
        $office = Office::find($officeid)->first();
        

        return view('profiles.show')->withInfrastructures($infrastructures)
                                    ->withCategories($categories)
                                    ->withPosts($posts)
                                    ->withProfile($profile)
                                    ->withReqs($reqs)
                                    ->withFacilities($facilities)
                                    ->withPosition($position)
                                    ->withDivision($division)
                                    ->withStation($station)
                                    ->withUnit($unit)
                                    ->withOffice($office);

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
