<div class="modal fade" aria-hidden="true" tabindex="-1" id="newTechnician" multiple="multiple">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header card-header" id="form-wrapper">
                <h4 class="form-header"><i class="fa fa-wrench"></i> ADD NEW TECHNICIANS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'technician.store', 'method' => 'POST', 'data-parsley-validate']) !!}
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text bg-secondary">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                                <input type="text" class="form-control" name="user_idno" id="searchEmpidText" placeholder="Search by Employee ID" required data-parsley-required=''>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="input-group">
                                    <div class="col-md-4">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text bg-secondary">
                                                <i class="fa fa-cog"></i>  Categories
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="select2 form-control" name="categories[]" id="categories" multiple="multiple" required data-parsley-required='' style="width: 100%"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" hidden aria-hidden="true">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::text('employeeid','',['id' => 'employeeid','class' => 'form-control' ,'required' => '', 'data-parsley-required' => '']) }}
                                    {{ Form::text('name','',['id' => 'name','class' => 'form-control' ,'required' => '', 'data-parsley-required' => '']) }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ Form::text('division','',['id' => 'division','class' => 'form-control']) }}
                                </div>
                                <div class="col-md-6">
                                    {{ Form::text('station','',['id' => 'station','class' => 'form-control']) }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ Form::text('contact','',['id' => 'contact','class' => 'form-control']) }}
                                </div>
                                <div class="col-md-6">
                                    {{ Form::text('email_official','',['id' => 'email_official','class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    Employee Name <span class="pull-right" id="empname"></span>
                                </li>
                                <li class="list-group-item">
                                    Official Email <span class="pull-right" id="emailoff"></span>
                                </li>
                                <li class="list-group-item">
                                    Division <span class="pull-right" id="divname"></span>
                                </li>
                                <li class="list-group-item">
                                    Station <span class="pull-right" id="statname"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <span class="pull-right">
                    <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>