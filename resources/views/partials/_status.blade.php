<div class="modal fade" tabindex="-1" role="document" id="changeStatus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title center">UPDATE STATUS</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="1" aria-hidden="true" hidden readonly>
                        <center>
                            <button type="submit" class="btn btn-sm btn-block btn-danger btn-ladda ladda-button" data-style="contract"><span
                                    class="ladda-label">Unfiltered</span><span class="ladda-spinner"></span></button>
                        </center>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="2" aria-hidden="true" hidden readonly>
                        <center>
                        <button type="submit" class="btn btn-sm btn-primary btn-ladda ladda-button" data-style="contract"><span
                                class="ladda-label">Pending</span><span class="ladda-spinner"></span></button>
                        </center>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="3" aria-hidden="true" hidden readonly>
                        <center>
                        @if(Auth::user()->role->role_id === 1 || 
                            Auth::user()->role->role_id === 2 || 
                            Auth::user()->role->role_id === 3 || 
                            Auth::user()->role->role_id === 1000)
                        <button type="submit" class="btn btn-sm btn-primary btn-ladda ladda-button" data-style="contract"><span
                                class="ladda-label">Received</span><span class="ladda-spinner"></span></button>
                        @else
                        <button type="submit" class="btn btn-sm btn-primary btn-ladda ladda-button" data-style="contract" disabled><span
                                class="ladda-label">Received</span><span class="ladda-spinner"></span></button>
                        @endif
                        </center>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="4" aria-hidden="true" hidden readonly>
                        <center>
                        @if(Auth::user()->role->role_id === 1 || 
                            Auth::user()->role->role_id === 2 || 
                            Auth::user()->role->role_id === 3 || 
                            Auth::user()->role->role_id === 1000)
                            <button type="submit" class="btn btn-sm btn-primary btn-ladda ladda-button" data-style="contract"><span
                                class="ladda-label">Inspecting</span><span class="ladda-spinner"></span></button>
                        @else
                            <button type="submit" class="btn btn-sm btn-primary btn-ladda ladda-button" data-style="contract" disabled><span
                                class="ladda-label">Inspecting</span><span class="ladda-spinner"></span></button>
                        @endif
                            </center>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="5" aria-hidden="true" hidden readonly>
                        <center>
                        @if(Auth::user()->role->role_id === 1 || 
                            Auth::user()->role->role_id === 2 || 
                            Auth::user()->role->role_id === 3 || 
                            Auth::user()->role->role_id === 1000)
                        <button type="submit" class="btn btn-sm btn-warning btn-ladda ladda-button" data-style="contract"><span
                                class="ladda-label">Need Materials</span><span class="ladda-spinner"></span></button>
                        @else 
                        <button type="submit" class="btn btn-sm btn-warning btn-ladda ladda-button" data-style="contract" disabled><span
                                class="ladda-label">Need Materials</span><span class="ladda-spinner"></span></button>
                        @endif
                        </center>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="6" aria-hidden="true" hidden readonly>
                        <center>
                        @if(Auth::user()->role->role_id === 1 || 
                            Auth::user()->role->role_id === 2 || 
                            Auth::user()->role->role_id === 3 || 
                            Auth::user()->role->role_id === 1000)
                            <button type="submit" class="btn btn-sm btn-info btn-ladda ladda-button" data-style="contract"><span class="ladda-label">Render Service</span><span class="ladda-spinner"></span></button>
                        @else 
                            <button type="submit" class="btn btn-sm btn-info btn-ladda ladda-button" data-style="contract" disabled><span class="ladda-label">Render Service</span><span class="ladda-spinner"></span></button>
                        @endif
                        </center>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="7" aria-hidden="true" hidden readonly>
                        <center>
                        @if(Auth::user()->role->role_id === 1 || 
                            Auth::user()->role->role_id === 2 || 
                            Auth::user()->role->role_id === 3 || 
                            Auth::user()->role->role_id === 1000)
                        <button type="submit" class="btn btn-sm btn-warning btn-ladda ladda-button" data-style="contract"><span
                                class="ladda-label">Pause Service</span><span class="ladda-spinner"></span></button>
                        @else 
                            <button type="submit" class="btn btn-sm btn-warning btn-ladda ladda-button" data-style="contract" disabled><span class="ladda-label">Pause Service</span><span class="ladda-spinner"></span></button>
                        @endif
                        </center>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::open(['route' => 'changestatus', 'method' => 'POST']) !!}
                        <input type="text" name="_token" id="insToken" value="{{ csrf_token() }}" hidden readonly>
                        <input type="text" id="post_id" name="post_id" aria-hidden="true" value="{{ $selectedpost->id }}" hidden readonly>
                        <input type="text" id="status" name="status" value="8" aria-hidden="true" hidden readonly>
                        <center>
                        @if(Auth::user()->role->role_id === 1 || 
                            Auth::user()->role->role_id === 2 || 
                            Auth::user()->role->role_id === 3 || 
                            Auth::user()->role->role_id === 1000)
                        <button type="submit" class="btn btn-sm btn-success btn-ladda ladda-button" data-style="contract"><span class="ladda-label">Complete</span><span class="ladda-spinner"></span></button>
                        @else 
                            <button type="submit" class="btn btn-sm btn-success btn-ladda ladda-button" data-style="contract" disabled><span class="ladda-label">Complete</span><span class="ladda-spinner"></span></button>
                        @endif
                        </center>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>