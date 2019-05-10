<div class="modal fade" id="service-request" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card">
                {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'data-parsley-validate']) !!}
                <div class="modal-header" id="form-wrapper">
                    <h4 class="form-header">SERVICE REQUEST FORM</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if (Auth::user())
                                {{ Form::label('emp_id','Employee ID:') }}
                                {{ Form::text('emp_idno', Auth::user()->user_idno, ['class' => 'form-control', 'readonly' => '', 'maxLength' => '7']) }}
                            @else
                                
                            @endif
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    {{-- <br>
                    <div class="row">
                        <div class="col-md-6">
                            @if (Auth::user())
                                {{ Form::label('emp_fullname','Employee Fullname:') }}
                                {{ Form::text('name', Auth::user()->profile->emp_fullname, ['class' => 'form-control', 'placeholder' => 'Name of Requester', 'readonly' => 'true']) }}
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('division','Division:') }}
                            {{ Form::text('division', Auth::user()->profile->division->division_name, ['class' => 'form-control', 'placeholder' => 'Name of Division', 'readonly' => 'true']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('email_official','Official Email Address:') }}
                            {{ Form::text('contact', Auth::user()->profile->emp_email_official, ['class' => 'form-control', 'placeholder' => 'Contact No.', 'readonly' => 'true']) }}
                        </div> --}}
                        <?php $date =  date('M d, Y') ?>
                        {{-- <div class="col-md-6">
                            {{ Form::label('date','Date:') }}
                            {{ Form::text('date_of_request', "$date", ['class' => 'form-control', 'placeholder' => 'Date Today', 'readonly' => '']) }}
                            {{ Form::text('status_id', '1', ['hidden' => '']) }}
                        </div>
                    </div> --}}
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('request_title', 'Title:') }}
                            {{ Form::text('request_title','',['class' => 'form-control','placeholder' => 'Request Title...','maxLength' => '100']) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('proposed_service_date', 'Proposed Date of Service:') }}
                            <input type="date" class="form-control" name="proposed_service_date" id="datepicker">
                            <br>
                            {{ Form::label('category_id', 'Category:') }}
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::label('request_details', 'Details of Request:') }}
                            {{ Form::textarea('request_details', '', ['class' => 'textarea form-control', 'required' => '', 'placeholder' => 'Request Details...', 'rows' => '3' ,'maxLength' => '190','data-parsley-maxlength' => '150']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer card-footer">
                    {{ Form::text('logstatus', '1', ['hidden' => '']) }}
                    <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                </div>
                {!! Form::close() !!}
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->