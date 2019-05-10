<div class="modal fade" role="dialog" id="addSpecModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card">
            <div class="modal-header" id="form-wrapper">
                <div class="form-header">
                    List of Specs Categories
                </div>
            </div>
            {{ Form::open(['route' => 'property.store', 'method' => 'post', 'id' => 'addSpecForm']) }}
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <i class="fa fa-plus-circle"></i> New Specification Category:
                            <span class="pull-right">
                                <button class="btn btn-sm btn-success" type="submit" id="addSpecSubmit">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" type="reset">
                                    Clear
                                </button>
                            </span>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <label for="property_category_name">Specification Name:</label>
                            <input type="text" class="form-control" name="property_category_name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                                <label for="property_category_abbr">Specification Abbr:</label>
                            <input type="text" class="form-control" name="property_category_abbr">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-hover" id="dataTable-specs">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Property Category</th>
                                        <th>Property Abbrev.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
            <div class="modal-footer">
                <button class="btn btn-dark btn-sm" data-dismiss="modal" class="close">Close</button>
            </div>
        </div>
    </div>
</div>