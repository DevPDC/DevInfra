<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Services\DataTable;
use App\Notifications\MaintenanceAlert;
use App\Mail\SendTicketNumberToClient;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Eastwest\Json\Facades\Json;
use App\RequestTechnician;
use App\FacilityProperty;
use App\InspectionSupply;
use App\GensetCapacity;
use App\CancelRemark;
use App\Technician;
use App\Inspection;
use App\Evaluation;
use App\PDFReport;
use App\Operation;
use App\Category;
use App\Property;
use App\Receiver;
use App\Facility;
use App\Profile;
use Datatables;
use App\Status;
use App\Supply;
use App\Ticket;
use App\Brand;
use App\Posts;
use App\Rate;
use App\User;
use App\Role;
use App\Log;

class ApiController extends Controller
{
    public function insertNewServiceRequest(Request $request)
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
        ->select('emp_email_official')
        ->where('user_idno',$useremail)
        ->first();

        $ticket = $ticket_full;

        Mail::to($email->emp_email_official)->send(new SendTicketNumberToClient($ticket));

        return 'success';
    }

    public function getIndRequests($id)
    {
        $posts = Posts::where('user_id',$id)->get();

        return Datatables::of($posts)->make();
    }

    public function getAllRequests()
    {
        $allPosts = Posts::select('id','user_id','request_details','name','created_at')->get();
    }

    public function getIdentPostLog(Request $request)
    {
        $identPostLog = Log::join('lib_log_status','logstatus_id','=','lib_log_status.id')
                            ->select('created_at','name')
                            ->where('posts_id',$request->id)
                            ->orderBy('created_at','desc')
                            ->get();

        return Datatables::of($identPostLog)
                            ->addColumn('date',function($identPostLog) {
                                return date('M d, Y h:i A', strtotime($identPostLog->created_at));
                            })
                            ->escapeColumns([0,1,'date'])
                            ->make();
    }

    public function getPostSupplies(Request $request)
    {
        $postSupplies = DB::table('inspection_supply')
                            ->select('supply_name')
                            ->join('supplies','supply_id','=','supplies.id')
                            ->join('inspections','inspection_id','=','inspections.id')
                            ->where('inspections.posts_id',$request->id)
                            ->get();

                            return Datatables::of($postSupplies)->make();
    }

    public function getRequestOfUser(Request $request)
    {
        $allUserRequests = Posts::join('lib_status','status_id','=','lib_status.id')
                                    ->join('lib_categories','category_id','=','lib_categories.id')
                                    ->select('service_requests.id','category_name','service_requests.created_at','status_name')
                                    ->where('service_requests.user_id',$request->userid)
                                    ->orWhere('service_requests.emp_idno',$request->userid)
                                    ->get();
                                    
        return Datatables::of($allUserRequests)->make();
    }

    public function getFacilitiesInInfrastructure(Request $request)
    {
        $allFacilitiesInInfrastructure = Facility::select('id','name','details','created_at')
                                    ->where('infrastructure_id',$request->id)
                                    ->get();
                                    
        return Datatables::of($allFacilitiesInInfrastructure)
                            ->addColumn('action', function ($allFacilitiesInInfrastructure) {
                                return '<a href="'.route("facility.show",$allFacilitiesInInfrastructure->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
                            })
                            ->escapeColumns([0,1,2,3,'action'])
                            ->make();
    }

    public function getAllTechnicians(){
        $allTechnicians =   Technician::join('hris.employees','user_idno','=','employees.emp_idno')
                                        ->select('id','emp_fullname','emp_email_official','emp_cpno','is_active','emp_idno')
                                        ->get();

        return Datatables::of($allTechnicians)
                            ->addColumn('intro', function($allTechnicians) {
                                $tags = DB::table('category_technician')
                                        ->join('lib_categories','category_id','=','lib_categories.id')
                                        ->select('category_name')
                                        ->where('technician_id',$allTechnicians->id)
                                        ->get();

                                $newTags = json_decode( json_encode($tags), true);

                                $result[] = ''; 
                                foreach($newTags as $tags)
                                {
                                    foreach($tags as $tag)
                                    {

                                        if($tag == 'Masonry' || $tag == 'Painting Works' || $tag == 'Plumbing')
                                        {
                                            $class = 'badge-warning';
                                        }
                                        elseif($tag == 'Air Conditioning' || $tag == 'Welding')
                                        {
                                            $class = 'badge-primary';
                                        }
                                        elseif($tag == 'Electrical' || $tag == 'Roofing') 
                                        {
                                            $class = 'badge-danger';
                                        }

                                        $result[] .= "<span class='badge ".$class."'>".$tag."</span>";
                                    }
                                }
                                $newResult = json_decode( json_encode($result), true);
                                return $newResult;
                            })
                            ->addColumn('action', function($allTechnicians) {
                                return '<a href="'.route("profile.show", $allTechnicians->emp_idno).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
                            })
                            ->escapeColumns([0,1,2,3,4,5,'intro','action'])
                            ->make();
    }

    public function getAllRegisteredUsers(){
        $allRegisteredUsers = User::join('hris.employees','user_idno','=','employees.emp_idno')
                                    ->join('hris.lib_positions','employees.emp_position','=','lib_positions.id_position')
                                    ->select('users.id','user_idno','emp_fullname','position_name')
                                    ->get();

        return Datatables::of($allRegisteredUsers)
                            ->addColumn('intro',function($allRegisteredUsers){
                                $userRole = Role::join('role_user','roles.id','=','role_user.role_id')
                                                ->where('role_user.user_id',$allRegisteredUsers->id)
                                                ->select('name')
                                                ->first();
                                return $userRole['name'];
                            })
                            ->addColumn('action', function ($allRegisteredUsers) {
                                return '<a href="'.route("profile.show",$allRegisteredUsers['user_idno']).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
                            })
                            ->escapeColumns([0,1,2,3,'intro','action'])
                            ->make();
    }

    public function getAssignedTechnician(Request $request)
    {

        $assignedTechnicians = Technician::join('request_technician','technicians.id','=','request_technician.technician_id')
                                            ->join('hris.employees','user_idno','=','employees.emp_idno')
                                            ->select('emp_idno','emp_fullname','emp_email_official','emp_cpno')
                                            ->where('request_technician.post_id',$request->postid)
                                            ->get();

        
        return $assignedTechnicians->toJson(JSON_PRETTY_PRINT);

    }

    public function getFilteredFacilities(Request $request)
    {
        $facilities = Facility::where('infrastructure_id',4)->get();

        return $facilities->toJson(JSON_PRETTY_PRINT);
    }

    public function getWaterTank(Request $request)
    {
        $waterTank = Facility::select('coordinates')
                            ->where('infrastructure_id',1)
                            ->get();

        return $waterTank->toJson();
    }

    public function getWaterCanal(Request $request)
    {
        $waterCanal = Facility::select('coordinates')
                            ->where('infrastructure_id',2)
                            ->get();

        return $waterCanal->toJson();
    }

    public function getWaterPump(Request $request)
    {
        $waterPump = Facility::select('coordinates')
                            ->where('infrastructure_id',3)
                            ->get();

        return $waterPump->toJson();
    }

    public function getGeneratorSet(Request $request)
    {
        $genSet = Facility::select('coordinates')
                            ->where('infrastructure_id',4)
                            ->get();

        return $genSet->toJson();
    }

    public function getDrainage(Request $request)
    {
        $drainage = Facility::select('coordinates')
                            ->where('infrastructure_id',5)
                            ->get();

        return $drainage->toJson();
    }

    public function getBuilding(Request $request)
    {
        $building = Facility::select('coordinates')
                            ->where('infrastructure_id',$request->id)
                            ->get();

        return $building->toJson();
    }

    public function getTrees(Request $request)
    {
        $trees = Facility::select('coordinates')
                            ->where('infrastructure_id',7)
                            ->get();

        return $trees->toJson();
    }

    public function getBrands()
    {
        $brands = Brand::select('id','brand_name')->get();

        return $brands->toJson(JSON_PRETTY_PRINT);
    }

    public function getSupplies()
    {
        $supplies = Supply::select('supplies.id','supply_name','brand_name')->join('lib_supply_brands','brand_id','=','lib_supply_brands.id')->get();

        return $supplies->toJson(JSON_PRETTY_PRINT);
    }

    public function getCoordinateOfFacility(Request $request)
    {
        $genCoor = Facility::select('coordinates')
                            ->where('id',$request->id)
                            ->first();

        return $genCoor->toJson(JSON_PRETTY_PRINT);
    }

    public function getMaintenanceSchedule(Request $request)
    {
        $dt = date('Y-m-d');

        $sched = Maintenance::select('maintenance_schedule')
                                ->where('facility_id',$request->id)
                                ->first();

        return $sched->toJson(JSON_PRETTY_PRINT);
    }

    public function getTicketNumber(Request $request)
    {
        $id = $request->id;

        $ticket_no = Ticket::where('request_id',$id)->first();

        return $ticket_no;
    }

    public function getTicketDetails(Request $request)
    {
        $searchVal = $request->searchVal;

        $ticket_details = Posts::select('service_requests.id',
                                        'request_title',
                                        'request_details',
                                        'service_requests.created_at',
                                        'emp_fullname',
                                        'status_name',
                                        'category_name',
                                        'ticket_full')
                                ->join('lib_status','service_requests.status_id','lib_status.id')
                                ->join('lib_categories','service_requests.category_id','lib_categories.id')
                                ->join('request_tickets','request_tickets.request_id','service_requests.id')
                                ->join('hris.employees','service_requests.emp_idno','employees.emp_idno')
                                ->where('ticket_full',$searchVal)
                                ->orWhere('service_requests.id',$searchVal)
                                ->first();

        if($ticket_details->ticket_full != null)
        {
            return $ticket_details->toJson(JSON_PRETTY_PRINT);
        }
        else
        {
            $ticket_null = null;
            return $ticket_null;
        }
    }

    public function getReceiver(Request $request)
    {
        $postid = $request->postid;

        $receiver = Receiver::select('receive_posts.created_at',
                                    'emp_fullname',
                                    'emp_idno')
                            ->join('hris.employees',
                                    'receiver_id',
                                    'employees.emp_idno')
                            ->where('request_id',1)
                            ->first();
        // dd($receiver);
        return $receiver->toJson(JSON_PRETTY_PRINT);
    }

    public function getFacilityProperties()
    {
        $properties = Property::all();

        return $properties->toJson(JSON_PRETTY_PRINT);
    }

    public function getFacilityPropertiesDatable()
    {
        $propertiesDatatable = Property::all();

        return Datatables::of($propertiesDatatable)
                            ->addColumn('action', function ($propertiesDatatable) {
                                return '<a href="'.route("property.show",$propertiesDatatable['id']).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
                            })
                            ->escapeColumns([0,1,2,'action'])
                            ->make();
    }

    public function getFacilitySpecifications(Request $request)
    {
        $facilityid = $request->facilityid;

        $specs = FacilityProperty::select('property_value','property_category_name')
                                    ->join('lib_property_categories','property_id','lib_property_categories.id')
                                    ->where('facility_id', $facilityid)
                                    ->get();

        return $specs->toJson(JSON_PRETTY_PRINT);
    }

    public function getGeneratorCapacity(Request $request)
    {
        $gensetid = $request->gensetid;

        $capacity = GensetCapacity::where('genset_facility_id',$gensetid)
                                ->get();

        return $capacity->toJson(JSON_PRETTY_PRINT);
    }

    public function getLatestLog(Request $request)
    {
        $ticket = $request->ticketid;

        $id = Ticket::where('ticket_full', $ticket)
                    ->select('request_id')
                    ->first();

        $latest = Log::where('posts_id', $id->request_id)
                    ->latest('id', 'desc')
                    ->first();

        return $latest->toJson(JSON_PRETTY_PRINT);
    }

    public function getProgress(Request $request)
    {
        $postid = $request->postid;

        $latest = Log::where('posts_id', $postid)
                    ->latest('id', 'desc')
                    ->first();
                    // dd($latest);

        if($latest == null)
        {
            return '2';
        } else {
            return $latest->toJson(JSON_PRETTY_PRINT);
        }
    }

    public function getPercentageOfGenset(Request $request)
    {
        $per = GensetCapacity::where('genset_facility_id', $request->gensetid)->first();
        $cap = $per->capacity_max;
        // return $cap;

        $opt = Operation::select('hours_operated')
                            ->where('is_active', 1)
                            ->where('genset_id', $request->gensetid)
                            ->get();
                            
        $opthours = null;

        for($i=0; $i<count($opt); $i++)
        {

            $opthours = $opthours + $opt[$i]->hours_operated;

        }

        $percentage = $opthours/$cap*100;

        return $percentage;

    }

    public function getGensetOperation(Request $request)
    {
        $opt = Operation::where('genset_id', $request->id)
                            ->where('is_active', 1)
                            ->select('date_of_operation_start','date_of_operation_end','hours_operated','is_active','created_at')
                            ->get();

        return Datatables::of($opt)->make();
    }

    public function getGensetAllOperation(Request $request)
    {
        $opt = Operation::where('genset_id', $request->id)
                            ->select('date_of_operation_start','date_of_operation_end','hours_operated','is_active','created_at')
                            ->get();

        return Datatables::of($opt)->make();
    }

    public function getCurrentOperationHours(Request $request)
    {
        $opt = Operation::select('hours_operated')
                            ->where('is_active', 1)
                            ->where('genset_id', $request->gensetid)
                            ->get();

        $opthours = null;

        for($i=0; $i<count($opt); $i++)
        {
        
            $opthours = $opthours + $opt[$i]->hours_operated;
        
        }

        return $opthours;
    }

    public function getTotalOperationHours(Request $request)
    {
        $opt = Operation::select('hours_operated')
                            ->where('genset_id', $request->gensetid)
                            ->get();

        $opthours = null;

        for($i=0; $i<count($opt); $i++)
        {
        
            $opthours = $opthours + $opt[$i]->hours_operated;
        
        }

        return $opthours;
    }

    public function revertCurrentOperation(Request $request)
    {
        $opt = Operation::where('genset_id', $request->gensetid)
                        ->where('is_active', 1)
                        ->get();

        for($i=0; $i<count($opt); $i++)
        {
            $opt[$i]->is_active = 0;
            
            $opt[$i]->save();
        }

        $opthours = null;

        for($i=0; $i<count($opt); $i++)
        {
        
            $opthours = $opthours + $opt[$i]->hours_operated;
        
        }

        if($opthours == null)
        {
            return '0';
        }
        else 
        {
            return $opthours;
        }
    }

    public function getRequesterProfile(Request $request)
    {
        if($request->id != null)
        {
            $id = $request->id;
        } else if($request->id2 != null)
        {
            $id = $request->id2;
        }

        $profile = Profile::select('emp_fullname')
                            ->where('emp_idno',$id)->first();

        return $profile->emp_fullname;
    }

    public function delFacility(Request $request)
    {
        
        $facility = Facility::find($request->id);

        $facility->delete();

        return 'success';
    }

    public function storeGeneratorCapacity(Request $request)
    {

        $gencapacity = new GensetCapacity;

        $gencapacity->capacity_max = $request->capacity_max;
        $gencapacity->genset_facility_id = $request->genset_facility_id;

        $gencapacity->save();

        return $gencapacity->capacity_max;
    }

    public function modifyGeneratorCapacity(Request $request)
    {

        $gencapacity = GensetCapacity::where('genset_facility_id', $request->genset_facility_id)->first();

        $gencapacity->capacity_max = $request->capacity_max;

        $gencapacity->save();

        return $gencapacity->capacity_max;
    }

    public function getServiceReport(Request $request)
    {
        $id = $request->postid;

        $post = Posts::join('hris.employees','service_requests.emp_idno','employees.emp_idno')
                        ->join('lib_status','status_id','lib_status.id')
                        ->join('lib_categories','category_id','lib_categories.id')
                        ->select('emp_idno',
                                'emp_fullname',
                                'emp_cpno',
                                'request_title',
                                'request_details', 
                                'service_requests.created_at',
                                'status_name',
                                'category_name',
                                'category_abbr')
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
        $getDiv = Division::join('hris.employees','emp_division','lib_divisions.id_division')
                            ->select('division_name')
                            ->where('emp_idno',$post->emp_idno)
                            ->first();

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
            $receiver->created_at = '';
        }

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
                                    ->join('lib_ratings','rate_id','lib_ratings.id')
                                    ->select('evaluations.id','evaluation_title','evaluation_body','evaluations.created_at','rating_name','emp_fullname','lib_ratings.id AS rate_no')
                                    ->get();

        if($evaluation->count() == 0)
        {
            $evaluation[0] = new Evaluation;

            $evaluation[0]->id = null;
            $evaluation[0]->evaluation_title = '';
            $evaluation[0]->evaluation_body = '';
            $evaluation[0]->created_at  = null;
            $evaluation[0]->rating_name = '';
            $evaluation[0]->emp_fullname = '';
            $evaluation[0]->rate_no = null;
        }

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
                                                                'rates' => $rates,
                                                                'division' => $getDiv
                                                                ))->setPaper('legal', 'portrait');

        return $pdf->stream('PPDIS_Service-Request-#'.'4');
    }

    public function getServiceCategories()
    {
        $categories = Category::all();

        return $categories->toJson(JSON_PRETTY_PRINT);
    }

    public function updateStatusToReceived(Request $request)
    {
        $id = $request->id;

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

        $email = User::join('hris.employees','user_idno','=','employees.emp_idno')
                        ->select('emp_email_official')
                        ->where('user_idno',$useremail)
                        ->first();

        $ticket = $ticket_full;
        // dd($useremail);
        if($email != null)
        {
            Mail::to($email->emp_email_official)->send(new SendTicketNumberToClient($ticket));
        }

            $logstatus = '3';

            $receiver = Auth::user()->user_idno;

            $receive = new Receiver;

            $receive->request_id = $post->id;
            $receive->receiver_id = $receiver;

            $receive->save();

        return 'success';
    }

    public function insertNewFacility(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'infrastructure_id' => 'required',
            'coordinates' => 'required',
            'details' => 'required'
        ]);

        $facility = new Facility;

        $facility->name = $request->name;
        $facility->infrastructure_id = $request->infrastructure_id;
        $facility->coordinates = $request->coordinates;
        $facility->details = $request->details;

        $facility->save();

        Session::flash('success','New Facility has been added to the map! Please reload if not automatically added to the dashboard.');

        return $facility->toJson(JSON_PRETTY_PRINT);
    }

    public function modifyTechnician(Request $request)
    {
        
        $post = Posts::find($request->id);

        $post->technician()->detach();
        $post->technician()->sync($request->technicians, false);

        $assignedTechnicians = Technician::join('request_technician','technicians.id','=','request_technician.technician_id')
                                            ->join('hris.employees','user_idno','=','employees.emp_idno')
                                            ->select('emp_idno','emp_fullname','emp_email_official','emp_cpno')
                                            ->where('request_technician.post_id',$request->id)
                                            ->get();

        
        return $assignedTechnicians->toJson(JSON_PRETTY_PRINT);
        
    }
    
    public function cancelRequest(Request $request)
    {
        $id = $request->id;

        $post = Posts::find($id);
        $post->status_id = '1';

        $post->save();

        $remark = new CancelRemark;

        $remark->request_id = $id;
        $remark->cancel_remark = $request->cancel_remark;
        $remark->cancelled_by = $request->cancelled_by;

        $remark->save();

        return 'success';
    }

    public function getCurrentStatus(Request $request)
    {
        $status = Posts::select('status_name')
                        ->join('lib_status','status_id','lib_status.id')
                        ->where('service_requests.id',$request->id)
                        ->first();

        return $status->toJson(JSON_PRETTY_PRINT);
    }

    public function insertEvaluation(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required',
            'user_id' => 'required',
            'rate_id' => 'required',
            'evaluation_title' => 'max:50',
            'evaluation_body' => 'max:150'
        ]);

        $evaluation = new Evaluation;

        $evaluation->post_id = $request->post_id;
        $evaluation->user_id = $request->user_id;
        $evaluation->rate_id = $request->rate_id;
        $evaluation->evaluation_title = $request->evaluation_title;
        $evaluation->evaluation_body = $request->evaluation_body;
        
        $evaluation->save();

        $log = new Log;

        $log->posts_id = $request->post_id;
        $log->logstatus_id = '11';

        $log->save();

        return 'success';
    }

    public function getCategorySelect() {
        $categories = Category::all();

        return $categories->toJson();
    }

    public function getStatusSelect() {
        $status = Status::all();

        return $status->toJson();
    }

    public function generateSummarizeServiceReport(Request $request) {
        $status = Status::find($request->status);
        $category = Category::find($request->category);
        $from = date('Y-m-d h:i:s', strtotime($request->from));
        $to = date('Y-m-d h:i:s', strtotime($request->to));

        $posts = Posts::select('service_requests.id',
                                'emp_idno',
                                'status_id',
                                'category_id',
                                'proposed_service_date',
                                'request_title',
                                'request_details',
                                'service_requests.created_at',
                                'service_requests.updated_at')
                                ->join('lib_categories','service_requests.category_id','lib_categories.id')
                                ->join('lib_status','status_id','lib_status.id')
                                ->where('category_id',$category->id)
                                ->where('status_id',$status->id)
                                ->whereDate('service_requests.updated_at','>=', $from)
                                ->whereDate('service_requests.updated_at','<=', $to)
                                ->get();

                                // dd($posts);

        $pdf = PDF::loadview('PDFReports.summary-service',array('from' => $from,
                                                                'to' => $to, 
                                                                'category' => $category,
                                                                'status' => $status,
                                                                'posts' => $posts
                                                                ))
                                                                ->setPaper('legal', 'landscape');
        
        return $pdf->stream('PPDIS-Summarize Request');
    }
}
    