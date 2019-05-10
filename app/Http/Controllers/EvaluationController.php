<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Log;
use Session;

class EvaluationController extends Controller
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
            'post_id' => 'required',
            'user_id' => 'required',
            'rate_id' => 'required',
            'evaluation_title' => 'max:50',
            'evaluation_body' => 'max:150'
        ]);

        $evaluation = new Evaluation;

        $evaluation->post_id = $request->post_id;
        $evaluation->user_id = $request->user_id;
        $evaluation->rate_id = $request->rate_id;
        $evaluation->evaluation_title = $request->evaluation_title;
        $evaluation->evaluation_body = $request->evaluation_body;
        
        $evaluation->save();

        $log = new Log;

        $log->posts_id = $request->post_id;
        $log->logstatus_id = '11';

        $log->save();

        Session::flash('success','Your Evaluation has been submitted and posted to the page of your request. Thank you.');

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
