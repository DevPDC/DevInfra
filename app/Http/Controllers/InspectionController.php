<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspection;
use Session;
use App\Log;

class InspectionController extends Controller
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
            'posts_id' => 'required',
            'details' => 'required|max:300',
            'recommendation' => 'max:300'
        ]);

        $inspection = new Inspection;

        $inspection->posts_id = $request->posts_id;
        $inspection->details = $request->details;
        $inspection->recommendation = $request->recommendation;
        $inspection->proposed_schedule = $request->proposed_sched;
        $inspection->save();

        $inspection->supply()->sync($request->supplies, false);

        $log = new Log;

        $log->posts_id = $request->posts_id;
        $log->logstatus_id = '4';

        $log->save();

        Session::has('success','The Ocular Inspection of this service request has been inputted and added to the database.');

        return redirect()->route('posts.show',$request->posts_id);
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
