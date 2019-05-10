<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Mail\NoMaintenanceAlert;
use App\Mail\MaintenanceAlert;
use App\Maintenance;
use Carbon\Carbon;
use App\Facility;
use App\User;

class SendMaintenanceAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Maintenance Alert to the Authorized Users of PPD.';

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
        
        $x = array(
            $dt,
            date('Y-m-d', strtotime($dt. ' + 1 days')),
            date('Y-m-d', strtotime($dt. ' + 2 days')),
            date('Y-m-d', strtotime($dt. ' + 3 days')),
            date('Y-m-d', strtotime($dt. ' + 4 days')),
            date('Y-m-d', strtotime($dt. ' - 1 days')),
            date('Y-m-d', strtotime($dt. ' - 2 days')),
            date('Y-m-d', strtotime($dt. ' - 3 days')),
            date('Y-m-d', strtotime($dt. ' - 4 days'))
        );
        
        $facilities = Facility::join('facilities_maintenance','facilities.id','=','facilities_maintenance.facility_id')
                        ->join('lib_infrastructures','infrastructure_id','=','lib_infrastructures.id')
                        ->select('facilities.id','infra_name','name','details','facilities_maintenance.maintenance_schedule')
                        ->whereIn('maintenance_schedule',$x)
                        ->where('maintenance_status_id','!=','3')
                        ->get();
        
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

        if($facilities->isEmpty())
        {
            foreach($newEmails as $emails)
            {
                foreach($emails as $email)
                {
                    $user = new User();
                    $user->email = $email;
                    // Mail::to($user->email)->send(new NoMaintenanceAlert());
                }
            }
        }
        else
        {
            foreach($newEmails as $emails)
            {
                foreach($emails as $email)
                {
                    $user = new User();
                    $user->email = $email;
                    Mail::to($user->email)->send(new MaintenanceAlert($facilities));

                }
            }
        }
    }
}
