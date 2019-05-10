<div class="modal fade" id="deleteFacility" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content card">
            <div class="modal-header bg-danger">
                <i class="fa fa-info"></i>
            </div>
            <div class="modal-body">
                <h4>Do you really want to delete this facility?</h4>
                <form id="frmDeleteFacility">
                    <input type="text" id="delete_facility_id" name="facility_id" class="form-control" hidden>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <button class="btn btn-block btn-outline-danger" type="submit">Delete</button>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button class="btn btn-block btn-outline-secondary" type="button" id="closeDeleteModal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>