<?php

namespace App\Http\Controllers;

use Session;
use App\Posts;
use App\Category;
use App\Infrastructure;
use App\Facility;
use App\Supply;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        
        $brands = Brand::all();

        return view('brands.index')->withInfrastructures($infrastructures)->withCategories($categories)->withPosts($posts)->withFacilities($facilities)->withBrands($brands);
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
            'brand_name' => 'required|max:100|unique:lib_supply_brands',
            'user_id' => 'max:7'
        ]);

        $brand = new Brand;

        $brand->brand_name = $request->brand_name;
        $brand->user_id = $request->user_id;

        $brand->save();

        Session::flash('success','New Brand has been added to the database.');

        return redirect()->route('brand.index');
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
