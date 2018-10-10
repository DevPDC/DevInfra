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
                    <!-- Date -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>*Service Request ID</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-wrench"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" name="posts_id" value="{{ $selectedpost->id }}" readonly>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Proposed Date of Service:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control pull-right" name="proposed_sched" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    {{ Form::textarea('details','',['class' => 'form-control' ,'rows' => '3','placeholder' => 'Details of inspection','noresize' => '', 'maxlength' => '255']) }}
                    <br>
                    {{ Form::textarea('recommendation','',['class' => 'form-control' ,'rows' => '3','placeholder' => "Inspector's Recommendation",'noresize' => '', 'maxlength' => '255']) }}
                    <br>
                    <div id="supply-wrapper">

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