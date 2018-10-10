@extends('layouts.coreui')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','Loading Buttons')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
    {{ Html::style('coreui/css/ladda/css/ladda-themeless.min.css') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')
                <div class="card">
                    <div class="card-header">
                        <i class="icon-cursor"></i> Loading buttons - Ladda
                        <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
                        <div class="card-header-actions">
                            <a class="card-header-action" href="https://github.com/hakimel/Ladda" target="_blank">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>A UI concept which merges loading indicators into the action that invoked them. Primarily
                            intended for use with forms where it gives users immediate feedback upon submit rather than
                            leaving them wondering while the browser does its thing.</p>
                        <div class="row text-center">
                            <div class="col-md-3 py-4">
                                <h6>expand-left</h6>
                                <button class="btn btn-success btn-ladda ladda-button" data-style="expand-left"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>expand-right</h6>
                                <button class="btn btn-success btn-ladda ladda-button" data-style="expand-right"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;"></div>
                                </button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>expand-up</h6>
                                <button class="btn btn-success btn-ladda ladda-button" data-style="expand-up"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>expand-down</h6>
                                <button class="btn btn-success btn-ladda ladda-button" data-style="expand-down"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>contract</h6>
                                <button class="btn btn-danger btn-ladda ladda-button" data-style="contract"><span class="ladda-label">Submit</span><span
                                        class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>contract-overlay</h6>
                                <button class="btn btn-danger btn-ladda ladda-button" data-style="contract-overlay"
                                    style="z-index: 10;"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;"></div>
                                </button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>zoom-in</h6>
                                <button class="btn btn-danger btn-ladda ladda-button" data-style="zoom-in"><span class="ladda-label">Submit</span><span
                                        class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>zoom-out</h6>
                                <button class="btn btn-danger btn-ladda ladda-button" data-style="zoom-out"><span class="ladda-label">Submit</span><span
                                        class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>slide-left</h6>
                                <button class="btn btn-info btn-ladda ladda-button" data-style="slide-left"><span class="ladda-label">Submit</span><span
                                        class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>slide-right</h6>
                                <button class="btn btn-info btn-ladda ladda-button" data-style="slide-right"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>slide-up</h6>
                                <button class="btn btn-info btn-ladda ladda-button" data-style="slide-up"><span class="ladda-label">Submit</span><span
                                        class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;"></div>
                                </button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>slide-down</h6>
                                <button class="btn btn-info btn-ladda ladda-button" data-style="slide-down"><span class="ladda-label">Submit</span><span
                                        class="ladda-spinner"></span></button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h4 class="text-center">Built-in progress bar</h4>
                        <div class="row text-center">
                            <div class="col-md-3 py-4 offset-md-3">
                                <h6>expand-right</h6>
                                <button class="btn btn-warning btn-ladda-progress ladda-button" data-style="expand-right"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                            <div class="col-md-3 py-4">
                                <h6>contract</h6>
                                <button class="btn btn-warning btn-ladda-progress ladda-button" data-style="contract"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h4 class="text-center">Sizes</h4>
                        <div class="row text-center">
                            <div class="col-md-4 py-4">
                                <h6>Small</h6>
                                <button class="btn btn-sm btn-primary btn-ladda ladda-button" data-style="expand-right"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;"></div>
                                </button>
                            </div>
                            <div class="col-md-4 py-4">
                                <h6>Normall</h6>
                                <button class="btn btn-primary btn-ladda ladda-button" data-style="expand-right"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;"></div>
                                </button>
                            </div>
                            <div class="col-md-4 py-4">
                                <h6>Large</h6>
                                <button class="btn btn-lg btn-primary btn-ladda ladda-button" data-style="expand-right"><span
                                        class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;"></div>
                                </button>
                            </div>
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
 {{ Html::script('coreui/js/ladda/js/spin.min.js') }}
 {{ Html::script('coreui/js/ladda/js/ladda.min.js') }}
 {{ Html::script('coreui/js/loading-button.js') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}