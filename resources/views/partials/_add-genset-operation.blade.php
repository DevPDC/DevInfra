<div class="modal fade" id="addGensetOperation" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header" id="form-wrapper">
                <div class="form-header">
                    GenSet Operation
                </div>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h4>Maximum Hours of Operation: 
                                    <span id="generator_capacity" class="text-teal">
                                            {{ Form::open(["id" => "genCapacityForm"]) }}
                                            {{ Form::close() }}
                                    </span>
                                </h4>
                                <div id="capacityEditForm" hidden>
                                    <div class="card">
                                        <div class="card-body">
                                            {{ Form::open(["id" => "modifyGensetCapacity"]) }}
                                                <label for="capacity_max">Maximum Operation Hours:</label>
                                                <input type="text" class="form-control" name="capacity_max" id="capacity_max_modify">
                                                <br>
                                                <button class="btn btn-primary btn-sm btn-block" id="submitModifyButton" type="submit">
                                                    <i class="fa fa-submit"></i> Submit
                                                </button>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" type="button" id="editCapacityButton"><i class="fa fa-edit"></i> Modify Capacity</button>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h4>Hours Operated: </h4>
                                <blockquote>
                                    <h5>Current: 
                                        <span id="current_operation_hours" class="text-teal"></span> 
                                        <button class="btn btn-outline-danger btn-sm" type="submit" id="resetCurrent"><i class="fa fa-refresh"></i> Reset Current Reading</button>
                                    </h5>
                                </blockquote>
                                <blockquote>
                                    <h5>Total:
                                        <span id="total_operation_hours" class="text-teal"></span>
                                    </h5>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Set Capacity Form Wrapper --}}
                <div id="gen-setcap-wrapper"></div>
                <ul class="progress-tracker progress-tracker--border progress-tracker--center">

                    <li class="progress-step" id="per-0">
                          <span class="progress-marker">0%</span>
                    </li>

                    <li class="progress-step" id="per-10">
                          <span class="progress-marker">10%</span>
                    </li>
              
                    <li class="progress-step" id="per-20">
                          <span class="progress-marker">20%</span>
                    </li>
                    
                    <li class="progress-step" id="per-30">
                          <span class="progress-marker">30%</span>
                    </li>
              
                    <li class="progress-step" id="per-40">
                          <span class="progress-marker">40%</span>
                    </li>
                    
                    <li class="progress-step" id="per-50">
                          <span class="progress-marker">50%</span>
                    </li>
              
                    <li class="progress-step" id="per-60">
                          <span class="progress-marker">60%</span>
                    </li>
                    
                    <li class="progress-step" id="per-70">
                          <span class="progress-marker">70%</span>
                    </li>
              
                    <li class="progress-step" id="per-80">
                          <span class="progress-marker">80%</span>
                    </li>
                    
                    <li class="progress-step" id="per-90">
                          <span class="progress-marker">90%</span>
                    </li>
              
                    <li class="progress-step" id="per-100">
                          <span class="progress-marker">100%</span>
                    </li>
                </ul>
                <div class="card">
                    <div class="card-header bg-primary">Update Operation 
                        <span class="pull-right">
                            <button class="btn btn-sm btn-outline-dark" type="submit" id="addOperationButton"><i class="fa fa-save"></i> Submit Operation</button>
                            <button class="btn btn-sm btn-outline-dark" type="button" id="viewOperationButton"><i class="fa fa-eye"></i> Recent Operations</button>
                            <button class="btn btn-sm btn-outline-dark" type="button" id="viewAllOperationButton"><i class="fa fa-eye"></i> View All Operations</button>
                        </span>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'operation.store', 'method' => 'POST', 'id' => 'addOperationHours']) }}
                            <input type="text" id="genset_facility_id" class="genset_facility_id form-control" name="genset_facility_id" hidden>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="date_of_operation">Start of Operation:</label>
                                    <input type="datetime" id="date_of_operation_start" name="date_of_operation_start" class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label for="date_of_operation">End of Operation:</label>
                                    <input type="datetime" id="date_of_operation_end" name="date_of_operation_end" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="date_of_operation">Hour/s:</label>
                                    <input type="datetime" id="hours_operated" name="hours_operated" class="form-control" readonly>
                                </div>
                                <br>
                                <div class="col-md-12">
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <table class="table table-outline table-primary" id="operationDatatable">
                    <thead>
                        <tr>
                            <th>Start of Operation</th>
                            <th>End of Operation</th>
                            <th>Total Hours Operated</th>
                            <th>Active</th>
                            <th>Date Uploaded</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>