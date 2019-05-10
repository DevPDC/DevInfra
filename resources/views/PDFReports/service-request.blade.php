<!-- MyReport.view.php -->
<html>
    <head>
        <style>
            body {
                margin: 5px 5px  !important;
                font-size: 12px
            }

            label {
                font-family: Arial, Helvetica, sans-serif
            }

            hr {
                text-shadow: 0pt;
            }

            .page-break {
                page-break-after: always
            }

            .center {
                text-align:center
            }

            .bold {
                font-weight: bold
            }

            .uppercase {
                text-transform: uppercase
            }
            
            .underline
            {
                text-decoration: underline;
                text-underline-position: below
            }

            .italic {
                font-style: italic 
            }

            .bordered {
                border: 1px solid black
            }

            .justified {
                text-align:justify
            }

            .bg-grey {
                background: rgb(211, 211, 211)
            }
        </style>

    <title>My Report</title>
    </head>
    <body>
        <div>
            <img src="{{ asset('public/storage/logo/DA-philrice.png') }}" style="width: 50%; padding-top: -30px !important;">
            <img src="{{ asset('public/storage/logo/ppd-right.png') }}" style="width: 50%; padding-top: -40px !important; text-align: right">
        </div>
        <div style="padding-top: -25px">
            <div class="center bold underline">
                <h3><label>REQUEST FOR REPAIR/MAINTENANCE OF FACILITIES</label></h3>
            </div>
            <table style="width: 100%">
                <tr>
                    <td>
                        <label for="" class="uppercase bold">Part I. DETAILS OF REQUEST/REQUISITIONER</label>
                    </td>
                    <td>
                        <div style="text-align: right; width: 70%">
                            <div style="border: 1px dotted black; padding: 10px 5px 10px 5px !important; width: 100%">
                                JOB/TRACKING NO.: <label class="underline bold">{{ $ticket->ticket_full }}</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            @php
            // dd($post->emp_idno);
                $employee = App\Profile::select('emp_fullname','emp_cpno','emp_fullname')
                                    ->where('emp_idno', $post->emp_idno)
                                    ->first();

                
                $division = App\Division::join('hris.employees','emp_division','lib_divisions.id_division')
                                    ->select('division_name')
                                    ->where('emp_idno',$post->emp_idno)
                                    ->first();
            @endphp
            <div class="center">
                <table style="width: 100%; padding: 5px 5px 5px 5px; border: 1px solid black">
                    <tr>
                        <td style="width:50%">
                            <label>Name: <span class="underline">{{ $employee->emp_fullname }}</span></label>
                        </td>
                        <td style="width:50%">
                            <label>Division/Unit: 
                                <span class="underline">
                                    @if($division !== null)
                                        {{ $division->division_name }}
                                    @else 
                                        No Data Found
                                    @endif
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%">
                            <label>Contant No/s: <span class="underline">{{ $employee->emp_cpno }}</span></label>
                        </td>
                        <td style="width:50%">
                            <label>Date: <span class="underline">{{ date('M d, Y', strtotime($post->created_at)) }}</span></label>
                        </td>
                    </tr>
                </table>
            </div>
            {{-- <hr style="border-top: dotted 1px;" noshade="noshade"/> --}}
            <br><br>
            <div>
                <table style="width: 100%; margin: auto">
                    <tr>
                        <td style="width:50%">
                            <label>Request Title: <span class="underline">{{ $post->request_title }}</span></label>
                        </td>
                        <td style="width:50%">
                            <label>Nature of Maintenance Job: <span class="underline">{{ $post->category_name }} ({{ $post->category_abbr }})</span></label>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%">
                            <label>Requested Date of Completion: <span class="underline">{{ date('M d, Y', strtotime($post->proposed_service_date)) }}</span></label>
                        </td>
                        <td style="width:50%">
                            <label>Current Status: <span class="underline">{{ $post->status_name }} (as of {{ date('M d, Y h:i A') }})</span></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bordered" style="padding: 5px 10px 5px;">
                            <label>Request Description: <span class="underline">{{ $post->request_details }}</span></label>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="center">
                <br>
                <table style="width: 100%">
                    <tr>
                        <td style="width:50%">
                            @if($receiver->created_at == null)
                                <label>Time and Date Received: 
                                    <span class="underline">
                                        __________________________
                                    </span>
                                </label>
                            @else
                                <label>Time and Date Received: 
                                    <span class="underline">
                                            {{ date("M d, Y h:i A",strtotime($receiver->created_at)) }}
                                    </span>
                                </label>
                            @endif
                        </td>
                        <td style="width:50%">
                            <label>Received By: <span class="bold underline">{{ $receiver->emp_fullname }}</span></label>    
                        </td>
                    </tr>
                </table>
                <br><br>
                <br><br>
                <label class="italic" style="font-size: 10px">
                    @foreach($categories as $category)
                        <label class="bold">{{ $category->category_abbr }}</label> - {{ $category->category_name }};
                    @endforeach
                </label><br>
                <label class="bold italic">For works NOT covered/included in the given categories, a request letter shall be required; subject to approval of the management.</label>
            </div>
            <hr style="border: 1px dotted darkgrey;" noshade="noshade"/>
            <br>
            <label for="" class="uppercase bold">Part II. DETAILS OF OCULAR INSPECTION</label>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td style="width:50%">
                        <label>Time and Date Inspected: 
                            <span class="bold underline">
                                @if($inspection->created_at == null || $inspection->created_at == '0000-00-00 00:00:00')
                                    <span class="underline">
                                        __________________________
                                    </span>
                                @else
                                    <span class="underline">
                                        {{ date('M d, Y h:i A', strtotime($inspection->created_at)) }}
                                    </span>
                                @endif
                            </span>
                        </label>  
                    </td>
                    <td style="width:50%">
                        {{-- <label>Time and Date Received: <span class="bold underline">{{ $receiver->emp_fullname }}</span></label>   --}}
                    </td>
                </tr>
            </table>  
            <br>
            <table style="width: 100%; border: 1px solid black">
                <tr>
                    <td style="width:20%">
                        <label for="">
                            Details of Inspection
                        </label>   
                    </td>
                    <td style="width:80%; border: 1px solid black; padding: 5px">
                        <label for="">
                            {{ $inspection->details }}
                        </label>   
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <label for="">
                            Recommendation/s
                        </label>   
                    </td>
                    <td style="width:80%; border: 1px solid black; padding: 5px">
                        <label for="">
                            {{ $inspection->recommendation }}
                        </label>   
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <label for="">
                            Required Supplies
                        </label>   
                    </td>
                    <td style="width:80%; border: 1px solid black; padding: 5px">
                        <label for="">
                            @foreach($supplies as $supply)
                                {{-- {{ $supply->supply_name }},  --}}
                            @endforeach
                        </label>   
                    </td>
                </tr>
                <tr>
                    <td style="width:20%">
                        <label for="">
                            Proposed Schedule
                        </label>   
                    </td>
                    <td style="width:80%; border: 1px solid black; padding: 5px">
                        <label for="">
                            @php
                                // dd($inspection->created_at);
                                if($inspection->proposed_schedule != null)
                                {
                                    echo date('M d, Y', strtotime($inspection->proposed_schedule));
                                }
                            @endphp
                        </label>   
                    </td>
                </tr>
            </table>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td></td>
                    <td style="text-align: right; padding-right: 40px">
                        Approved By: <span class="underline bold">RENATO B. BAJIT</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right; padding-right: 40px">
                        PPD Head
                    </td>
                </tr>
            </table>
            <br>
            <hr noshade="noshade" style="border: 1px dotted darkgrey">
            <br><br>
            <label for="" class="uppercase bold">Part III. ACCEPTANCE OF COMPLETED JOB/PERFORMANCE EVALUATION</label>
            <br><br>
            <br>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <td class="bordered center bold" style="width:25%">
                            <label for="">Maintenance Crew/s</label>
                        </td>
                        <td class="bordered center bold" style="width:25%">
                            <label for="">Date</label>
                        </td>
                        <td class="bordered center bold" style="width:50%">
                            <label for="">Evaluation Details</label>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bordered center" style="width:25%">
                            @foreach($technicians as $tech)
                                <label for="">{{ $tech->emp_fullname }}</label>
                            @endforeach
                        </td>
                        <td class="" style="width:25%; border: 1px solid black">
                            <table style="width: 100%">
                                <tr>
                                    <td>
                                        <label for="">Start Date:</label>
                                    </td>
                                    <td>
                                        __________
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">End Date:</label>
                                    </td>
                                    <td>
                                        __________
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="bordered" style="width:50%">
                                <table style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="bordered bg-grey">
                                                <center>
                                                    Timeliness
                                                </center>
                                            </th>
                                            <th class="bordered bg-grey">
                                                <center>
                                                    Quality of Service
                                                </center>
                                            </th>
                                            <th class="bordered bg-grey">
                                                <center>
                                                    Service Courtesy
                                                </center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                                {{-- {{dd($evaluation)}} --}}
                                            <td class="bordered bold">
                                                <center>
                                                    @if($evaluation != null || $evaluation != '')
                                                        {{ $evaluation->rate_no }}
                                                    @endif
                                                </center>
                                            </td>
                                            <td class="bordered bold">
                                                <center>
                                                    @if($quality != null || $quality != '')
                                                        {{ $quality->rate_no }}
                                                    @endif
                                                </center>
                                            </td>
                                            <td class="bordered bold">
                                                <center>
                                                    @if($courtesy != null || $courtesy != '')
                                                        {{ $courtesy->rate_no }}
                                                    @endif
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width: 100%">
                                    <tr>
                                        <td>
                                            <label for="">Evaluation Title: 
                                                @if($evaluation != null || $evaluation != '')
                                                    <span class="bold">{{ $evaluation->evaluation_title }}</span>
                                                @endif
                                            </label>
                                        </td>
                                        <td style="width: 50%">
                                            <label for="">Date: 
                                                @if($evaluation != null || $evaluation != '')
                                                    @if($evaluation->created_at !== null)
                                                        <span class="bold">{{ date('M d, Y h:i A', strtotime($evaluation->created_at)) }}</span>
                                                    @endif
                                                @endif
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'>
                                            <label for="">Comments: 
                                                @if($evaluation != null || $evaluation != '')
                                                    <span class="bold justified">{{ $evaluation->evaluation_body }}</span>
                                                @endif
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <br>
                                        <td colspan='2' style="text-align: right">
                                            <label for="">Evaluated By:
                                                @if($evaluation != null || $evaluation != '')
                                                    <span class="bold justified">{{ $evaluation->emp_fullname }}</span>
                                                @endif
                                            </label>
                                            <hr>
                                        </td>
                                    </tr>
                                </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div style="text-align: right">
                <label style="font-size: 10px">***
                    @foreach($rates as $rate)
                        <label class="bold">{{ $rate->id }}</label> - <label class="italic">{{ $rate->rating_name }}</label>; 
                    @endforeach
                </label>
            </div>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 5%">
                        <label style="font-size: 10px">
                            <label class="bold">Note: </label>
                        </label>
                    </td>
                    <td>
                        <label style="font-size: 10px">
                            <label>Prioritization of request is based on the following: </label>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%">
                    </td>
                    <td>
                        <label style="font-size: 10px">
                             1. <label class="italic">First come, first served</label> basis (depending on the availability of supplies, schedule of assigned crew, and degree of works to be done).
                        </label>
                        <br>
                        <label style="font-size: 10px">
                                2. Emergency Cases (refers to sudden situations requiring immediate action; can lead to prolonged work disruption).
                        </label>
                    </td>
                </tr>
            </table>
            <br>
            <hr>
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%">
                        <label style="font-size: 9px; color: red" class="italic">
                                Print this form in 8.5x13 size, no page scaling.
                        </label>
                    </td>
                    <td style="width: 50%">
                        <label style="font-size: 10px" class="italic">
                            PhilRice Maintenance Request Rev 10 Effectivity Date: July 31, 2017
                        </label>
                    </td>
                </tr>
            </table>

        </div>
    </body>
</html>
