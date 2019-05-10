<div class="modal fade" id="addFacilityProperties" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card">
            <div class="modal-header" id="form-wrapper">
                <div class="form-header">
                    <i class="fa fa-info-circle"></i> Facility Specifications
                </div>
            </div>
            <div class="modal-body card-body">
                <input type="text" id="category_input" hidden>
                <div>
                    <h4>Name: <span id="facility_name" class="text-teal"></span></h4>
                </div>
                <div>
                    <h4>Infrastructure: <span id="facility_category" class="text-teal"></span></h4>
                </div>
                <div>
                    <h4>Maintenance Schedule: <span id="facility_schedule" class="text-teal"></span></h4>
                </div>
                <div>
                    <h4>Description:</h4>
                </div>
                <textarea name="facility_description" id="facility_description" rows="3" class="form-control" readonly></textarea>
                <br>
                <div>
                    <h4>Specifications: 
                        <span class="pull-right">
                            <button class="btn btn-sm btn-primary" type="button" id="specRefresh"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-sm btn-primary" type="button" id="addSpecCategory"><i class="fa fa-plus-circle"></i> Specification Category</button>
                        </span>
                    </h4>
                    <hr>
                    <blockquote>
                        <div id="facility_specification"></div>
                    </blockquote>
                </div>
                <hr>
                {{ Form::open(['route' => 'facilityproperty.store', 'method' => 'POST','id' => 'formAddProperties']) }}
                <input type="text" class="form-control" id="add_facility_id" name="facility_id" hidden>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="property_id">Specification Category:</label>
                        <select name="property_id" id="property_id" class="form-control select2-properties" style="width:100%"></select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="property_value">Specification Value:</label>
                        <div class="col-md-12 input-group">
                            <input type="text" class="form-control" id="property_value" name="property_value" placeholder="Enter Specification Value..">
                            <span class="input-group-append">
                                <button class="btn btn-success btn-sm" type="button" id="btnSubmitForm"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" type="button" id="addGensetOperationButton">Update Operation</button>
                <button class="btn btn-danger btn-sm" type="button" id="btnDeleteFacility">Remove this Facility</button>
                <button class="btn btn-dark btn-sm" data-dismiss="modal" class="close">Close</button>
            </div>
        </div>
    </div>
</div>