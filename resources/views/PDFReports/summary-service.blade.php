<!-- MyReport.view.php -->
<html>
    <head>
        <style>
            body {
                margin: 5px 5px  !important;
                font-size: 12px
            }

            label {
                font-family: Arial, Helvetica, sans-serif;
                text-transform: capitalize
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

            .bg-blue {
                background:darkcyan;
                color: white;
            }

            .spacing-1 {
                letter-spacing: 1px
            }

            .spacing-2 {
                letter-spacing: 2px
            }

            .spacing-3 {
                letter-spacing: 3px
            }

            .text-orange {
                color:orangered
            }

            .text-blue {
                color:darkslategray
            }

            td {
                padding: 5px 5px 5px 5px;
            }

            #inside-table td {
                padding: 0px 5px 0px 5px;
            }
        </style>

    <title>My Report</title>
    </head>
    <body>
        <div>
            <img src="{{ asset('public/storage/logo/DA-philrice.png') }}" style="width: 25%; padding-top: -50px !important; float: left">
            <img src="{{ asset('public/storage/logo/ppd-right.png') }}" style="width: 25%; padding-top: -10px !important; float: right">
        </div>
        <div style="padding-top: 15px">
            <div class="center">
                <label class="spacing-1" style="font-size:18px">Physical Plant Division Information System</label><br>
                <label style="font-size:14px">Service Summary Report</label>
            </div>
            <br>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td width="5%">
                    </td>
                    <td width="10%">
                        <label class="bold text-orange">Category: </label>
                    </td>
                    <td width="30%">
                        <label>{{ $category->category_name }} </label>
                    </td>
                    <td width="20%">
                    <td width="10%">
                        <label class="bold text-orange">No. of Record/s: </label>
                    </td>
                    <td width="20%">
                        <label>{{ $posts->count() }} </label>
                    </td>
                    <td width="5%">
                </tr>
                <tr>
                    <td width="5%">
                    </td>
                    <td width="10%">
                        <label class="bold text-orange">Status: </label>
                    </td>
                    <td width="30%">
                        <label>{{ $status->status_name }} </label>
                    </td>
                    <td width="10%">
                    <td width="45%" colspan='3'></td>
                </tr>
                <tr>
                    <td width="5%">
                    </td>
                    <td width="10%">
                        <label class="bold text-orange">Inclusive Dates: </label>
                    </td>
                    <td width="30%">
                        <label>{{ date('M d, Y',strtotime($from)) }} - {{ date('M d, Y',strtotime($to)) }}</label>
                    </td>
                    <td width="10%">
                    <td width="45%" colspan='3'></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th width="5%" class="center bg-blue">
                            Request No.
                        </th>
                        <th width="60%" class="center bg-blue">
                            Details
                        </th>
                        <th width="10%" class="center bg-blue">
                            Date of Latest Status Update
                        </th>
                        <th width="20%" class="center bg-blue">
                            From
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $p)
    
                        <tr>

                            <td width="5%" class="bordered">
                                <center>
                                    {{ $p->id }}
                                </center>
                            </td>

                            <td width="70%" class="bordered">
                                <table width="100%" id="inside-table">
                                    <tr>
                                        <td width="25%">
                                            <label for="" class="text-blue">Date Submitted: </label> 
                                        </td>
                                        <td width="25%">
                                            <label for="" class="text-orange">{{ date('M d, Y', strtotime($p->created_at)) }}</label>
                                        </td>
                                        <td width="35%">
                                            <label for="" class="text-blue">Requested Date of Completion: </label> 
                                        </td>
                                        <td width="15%">
                                            <label for="" class="text-orange">
                                                @if($p->proposed_service_date == null || $p->proposed_service_date == '')

                                                @else
                                                    {{ date('M d, Y', strtotime($p->proposed_service_date)) }}
                                                @endif
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="15%">
                                            <label for="" class="text-blue">Subject: </label> 
                                        </td>
                                        <td width="85%" colspan='3'>
                                            <label for="">{{ $p->request_title }}</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="15%">
                                            <label for="" class="text-blue">Description: </label> 
                                        </td>
                                        <td width="85%" colspan='3'>
                                            <label for="">{{ $p->request_details }}</label>
                                        </td>
                                    </tr>
                                </table>
                                
                            </td>

                            <td width="20%" class="center bordered">
                                <label for="">
                                    {{ date('M d, Y', strtotime($p->updated_at)) }}
                                </label>
                            </td>

                            <td width="20%" class="bordered">
                                @php
                                    $profile = App\Profile::select('emp_fullname','division_name')->leftjoin('lib_divisions','emp_division','lib_divisions.id_division')->where('emp_idno',$p->emp_idno)->first();
                                @endphp
                                <label for="">
                                    {{ $profile->emp_fullname }}
                                </label>
                                <br>
                                <small for="" class="text-orange small">{{ $profile->division_name }}</small>
                            </td>

                        </tr>
    
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
