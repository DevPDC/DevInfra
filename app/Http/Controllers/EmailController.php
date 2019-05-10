<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Notifications\MaintenanceAlert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ServiceAlert;
use Carbon\Carbon;
use App\Facility;
use App\Profile;
use App\Posts;
use App\User;
use Session;

class EmailController extends Controller
{
    public function __contruct(){

        $this->middleware('auth');

    }

    public function sampleEmail(Request $request)
    {
        if ($request->isMethod('get'))
            return view('custom_email');
        else {
            $rules = [
                'to_email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
            ];
            $this->validate($request, $rules);

            $emails = User::join('hris.employees','user_idno','=','employees.emp_idno')
                            ->join('role_user','users.id','=','role_user.user_id')
                            ->select('emp_email_official')
                            ->where('role_id',1)
                            ->orWhere('role_id',2)
                            ->orWhere('role_id',3)
                            ->orWhere('role_id',4)
                            ->orWhere('role_id',1000)
                            ->get();

            foreach($emails as $email)
            {
                if($email->emp_email_official != null)
                {
                    $user = new User();
                    $user->email = $email;
                    Mail::to($email->emp_email_official)->send(new ServiceAlert($posts));
                    Session::has('success','Email has been sent to the Authorized Users');
                }
            }

            return back();
        }
    }

    public function serviceAlerts()
    {
        $today = Carbon::now();
        $dateToday = $today->day.'/'.$today->month.'/'.$today->year;
        $dt = date('Y-m-d');
        // $posts = Posts::join('inspections','service_requests.id','=','posts_id')
        //         ->join('lib_categories','category_id','=','lib_categories.id')
        //         ->select('service_requests.id','request_title','request_details','category_name','service_requests.user_id')
        //         ->where('inspections.proposed_schedule',$dt)
        //         ->get();

        $emails = User::join('hris.employees','user_idno','=','employees.emp_idno')
            ->join('role_user','users.id','=','role_user.user_id')
            ->select('emp_email_official')
            ->where('role_id',1)
            ->orWhere('role_id',2)
            ->orWhere('role_id',3)
            ->orWhere('role_id',4)
            ->orWhere('role_id',1000)
            ->get();
        
        $posts = Posts::join('inspections','service_requests.id','=','posts_id')
                        ->join('lib_categories','category_id','=','lib_categories.id')
                        ->select('service_requests.id','request_title','request_details','category_name','service_requests.user_id')
                        ->where('inspections.proposed_schedule', $dt)
                        ->get();

        foreach($emails as $email)
        {
            if($email->emp_email_official != null)
            {
                $user = new User();
                $user->email = $email;
                Mail::to($email->emp_email_official)->send(new ServiceAlert($posts));
            }
        }

        Session::flash('success','Service Request Alerts has been sent to '.$email.'.');

        return back();
    }
}
