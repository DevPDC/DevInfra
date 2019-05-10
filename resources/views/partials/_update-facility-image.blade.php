<div class="modal fade" role="dialog" id="facilityImageUpdate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Image</h3>
            </div>
            {{ Form::open(['route' => ['facilityImage.update',$facility->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-body">
                    <input type="file" class="form-data" name="updateFile">
                    <input type="text" class="form-data" name="user_id" value="{{ Auth::user()->user_idno }}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-sm" type="submit">Update</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>