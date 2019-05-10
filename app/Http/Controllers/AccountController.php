<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Profile;
use App\Division;
use App\Station;
use App\Posts;
use App\Facility;
use App\Category;
use App\Infrastructure;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __contruct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('sadmin');
        $this->middleware('aa');
    }

    public function index()
    {
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::orderBy('id','desc')->get();
        $facilities = Facility::all();
        
        return view('accounts.index')->withInfrastructures($infrastructures)
                                    ->withCategories($categories)
                                    ->withPosts($posts)
                                    ->withFacilities($facilities);
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
        //
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
        $posts = Posts::orderBy('id','desc')->get();
        $facilities = Facility::all();
        
        return view('accounts.show')->withInfrastructures($infrastructures)
                                    ->withCategories($categories)
                                    ->withPosts($posts)
                                    ->withFacilities($facilities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::orderBy('id','desc')->get();
        $facilities = Facility::all();
        
        return view('accounts.edit')->withInfrastructures($infrastructures)
                                    ->withCategories($categories)
                                    ->withPosts($posts)
                                    ->withFacilities($facilities);
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
