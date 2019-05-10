<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technician;
use App\Posts;
use App\Category;
use App\Facility;
use App\Infrastructure;
use Session;

class TechnicianController extends Controller
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

        $technicians = Technician::all();

        return view('technicians.index')->withInfrastructures($infrastructures)
                                        ->withCategories($categories)
                                        ->withPosts($posts)
                                        ->withFacilities($facilities)
                                        ->withTechnicians($technicians);
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
            'user_idno' => 'required|max:7|unique:technicians'
        ]);

        $technician = new Technician;

        $technician->user_idno = $request->user_idno;
        $technician->is_active = 1;

        $technician->save();

        $technician->category()->sync($request->categories, false);

        Session::flash('success','New Technician has been added to the database.');

        return redirect()->route('technician.index');
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
