<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use LaraFlash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        LaraFlash::add()->content('Hello World')->type('success')->priority(3);
        return view('pages.index')->withCategories($categories);
    }
}
