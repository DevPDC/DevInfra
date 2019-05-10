<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GensetCapacity;
use Session;

class GensetCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'genset_facility_id' => 'required',
            'capacity_max'
        ]);

        $gencapacity = new GensetCapacity;

        $gencapacity->capacity_max = $request->capacity_max;
        $gencapacity->genset_facility_id = $request->genset_facility_id;

        $gencapacity->save();

        Session::flash('primary','Generator Capacity has been set.');

        return back();
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
     * @return \Illuminate\Http\Response\
     */
    public function update(Request $request, $id)
    {

        $gencat = GensetCapacity::where('genset_facility_id', $request->gensetid)->first();
        // dd($gencat);
        $gencat->capacity_max = $request->capacity_max;
        $gencat->save();

        Session::flash('success','The maximum capacity has been modified!');

        return back();
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
