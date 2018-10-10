@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','ToastR')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')

@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i> Toastr Notifications
                        <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
                        <div class="card-header-actions">
                            <a class="card-header-action" href="https://codeseven.github.io/toastr/demo.html" target="_blank">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title</label>
                                    <input class="form-control" id="title" placeholder="Enter a title ..." type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="message">Message</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="Enter a message ..."></textarea>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="closeButton">
                                        <input id="closeButton" value="checked" type="checkbox"> Close Button
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="addBehaviorOnToastClick">
                                        <input id="addBehaviorOnToastClick" value="checked" type="checkbox"> Add
                                        behavior on toast click
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="debugInfo">
                                        <input id="debugInfo" value="checked" type="checkbox"> Debug
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="progressBar">
                                        <input id="progressBar" value="checked" type="checkbox"> Progress Bar
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="preventDuplicates">
                                        <input id="preventDuplicates" value="checked" type="checkbox"> Prevent
                                        Duplicates
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="addClear">
                                        <input id="addClear" value="checked" type="checkbox"> Add button to force
                                        clearing a toast, ignoring focus
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox" for="newestOnTop">
                                        <input id="newestOnTop" value="checked" type="checkbox"> Newest on top
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="control-group" id="toastTypeGroup">
                                    <label>Toast type</label>
                                    <div class="radio">
                                        <label>
                                            <input name="toasts" value="success" checked="" type="radio"> Success
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="toasts" value="info" type="radio"> Info
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="toasts" value="warning" type="radio"> Warning
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="toasts" value="error" type="radio"> Error
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group" id="positionGroup">
                                    <label>Toast position</label>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-top-right" type="radio"> Top Right
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-bottom-right" type="radio"> Bottom
                                            Right
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-bottom-left" type="radio"> Bottom Left
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-top-left" type="radio"> Top Left
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-top-full-width" type="radio"> Top Full
                                            Width
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-bottom-full-width" type="radio"> Bottom
                                            Full Width
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-top-center" type="radio"> Top Center
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="position" value="toast-bottom-center" type="radio"> Bottom
                                            Center
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="control-group">
                                    <div class="form-group">
                                        <label class="control-label" for="showEasing">Show Easing</label>
                                        <input class="form-control" id="showEasing" placeholder="swing, linear" value="swing"
                                            type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="hideEasing">Hide Easing</label>
                                        <input class="form-control" id="hideEasing" placeholder="swing, linear" value="linear"
                                            type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="showMethod">Show Method</label>
                                        <input class="form-control" id="showMethod" placeholder="show, fadeIn, slideDown"
                                            value="fadeIn" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="hideMethod">Hide Method</label>
                                        <input class="form-control" id="hideMethod" placeholder="hide, fadeOut, slideUp"
                                            value="fadeOut" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="control-group">
                                    <div class="form-group">
                                        <label class="control-label" for="showDuration">Show Duration</label>
                                        <input class="form-control" id="showDuration" placeholder="ms" value="300" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="hideDuration">Hide Duration</label>
                                        <input class="form-control" id="hideDuration" placeholder="ms" value="1000"
                                            type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="timeOut">Time out</label>
                                        <input class="form-control" id="timeOut" placeholder="ms" value="5000" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="extendedTimeOut">Extended time out</label>
                                        <input class="form-control" id="extendedTimeOut" placeholder="ms" value="1000"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="showtoast" type="button">Show Toast</button>
                        <button class="btn btn-danger" id="cleartoasts" type="button">Clear Toasts</button>
                        <button class="btn btn-danger" id="clearlasttoast" type="button">Clear Last Toast</button>
                        <div style="margin-top: 25px;">
                            <pre id="toastrOptions"></pre>
                        </div>
                    </div>
                </div>
@endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')

@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}