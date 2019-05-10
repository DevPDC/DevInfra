<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\RequestTechnician;
use App\InspectionSupply;
use App\Infrastructure;
use App\Inspection;
use App\Evaluation;
use App\Technician;
use App\PDFReport;
use App\Receiver;
use App\Category;
use App\Ticket;
use App\Supply;
use App\Posts;
use App\User;
use App\Rate;

class PDFController extends Controller
{
    // public function pdfIndividualReport()
    // {
    //     // $post = Posts::select('')

    //     // $user = User::select('emp_fullname',
    //     //                     'emp_cpno',
    //     //                     'division_name',
    //     //                     )


    //     // Send data to the view using loadView function of PDF facade
    //     $pdf = PDF::loadView('reports.individual-request');
    //     // If you want to store the generated pdf to the server then you can use the store function
    //     $pdf->save(storage_path().'list-of-farms.pdf');
    //     // Finally, you can download the file using download function
    //     return $pdf->download('list-of-farms.pdf');

    //     // return view('reports.individual-request');
    // }

    public function pdfServiceReport(Request $request)
    {
        $id = $request->postid;

        $post = Posts::join('lib_status','status_id','lib_status.id')
                        ->join('lib_categories','category_id','lib_categories.id')
                        ->select('request_title',
                                'request_details', 
                                'service_requests.created_at',
                                'status_name',
                                'category_name',
                                'category_abbr',
                                'proposed_service_date',
                                'status_name',
                                'service_requests.emp_idno')
                        ->where('service_requests.id',$id)
                        ->first();

        $categories = Category::all();

        $inspection = Inspection::where('posts_id',$id)
                                ->first();

        if($inspection == null)
        {
            $inspection = new Inspection;

            $inspection->id = null;
            $inspection->posts_id = null;
            $inspection->load_points = null;
            $inspection->details = '';
            $inspection->recommendation = '';
            $inspection->proposed_schedule = '';
            $inspection->created_at = null;
            $inspection->updated_at = null;
        }

        // dd($inspection);

        $supplies = InspectionSupply::join('supplies','supply_id','supplies.id')
                                    ->select('supply_name')
                                    ->where('inspection_id', $inspection->id)
                                    ->get();
        
        if($supplies->count() == 0)
        {
            $supplies[0] = new InspectionSupply;

            $supplies[0]->supply_name = 'No Supplies Inputted!';
        }
        // dd($supplies);

        $receiver = Receiver::where('request_id',$id)
                                ->join('hris.employees','receiver_id','employees.emp_idno')
                                ->select('emp_fullname', 'created_at')
                                ->first();

        if($receiver == null)
        {   
            $receiver = new Ticket;
            $receiver->emp_fullname = 'Not Yet Received.';
            $receiver->created_at = null;
        }
        // dd($receiver);

        $ticket = Ticket::select('ticket_full')
                            ->where('request_id',$id)
                            ->first();

        if($ticket == null)
        {   
            $ticket = new Ticket;
            $ticket->ticket_full = 'No Ticket No.';
        }
        // dd($ticket);

        $evaluation = Evaluation::where('post_id',$id)
                                    ->join('hris.employees','user_id','employees.emp_idno')
                                    ->join('lib_ratings','timeliness','lib_ratings.id')
                                    ->select('evaluations.id','evaluation_title','evaluation_body','evaluations.created_at','rating_name','emp_fullname','lib_ratings.id AS rate_no')
                                    ->first();

        $quality = Evaluation::where('post_id',$id)
                                    ->join('hris.employees','user_id','employees.emp_idno')
                                    ->join('lib_ratings','service_quality','lib_ratings.id')
                                    ->select('rating_name','lib_ratings.id AS rate_no')
                                    ->first();

        $courtesy = Evaluation::where('post_id',$id)
                                    ->join('hris.employees','user_id','employees.emp_idno')
                                    ->join('lib_ratings','service_courtesy','lib_ratings.id')
                                    ->select('rating_name','lib_ratings.id AS rate_no')
                                    ->first();


        // dd($evaluation);

        $technicians = RequestTechnician::join('technicians','technician_id','technicians.id')
                                            ->join('hris.employees','technicians.user_idno','employees.emp_idno')
                                            ->select('emp_fullname')
                                            ->where('post_id',$id)
                                            ->get();


        if($technicians->count() == 0)
        {
            $technicians[0] = new RequestTechnician;

            $technicians[0]->emp_fullname = '';
        }

        // dd($technicians);

        $rates = Rate::all();

        $pdf = PDF::loadview('PDFReports.service-request', array('post' => $post, 
                                                                'ticket' => $ticket, 
                                                                'categories' => $categories, 
                                                                'receiver' => $receiver, 
                                                                'inspection' => $inspection, 
                                                                'supplies' => $supplies,
                                                                'evaluation' => $evaluation,
                                                                'technicians' => $technicians,
                                                                'quality' => $quality,
                                                                'courtesy' => $courtesy,
                                                                'rates' => $rates
                                                                ))->setPaper('legal', 'portrait');

        return $pdf->stream('PPDIS_Service-Request-#'.$id);
    }
}
