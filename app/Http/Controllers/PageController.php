<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Category;
use App\Infrastructure;
use App\Facility;
use App\Posts;

class PageController extends Controller
{

    public function getIndex(){

        $lava = new Lavacharts;

        $infraTable = $lava->DataTable();

        $infraTable->addDateColumn('Year')
                    ->addNumberColumn('Number of People')
                    ->addRow(['2006', 623452])
                    ->addRow(['2007', 685034])
                    ->addRow(['2008', 716845])
                    ->addRow(['2009', 757254])
                    ->addRow(['2010', 778034])
                    ->addRow(['2011', 792353])
                    ->addRow(['2012', 839657])
                    ->addRow(['2013', 842367])
                    ->addRow(['2014', 873490]);

        $lava->BarChart('Infrastructures', $infraTable, [
            'title' => 'Infrastructures'
        ]);

        $infrastructures = Infrastructure::all();
        $categories = Category::all();
        $facilities = Facility::all();

        return view('pages.map')->withCategories($categories)->withInfrastructures($infrastructures)->withFacilities($facilities)->withLava($lava);
    }

    public function getDashboard(){
        $categories = Category::all();
        return view('pages.map')->withCategories($categories);
    }

    public function getCalendar(){
        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::all();
        $facilities = Facility::all();

        return view('pages.calendar')->withCategories($categories)->withInfrastructures($infrastructures)->withPosts($posts)->withFacilities($facilities);
    }
}
