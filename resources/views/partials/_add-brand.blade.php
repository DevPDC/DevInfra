<div class="modal fade" id="addBrand" role="dialog" aria-hidden='true'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">
                    ADD BRAND FORM
                </span>
            </div>
            {{ Form::open(['route' => 'brand.store','method' => 'POST']) }}
            <div class="modal-body">
                {{ Form::label('brand_name','Brand Name:') }}
                {{ Form::text('brand_name','',['placeholder' => 'Name of Brand', 'class' => 'form-control']) }}

                {{ Form::text('user_id',Auth::user()->user_idno,['class' => 'form-control', 'hidden' => '']) }}
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger btn-sm" type="reset">Clear</button>
                <button class="btn btn-success btn-sm" type="submit">Add Brand</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>