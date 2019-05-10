<div class="modal fade" aria-hidden="true" id="modifyTechnician" tabindex="-1" role="document">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center">Change/Update Technician</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'modifyTechnicianForm']) }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::text('postid',$selectedpost->id,['class' => 'form-control', 'id' => 'request_id']) }}
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="technicians[]" id="technicians2" style="width:100%" multiple="multiple"></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="pull-right">
                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </span>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>