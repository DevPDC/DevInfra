<div class="modal fade" id="reportGenerateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fa fa-file-pdf-o"></i> Generate Summarize Report
                </div>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-4">
                    <ul class="nav" role="tablist" style="display:block">
                        <li class="nav-item">
                            <a class="nav-link active btn btn-outline-dark" data-toggle="tab" href="#summary" role="tab" aria-controls="home" style="border-radius: 20px; margin-right:10px; padding-left: 25px; padding-right: 25px; letter-spacing: 1px">
                                Summary</a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-dark" data-toggle="tab" href="#evaluation" role="tab" aria-controls="profile" style="border-radius: 20px; margin-right:10px; padding-left: 25px; padding-right: 25px; letter-spacing: 1px">
                                Evaluation</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        {{-- TAB CONTENT NO.1 --}}
                            <div class="tab-pane active card" id="summary" role="tabpanel" style="margin-bottom:0px">
                                {{ Form::open(['route' => 'summarize-report', 'target' => '_blank', 'method' => 'get', 'data-parsley-validate']) }}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category_id">Select Category: </label>
                                            <select id="category_id" name="category" class="form-control" style="border:1px solid black; width:100%" required>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Select Status: </label>
                                            <select id="status_id" name="status" class="form-control" style="border:1px solid black; width:100%" name="" required>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="category_id">From: </label>
                                                    <input type="text" class="form-control" id="from_date" name="from" placeholder="From..." style="border:1px solid black" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="category_id">To: </label>
                                                    <input type="text" class="form-control" id="to_date" name="to" placeholder="To..." style="border:1px solid black" required>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <span class="small text-red">* date format: <span class="bold"> mm/dd/yy</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 text-center">
                                                <button class="btn btn-outline-primary" type="submit" id="generateSummaryBtn" style="border-radius: 20px; padding-left: 25px; padding-right: 25px; letter-spacing: 1px">Generate</button>
                                                <button class="btn btn-outline-danger" type="reset" id="clearSummaryBtn" style="border-radius: 20px; padding-left: 25px; padding-right: 25px; letter-spacing: 1px">Clear Fields</button>
                                            </div>
                                        </div>
                                    </div>  
                                {{ Form::close() }}
                            </div>
                        {{-- END OF TAB CONTENT NO. 1 --}}

                        {{-- TAB CONTENT NO. 2 --}}

                        <div class="tab-pane card" id="evaluation" role="tabpanel" style="margin-bottom:0px">
                            <div class="card-body">
                                2. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.
                            </div>
                        </div>
                        
                        {{-- END OF TAB CONTENT NO. 2 --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>