<div class="modal fade" id="service-request" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'data-parsley-validate']) !!}
                <div class="modal-header">
                    <h4 class="modal-title center">CREATE SERVICE REQUEST</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if (Auth::user())
                                    {{ Form::text('user_id', Auth::user()->user_idno, ['class' => 'form-control', 'readonly' => '', 'maxLength' => '7']) }}
                                @else
                                    
                                @endif
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of Requester', 'readonly' => 'true']) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::text('division', 'Information Systems Division', ['class' => 'form-control', 'placeholder' => 'Name of Division', 'readonly' => 'true']) }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::text('contact', '1357911', ['class' => 'form-control', 'placeholder' => 'Contact No.', 'readonly' => 'true']) }}
                            </div>
                            <?php $date =  date('M d, Y') ?>
                            <div class="col-md-6">
                                {{ Form::text('date_of_request', "$date", ['class' => 'form-control', 'placeholder' => 'Date Today', 'readonly' => '']) }}
                                {{ Form::text('status_id', '1', ['hidden' => '']) }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                {{ Form::label('category_name', 'Category:') }}
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
                                {{ Form::textarea('request_details', '', ['class' => 'textarea form-control', 'required' => '', 'placeholder' => 'Request Details...', 'rows' => '3' ,'data-parsley-maxlength' => '150']) }}
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
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