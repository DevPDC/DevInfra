<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\Infrastructure;
use App\Facility;
use Session;
use App\Profile;
use App\Log;
use App\Inspection;
use App\Supply;

class PostController extends Controller
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
        
        return view('posts.index')->withInfrastructures($infrastructures)->withCategories($categories)->withPosts($posts)->withFacilities($facilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
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
            'user_id' => 'required|max:7',
            'status_id' => 'required',
            'category_id' => 'required', 
            'request_details' => 'required|max:300'
        ]);

        $post = new Posts;

        $post->user_id = $request->user_id;
        $post->status_id = $request->status_id;
        $post->category_id = $request->category_id;
        $post->request_details = $request->request_details;
        
        $post->save();
        
        $log = new Log;

        $log->posts_id = $post->id;
        $log->logstatus_id = 1;

        $log->save();

        Session::flash('success', 'Your request has been added to the database');

        return redirect()->route('posts.index');
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
        
        $inspection = Inspection::where('posts_id', $id)->pluck('id');

        $post = Posts::find($id);

        return view('posts.show')->withCategories($categories)
                                ->withInfrastructures($infrastructures)
                                ->withPosts($posts)
                                ->withSelectedpost($post)
                                ->withFacilities($facilities)
                                ->withInspection($inspection);
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $post = Posts::find($request->post_id);

        $post->status_id    =   $request->status;
        $post->save();

        return redirect()->route('posts.index');
    }
}
