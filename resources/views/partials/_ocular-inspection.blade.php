<div class="modal fade" aria-hidden="true" id="addOcularInspection" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center"><i class="fa fa-pencil"></i> OCULAR INSPECTION DETAILS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['route' => 'inspection.store', 'method' => 'POST' ,'id' => 'inspectionModalForm', 'data-parsley-validate']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label style="text-align:center">*Service Request ID #{{ $selectedpost->id }}</label>
                        <input type="text" class="form-control" name="posts_id" value="{{ $selectedpost->id }}" readonly hidden>
                    </div>
                </div>
                    <!-- Date -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Proposed Date of Service:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control pull-right" name="proposed_sched" id="datepicker" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-wrench"></i>
                                        </span>
                                    </span>
                                </div> --}}
                                <!-- /.input group -->
                                <label style="text-align:center">Load Points</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" name="load_points" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ Form::textarea('details','',['class' => 'form-control' ,'rows' => '3','placeholder' => 'Details of inspection','noresize' => '', 'maxlength' => '255','required' => '']) }}
                    <br>
                    {{ Form::textarea('recommendation','',['class' => 'form-control' ,'rows' => '3','placeholder' => "Inspector's Recommendation",'noresize' => '', 'maxlength' => '255','required' => '']) }}
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <label>Supply/ies</label>
                            <select class="form-control select2-supplies" name="supplies[]" id="select2" multiple="multiple" width="100%" style="width: 100%"></select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Cancel</button>
                <button class="btn btn-sm btn-primary" id="addSupply"><i class="fa fa-plus"></i> Add Supply</button>
                <button class="btn btn-success btn-sm" type="submit" id="submit-button"><i class="fa fa-check"></i> Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>