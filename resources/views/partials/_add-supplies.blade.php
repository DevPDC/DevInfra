<div class="modal fade" role="dialog" id="addSupplyForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">ADD NEW SUPPLY</div>
            {{ Form::open(['route' => 'supply.store', 'method' => 'POST', 'data-parsley-validate' => '']) }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    {{ Form::label('supply_name','Supply Name:') }}
                                    {{ Form::text('supply_name','', ['placeholder' => 'Name of item','class' => 'form-control', 'data-parsley-required' => '', 'required' => '', 'maxLength' => '100']) }}
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    {{ Form::label('quantity','Initial Quantity:') }}
                                    {{ Form::text('quantity','', ['placeholder' => 'Quantity of supplies inserted','class' => 'form-control']) }}
                                </div>
                            </div>
                            <br>
                            {{ Form::label('brand_id','Select Brand') }}
                            <select name="brand_id" class="form-control select2-brands" style="width:100%"></select>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="reset">
                        Clear
                    </button>
                    <button class="btn btn-sm btn-success" type="submit">
                        Submit
                    </button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>