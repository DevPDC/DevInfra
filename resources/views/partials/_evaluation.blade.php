<div class="modal fade" aria-hidden="true" id="addEvaluation" role="document">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Evaluation Form</h3>
            </div>
            {!! Form::open(['route' => 'evaluation.store', 'method' => 'POST', 'data-parsley-validate']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6" hidden>
                        {{ Form::label('post_id','Request No.') }}
                        {{ Form::text('post_id',$selectedpost->id,['class' => 'form-control','readonly' => '','required' => '']) }}
                        {{ Form::text('user_id',Auth::user()->user_idno,['class' => 'form-control','hidden' => '','required' => '']) }}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-dark">
                            <div class="card-header">
                                {{ Form::label('rate_id','Help us to improve our service. Please evaluate the service rendered.') }}
                            </div>
                            <div class="card-body" style="display:flex">
                                <div class='radio-group'>
                                    <label class='radio-label'>
                                        <input name='rate_id' value="1" type='radio' id='1'>
                                        <span class='inner-label'>Poor</span>
                                    </label>
                                    <label class='radio-label'>
                                        <input name='rate_id' value="2" type='radio' id='2'>
                                        <span class='inner-label'>Acceptable</span>
                                    </label>
                                    <label class='radio-label'>
                                        <input name='rate_id' value="3" type='radio' id='3'>
                                        <span class='inner-label'>Good</span>
                                    </label>
                                    <label class='radio-label'>
                                        <input name='rate_id' value="4" type='radio' id='4'>
                                        <span class='inner-label'>Very Good</span>
                                    </label>
                                    <label class='radio-label'>
                                        <input name='rate_id' value="5" type='radio' id='5'>
                                        <span class='inner-label'>Excellent</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::text('evaluation_title','',['class' => 'form-control', 'placeholder' => 'Title of the evaluation', 'maxLength' => '50']) }}
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        {{Form::textarea('evaluation_body','',['class' => 'form-control', 'placeholder' => 'Content of the evaluation', 'rows' => '3', 'maxLength' => '150'])}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-reset"></i>Clear Values</button>
                <button class="btn btn-success btn-sm" type="submit">Submit Evaluation</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>