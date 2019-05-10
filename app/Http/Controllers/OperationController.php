<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendGeneratorAlert;
use App\GensetCapacity;
use Illuminate\Http\Request;
use App\Operation;
use App\Facility;
use App\User;
use Session;

class OperationController extends Controller
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
            'genset_facility_id' => 'required',
            'date_of_operation_start' => 'required',
            'date_of_operation_end' => 'required',
            'hours_operated' => 'required',
        ]);

        $opt = new Operation;

        $opt->date_of_operation_start = $request->date_of_operation_start;
        $opt->date_of_operation_end = $request->date_of_operation_end;
        $opt->genset_id = $request->genset_facility_id;
        $opt->hours_operated = $request->hours_operated;
        $opt->is_active = 1;

        $opt->save();

        
        $per = GensetCapacity::where('genset_facility_id', $request->genset_facility_id)->first();
        $cap = $per->capacity_max;

        $opt = Operation::select('hours_operated')
                            ->where('is_active', 1)
                            ->where('genset_id', $request->genset_facility_id)
                            ->get();
                            
        $opthours = null;

        for($i=0; $i<count($opt); $i++)
        {
            $opthours = $opthours + $opt[$i]->hours_operated;
        }

        $percentage = $opthours/$cap*100;


        if($percentage >= 95)
        {
            $fac = Facility::where('id',$request->genset_facility_id)->first();

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

            foreach($newEmails as $emails)
            {
                foreach($emails as $email)
                {
                    $user = new User();
                    $user->email = $email;
                    Mail::to($user->email)->send(new SendGeneratorAlert([$percentage,$cap,$fac,$opthours]));
    
                }
            }
            Session::flash('danger', 'The '.$fac->name.' have reached the designated maximum operation hours. The email regarding this matter has been sent to authorized personnel of this system.');
            Session::flash('success', 'The operation has been successfully submitted.');
            return back();
        } else {
            Session::flash('success', 'The operation has been successfully submitted.');
            return back();
        }
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
