<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InspectionNotification;
use App\Inspection;
use Session;
use App\Log;
use App\Posts;
use App\User;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'posts_id' => 'required',
            'details' => 'required|max:300',
            'recommendation' => 'max:300',
            'load_points' => 'integer'
        ]);

        $inspection = new Inspection;

        $inspection->posts_id = $request->posts_id;
        $inspection->details = $request->details;
        $inspection->recommendation = $request->recommendation;
        $inspection->proposed_schedule = $request->proposed_sched;
        $inspection->load_points = $request->load_points;
        $inspection->save();

        $inspection->supply()->sync($request->supplies, false);

        $log = new Log;

        $log->posts_id = $request->posts_id;
        $log->logstatus_id = '4';

        $log->save();

        $emailPost = Posts::join('lib_categories','category_id','=','lib_categories.id')
        ->select('service_requests.id','request_title','category_name')
        ->where('service_requests.id', $request->posts_id)
        ->first();
        
        $post = Posts::find($inspection->posts_id);
        
        if($post->user_id != null )
        {
            $useremail = $post->user_id;
        } else if($post->emp_idno != null) {
            $useremail = $post->emp_idno;
        }

        $email = User::join('hris.employees','user_idno','=','employees.emp_idno')
        ->select('emp_email_official')
        ->where('user_idno',$useremail)
        ->first();

        // dd($email);

        $user = new User();
        $user->email = $email;
        $postSend = $emailPost;

        if($email != null)
        {
            Mail::to($email->emp_email_official)->send(new InspectionNotification($postSend));
        }

        Session::has('success','The Ocular Inspection of this service request has been inputted and added to the database.');

        return redirect()->route('posts.show',$request->posts_id);
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
