<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Facility;
use Session;
use App\Category;
use App\Infrastructure;
use Datatables;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        
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
        $this->validate($request, [
            'name' => 'required',
            'infrastructure_id' => 'required',
            'coordinates' => 'required',
            'details' => 'required'
        ]);

        $facility = new Facility;

        $facility->name = $request->name;
        $facility->infrastructure_id = $request->infrastructure_id;
        $facility->coordinates = $request->coordinates;
        $facility->details = $request->details;

        $facility->save();

        Session::flash('success','New Facility has been added to the map! Please reload if not automatically added to the dashboard.');

        return redirect()->route('home_dashboard');
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
     * @return \Illuminate\Http\Responsegog
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

    public function getAllFacilities()
    {
        $facilities = Facility::all();
        return Datatables::of($facilities)->make(true);
    }

}
