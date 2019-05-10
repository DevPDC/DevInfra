<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Mail\ServiceAlert;
use App\User;
use App\Posts;

class SendServiceAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Service Alerts to the Authorized PPD Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dt = date('Y-m-d');
        
        $emails = User::join('hris.employees','user_idno','=','employees.emp_idno')
        ->join('role_user','users.id','=','role_user.user_id')
        ->select('emp_email_official')
        ->where('role_id',1)
        ->orWhere('role_id',2)
        ->orWhere('role_id',3)
        ->orWhere('role_id',4)
        ->orWhere('role_id',1000)
        ->get();
        
        $newEmails = json_decode( json_encode($emails), true);
        
        $posts = Posts::join('inspections','service_requests.id','=','posts_id')
                        ->join('lib_categories','category_id','=','lib_categories.id')
                        ->select('service_requests.id','request_title','request_details','category_name','service_requests.user_id')
                        ->where('inspections.proposed_schedule', $dt)
                        ->get();

        foreach($newEmails as $emails)
        {
            foreach($emails as $email)
            {
                if($email != null)
                {
                    $user = new User();
                    $user->email = $email;
                    Mail::to($user->email)->send(new ServiceAlert($posts));
                } 

            }
        }
    }
}
