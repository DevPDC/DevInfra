<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Technician;
use Session;

class RequestUpdateController extends Controller
{
    public function assignedTechnician(Request $request)
    {
        $post = Posts::find($request->postid);

        $post->technician()->sync($request->technicians, false);

        Session::flash('success','Technician/s has been successfully assigned');

        return back();
        
    }
}
