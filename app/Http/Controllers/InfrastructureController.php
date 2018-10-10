<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infrastructure;
use App\Category;
use Session;
use App\Posts;
use App\Facility;
use LaraFlash;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $infrastructures = Infrastructure::all();
        $categories = Category::all();
        $posts = Posts::all();
        $facilities = Facility::all();
        
        return view('infrastructure.index')->withInfrastructures($infrastructures)->withCategories($categories)->withPosts($posts)->withFacilities($facilities);

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
            'infra_name' => 'required',
            'infra_abbr' => 'required|max:15'
        ]);

        $infrastructure = new Infrastructure;

        $infrastructure->infra_name = $request->infra_name;
        $infrastructure->infra_abbr = $request->infra_abbr;

        $infrastructure->save();

        // Session::flash('success' ,'New Infrastructure category has been added to the database!');
        Session::has('success','New Infrastructure category has been added to the database!');

        return redirect()->route('infrastructure.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infrastructures = Infrastructure::all();
        $categories = Category::all();
        $posts = Posts::all();
        $facilities = Facility::all();

        $infra = Infrastructure::find($id);

        return view('infrastructure.show')->withCategories($categories)->withInfrastructures($infrastructures)->withPosts($posts)->withInfra($infra)->withFacilities($facilities);
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
        $infrastructure = Infrastructure::find($id);
        $infrastructure->delete();

        Session::flash('success', 'The infrastructure was successfully deleted!');
        
        return redirect()->route('infrastructure.index');
    }
}
