<?php

namespace App\Http\Controllers;

use App\Mail\SendTicketNumberToClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceCompleted;
use Illuminate\Http\Request;
use App\Infrastructure;
use App\Technician;
use App\Evaluation;
use App\Inspection;
use Carbon\Carbon;
use App\Receiver;
use App\Category;
use App\Facility;
use App\Profile;
use App\Supply;
use App\Ticket;
use App\Status;
use App\Posts;
use App\User;
use Session;
use App\Log;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allPosts = Posts::join('lib_status','status_id','=','lib_status.id')
        //                     ->join('lib_categories','category_id','=','lib_categories.id')
        //                     ->join('hris.employees','service_requests.emp_idno','employees.emp_idno')
        //                     ->select('service_requests.id','emp_fullname','category_name','request_title','request_details','created_at','status_name','status_id')
        //                     ->where('service_requests.id',31)
        //                     ->orderBy('service_requests.id','desc')
        //                     ->first();
        
        // dd($allPosts);
    // $now = Carbon::now()->toDateString();


        // $facilities = Facility::join('facilities_maintenance','facilities.id','=','facilities_maintenance.facility_id')
        //                 ->join('lib_infrastructures','infrastructure_id','=','lib_infrastructures.id')
        //                 ->select('facilities.id','infra_name','name','details','facilities_maintenance.maintenance_schedule')
        //                 ->where(date_diff($now,date('Y-m-d',strtotime('maintenance_schedule'))) > 4)
        //                 ->where(date_diff($now,date('Y-m-d',strtotime('maintenance_schedule'))) > -4)
        //                 ->get();
                        
        // dd(Carbon::parse($facilities[0]->maintenance_schedule)->toDateString());
        
        

        $categories = Category::all();
        $infrastructures = Infrastructure::all();
        $posts = Posts::orderBy('id','desc')->get();
        $facilities = Facility::all();
        $status = Status::all();
        
        return view('posts.index')->withInfrastructures($infrastructures)
                                    ->withCategories($categories)
                                    ->withPosts($posts)
                                    ->withFacilities($facilities)
                                    ->withStatus($status);
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
            'user_id' => 'max:7',
            'emp_idno' => 'max:7',
            'category_id' => 'required', 
            'request_details' => 'required|max:300',
            'proposed_service_date' => 'max:15'
        ]);

        $post = new Posts;

        if($request->user_id == null)
        {
            $post->emp_idno = $request->emp_idno;
            $post->user_id = null;
        } else if($request->emp_idno == null) {
            $post->emp_idno = null;
            $post->user_id = $request->user_id;
        }

        $post->status_id = 1;
        $post->category_id = $request->category_id;
        $post->request_title = $request->request_title;
        $post->request_details = $request->request_details;
        $post->proposed_service_date = $request->proposed_service_date;
        
        $post->save();
        
        $log = new Log;

        $log->posts_id = $post->id;
        $log->logstatus_id = 1;

        $log->save();

        // Check for Category Abbr
        $base_category = Category::select('category_abbr')->where('id',$post->category_id)->first();
        // dd($base_category);
        $ticket_date_prefix = date('Y-m');
        $combined_prefix = $base_category->category_abbr.'-'.$ticket_date_prefix;
        // Get Max Integer in Series
        $max_in_series = Ticket::select('ticket_series')->where('ticket_prefix',$combined_prefix)->latest('ticket_series','desc')->first();
        // dd($max_in_series);

        if ($max_in_series != null) {

            $series_number = $max_in_series->ticket_series;
            // Ticket Details
            $ticket_post = $post->id;
            $ticket_no = $series_number + 1;
            $ticket_full = $combined_prefix.'-'.$ticket_no;
        }
        else
        {
            $ticket_post = $post->id;
            $ticket_no = 1;
            $ticket_full = $combined_prefix.'-'.$ticket_no;
        }

        $ticket = new Ticket;

        $ticket->request_id = $ticket_post;
        $ticket->ticket_prefix = $combined_prefix;
        $ticket->ticket_series = $ticket_no;
        $ticket->ticket_full = $ticket_full;

        $ticket->save();
        
        if($post->user_id != null )
        {
            $useremail = $post->user_id;
        } else if($post->emp_idno != null) {
            $useremail = $post->emp_idno;
        }

        $email = User::join('hris.employees','user_idno','=','employees.emp_idno')
        ->select('emp_email_official','emp_email_personal')
        ->where('user_idno',$useremail)
        ->first();

        $ticket = $ticket_full;
        if($email != null)
        {
            if($email->emp_email_official != null)
            {
                Mail::to($email->emp_email_official)->send(new SendTicketNumberToClient($ticket));
                Session::flash('success', 'Your request has been added to the database');
            } else if($email->emp_email_personal != null)
            {
                Mail::to($email->emp_email_personal)->send(new SendTicketNumberToClient($ticket));
                Session::flash('success', 'Your request has been added to the database');
            }
        } else {
            Session::flash('success', 'Your request has been added to the database');
        }


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
        $evaluations = Evaluation::where('post_id', $id)->get();
        $hasEval = Evaluation::where('user_id',Auth::user()->user_idno)->where('post_id',$id)->get();

        $supplies = Supply::all();
        $inspection = Inspection::where('posts_id', $id)->first();

        $post = Posts::find($id);
        $checkTechnician = Technician::join('request_technician','technician_id','=','request_technician.technician_id')
                                        ->select('technicians.id')
                                        ->where('request_technician.post_id',$id)
                                        ->first();
        
        return view('posts.show')->withCategories($categories)
                                ->withInfrastructures($infrastructures)
                                ->withPosts($posts)
                                ->withSelectedpost($post)
                                ->withFacilities($facilities)
                                ->withInspection($inspection)
                                ->withSupplies($supplies)
                                ->withChecktech($checkTechnician)
                                ->withEvaluations($evaluations)
                                ->withHaseval($hasEval);
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


        if($request->status == 2)
        {
            $logstatus = '2';
        }
        elseif($request->status == 3)
        {
            // Check for Category Abbr
        $base_category = Category::select('category_abbr')->where('id',$post->category_id)->first();
        // dd($base_category);
        $ticket_date_prefix = date('Y-m');
        $combined_prefix = $base_category->category_abbr.'-'.$ticket_date_prefix;
        // Get Max Integer in Series
        $max_in_series = Ticket::select('ticket_series')->where('ticket_prefix',$combined_prefix)->latest('ticket_series','desc')->first();
        // dd($max_in_series);

        if ($max_in_series != null) {

            $series_number = $max_in_series->ticket_series;
            // Ticket Details
            $ticket_post = $post->id;
            $ticket_no = $series_number + 1;
            $ticket_full = $combined_prefix.'-'.$ticket_no;
        }
        else
        {
            $ticket_post = $post->id;
            $ticket_no = 1;
            $ticket_full = $combined_prefix.'-'.$ticket_no;
        }

        $checkTicket = Ticket::where('request_id', $post->id)
                                ->first();

        if($checkTicket == null)
        {
            $ticket = new Ticket;
    
            $ticket->request_id = $ticket_post;
            $ticket->ticket_prefix = $combined_prefix;
            $ticket->ticket_series = $ticket_no;
            $ticket->ticket_full = $ticket_full;
    
            $ticket->save();
        }
        
        if($post->user_id != null)
        {
            $useremail = $post->user_id;
        } else if($post->emp_idno != null) {
            $useremail = $post->emp_idno;
        }

        $email = User::join('hris.employees','user_idno','employees.emp_idno')
                        ->select('emp_email_official','emp_email_personal')
                        ->where('user_idno',$useremail)
                        ->first();

        $ticket = $ticket_full;

        if($email != null)
        {
            if($email->emp_email_official != null) {
                Mail::to($email->emp_email_official)->send(new SendTicketNumberToClient($ticket));
            } else if($email->emp_email_personal != null) {
                Mail::to($email->personal)->send(new SendTicketNumberToClient($ticket));
            }
        }

            $logstatus = '3';

            $receiver = Auth::user()->user_idno;

            $receive = new Receiver;

            $receive->request_id = $post->id;
            $receive->receiver_id = $receiver;

            $receive->save();
        }
        elseif($request->status == 4)
        {
            $logstatus = '4';
        }
        elseif($request->status == 5)
        {
            $logstatus = '5';
        }
        elseif($request->status == 6)
        {
            $logstatus = '7';
        }
        elseif($request->status == 7)
        {
            $logstatus = '8';
        }
        elseif($request->status == 8)
        {
            $logstatus = '10';
        
            $useremail = $post->emp_idno;

            $email = User::join('hris.employees','user_idno','employees.emp_idno')
            ->select('emp_email_personal','emp_email_official')
            ->where('user_idno',$useremail)
            ->first();

            $emailPost = Posts::join('lib_categories','category_id','=','lib_categories.id')
                        ->select('service_requests.id','request_title','category_name')
                        ->where('service_requests.id', $request->post_id)
                        ->get();
                        
            $user = new User();
            $user->email = $email;
            $postSend = $emailPost[0];

            if($email != null)
            {
                if($email->emp_email_official != null) {
                    Mail::to($email->emp_email_official)->send(new ServiceCompleted($postSend));
                    Session::flash('success','Service Request Alerts has been sent to '.$email->emp_email_official.'.');
                } else if($email->emp_email_personal != null) {
                    Mail::to($email->emp_email_personal)->send(new ServiceCompleted($postSend));
                    Session::flash('success','Service Request Alerts has been sent to '.$email->emp_email_personal.'.');
                }
            } else {
                Session::flash('success','Service Request Alerts has been sent to ');
            }

        }
        elseif($request->status == 9)
        {
            $logstatus = '11';
        }

        $log = new Log;

        $log->posts_id = $request->post_id;
        $log->logstatus_id = $logstatus;

        $log->save();

        return redirect()->route('posts.show',$request->post_id);
    }
}
