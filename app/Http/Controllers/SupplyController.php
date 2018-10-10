<?php

namespace App\Http\Controllers;
use Session;
use App\Posts;
use App\Category;
use App\Infrastructure;
use App\Facility;
use App\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
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
        
        $supplies = Supply::all();

        return view('supplies.index')->withInfrastructures($infrastructures)->withCategories($categories)->withPosts($posts)->withFacilities($facilities)->withSupplies($supplies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'supply_name' => 'required|max:100',
            'supply_brand' => 'max:100'
        ]);

        $supply = new Supply;

        $supply->supply_name = $request->supply_name;
        $supply->supply_brand = $request->supply_brand;

        $supply->save();

        Session::has('success','New Supply has been added to the database');

        return redirect()->route('supply.index');
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
        $supply = Supply::find($id);

        $supply->delete();
        
        Session::flash('success', 'The selected supply was successfully deleted!');
        return redirect()->route('supply.index');
    }
}
