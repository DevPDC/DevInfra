<div class="modal fade" id="facilityImage" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Upload Image</h3>
            </div>
            {{ Form::open(['route' => ['facilityImage.store',$facility->id], 'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="input-group control-group increment" >
                                {{csrf_field()}}
                                <input type="file" name="filename" class="form-control">
                                <input type="text" value={{ Auth::user()->user_idno }} hidden aria-hidden="true" name="user_id">
                                <input type="text" value={{ $facility->id }} hidden aria-hidden="true" name="facility_id">
                                {{-- <div class="input-group-btn"> 
                                  <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>