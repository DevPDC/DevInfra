<div class="modal fade" tabindex="-1" role="document" id="changestatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title center">UPDATE STATUS</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="1" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Unfiltered</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="2" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Pending</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="3" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Received</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="4" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Under Inspection</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="5" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Need Materials</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="6" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Rendering Service</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="1" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Paused Service</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" id="post_id" name="post_id" aria-hidden="true">
                        <input type="text" id="status" name="status" value="1" aria-hidden="true">
                        <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span
                                class="ladda-label">Service Completed</span><span class="ladda-spinner"></span></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>