<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Category;
use App\Infrastructure;
use App\Posts;
use App\Facility;
use Session;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::all();
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::all();
        $facilities = Facility::all();

        return view('status.index')->withStatus($status)->withCategories($categories)->withInfrastructures($infrastructures)->withPosts($posts)->withFacilities($facilities);
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
            'status_name' => 'required',
            'status-abbr' => 'max:15'
        ]);

        $status = new Status;

        $status->status_name = $request->status_name;
        $status->status_abbr = $request->status_abbr;

        $status->save();

        Session::flash('success', 'New Status has been added to the database');

        return redirect()->route('status.index');

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
        $status = Status::find($id);

        $status->delete();
        
        Session::flash('success', 'The status was successfully deleted!');
        return redirect()->route('status.index');
    }
}
