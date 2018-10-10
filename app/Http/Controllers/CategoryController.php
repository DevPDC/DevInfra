<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Infrastructure;
use App\Posts;
use Session;
use App\Facility;

class CategoryController extends Controller
{

    public function __contruct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::all();
        $facilities = Facility::all();

        return view('categories.index')->withCategories($categories)->withInfrastructures($infrastructures)->withPosts($posts)->withFacilities($facilities);

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
            'category_name' => 'required|max:255',
            'category_abbr' => 'required|max:15'
        ]);

        $category = new Category;

        $category->category_name = $request->category_name;
        $category->category_abbr = $request->category_abbr;

        $category->save();

        Session::flash('success','New Category has been created!');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::all();
        $facilities = Facility::all();

        $category = Category::find($id); 
        $category_posts = Posts::where(['category_id' => $category->id, 'status_id' => '1'])->orderBy('id', 'desc')->get();

        return view('categories.show')->withCat($category)->withCategories($categories)->withInfrastructures($infrastructures)->withCatposts($category_posts)->withPosts($posts)->withFacilities($facilities);
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
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'The category was successfully deleted!');
        
        return redirect()->route('category.index');
    }
}
