@extends('layouts.coreui')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','Advanced Forms')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
    {{ Html::style('coreui/js/bootstrap-daterangepicker/css/daterangepicker.min.css') }}
    {{ Html::style('coreui/css/select2/select2.min.css') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="icon-note"></i> Masked Input Plugin for jQuery
                    <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
                    <div class="card-header-actions">
                        <a class="card-header-action" href="https://github.com/digitalBush/jquery.maskedinput"
                            target="_blank">
                            <small class="text-muted">docs</small>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <fieldset class="form-group">
                            <label>Date input</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                <input class="form-control" id="date" type="text">
                            </div>
                            <small class="text-muted">ex. 99/99/9999</small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Phone input</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </span>
                                <input class="form-control" id="phone" type="text">
                            </div>
                            <small class="text-muted">ex. (999) 999-9999</small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Taxpayer Identification Numbers</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-usd"></i>
                                    </span>
                                </span>
                                <input class="form-control" id="tin" type="text">
                            </div>
                            <small class="text-muted">ex. 99-9999999</small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Social Security Number</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-male"></i>
                                    </span>
                                </span>
                                <input class="form-control" id="ssn" type="text">
                            </div>
                            <small class="text-muted">ex. 999-99-9999</small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Eye Script</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                </span>
                                <input class="form-control" id="eyescript" type="text">
                            </div>
                            <small class="text-muted">ex. ~9.99 ~9.99 999</small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Credit Card Number</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-credit-card"></i>
                                    </span>
                                </span>
                                <input class="form-control" id="ccn" placeholder="0000 0000 0000 0000" type="text">
                            </div>
                            <small class="text-muted">ex. 9999 9999 9999 9999</small>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="icon-note"></i> Select2
                    <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
                    <div class="card-header-actions">
                        <a class="card-header-action" href="https://select2.github.io" target="_blank">
                            <small class="text-muted">docs</small>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <label>Modern Select</label>
                        <select class="form-control select2-single select2-hidden-accessible" id="select2-1"
                            data-select2-id="select2-1" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="2">Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr"
                            data-select2-id="1" style="width: 773px;"><span class="selection"><span class="select2-selection select2-selection--single"
                                    role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                    aria-labelledby="select2-select2-1-container"><span class="select2-selection__rendered"
                                        id="select2-select2-1-container" role="textbox" aria-readonly="true"
                                        title="Option 1">Option 1</span><span class="select2-selection__arrow"
                                        role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Multiple Select / Tags</label>
                        <select class="form-control select2-multiple select2-hidden-accessible" id="select2-2"
                            multiple="" data-select2-id="select2-2" tabindex="-1" aria-hidden="true">
                            <option>Option 1</option>
                            <option selected="" data-select2-id="4">Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr"
                            data-select2-id="3" style="width: 773px;"><span class="selection"><span class="select2-selection select2-selection--multiple"
                                    role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                    <ul class="select2-selection__rendered">
                                        <li class="select2-selection__choice" title="Option 2"
                                            data-select2-id="5"><span class="select2-selection__choice__remove"
                                                role="presentation">×</span>Option 2</li>
                                        <li class="select2-search select2-search--inline"><input class="select2-search__field"
                                                tabindex="0" autocomplete="off" autocorrect="off"
                                                autocapitalize="none" spellcheck="false" role="textbox"
                                                aria-autocomplete="list" placeholder="" style="width: 0.75em;"
                                                type="search"></li>
                                    </ul>
                                </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Group Select</label>
                        <select class="form-control select2-hidden-accessible" id="select2-3"
                            data-placeholder="Your Favorite Football Team" data-select2-id="select2-3"
                            tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="7"></option>
                            <optgroup label="NFC EAST">
                                <option>Dallas Cowboys</option>
                                <option>New York Giants</option>
                                <option>Philadelphia Eagles</option>
                                <option>Washington Redskins</option>
                            </optgroup>
                            <optgroup label="NFC NORTH">
                                <option>Chicago Bears</option>
                                <option>Detroit Lions</option>
                                <option>Green Bay Packers</option>
                                <option>Minnesota Vikings</option>
                            </optgroup>
                            <optgroup label="NFC SOUTH">
                                <option>Atlanta Falcons</option>
                                <option>Carolina Panthers</option>
                                <option>New Orleans Saints</option>
                                <option>Tampa Bay Buccaneers</option>
                            </optgroup>
                            <optgroup label="NFC WEST">
                                <option>Arizona Cardinals</option>
                                <option>St. Louis Rams</option>
                                <option>San Francisco 49ers</option>
                                <option>Seattle Seahawks</option>
                            </optgroup>
                            <optgroup label="AFC EAST">
                                <option>Buffalo Bills</option>
                                <option>Miami Dolphins</option>
                                <option>New England Patriots</option>
                                <option>New York Jets</option>
                            </optgroup>
                            <optgroup label="AFC NORTH">
                                <option>Baltimore Ravens</option>
                                <option>Cincinnati Bengals</option>
                                <option>Cleveland Browns</option>
                                <option>Pittsburgh Steelers</option>
                            </optgroup>
                            <optgroup label="AFC SOUTH">
                                <option>Houston Texans</option>
                                <option>Indianapolis Colts</option>
                                <option>Jacksonville Jaguars</option>
                                <option>Tennessee Titans</option>
                            </optgroup>
                            <optgroup label="AFC WEST">
                                <option>Denver Broncos</option>
                                <option>Kansas City Chiefs</option>
                                <option>Oakland Raiders</option>
                                <option>San Diego Chargers</option>
                            </optgroup>
                        </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr"
                            data-select2-id="6" style="width: 773px;"><span class="selection"><span class="select2-selection select2-selection--single"
                                    role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                    aria-labelledby="select2-select2-3-container"><span class="select2-selection__rendered"
                                        id="select2-select2-3-container" role="textbox" aria-readonly="true"><span
                                            class="select2-selection__placeholder">Your Favorite Football
                                            Team</span></span><span class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span>
                    </fieldset>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="icon-note"></i> DateRangePicker
                    <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
                    <div class="card-header-actions">
                        <a class="card-header-action" href="http://www.daterangepicker.com" target="_blank">
                            <small class="text-muted">docs</small>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <label>DateRangePicker</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                            <input class="form-control" name="daterange" type="text">
                        </div>
                    </fieldset>
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
    {{ Html::script('coreui/js/jQuery/js/jquery.maskedinput.js') }}
    {{ Html::script('coreui/js/moment/js/moment.min.js') }}
    {{ Html::script('coreui/js/select2/js/select2.min.js') }}
    {{ Html::script('coreui/js/bootstrap-daterangepicker/js/daterangepicker.js') }}
    {{ Html::script('coreui/js/advanced-forms.js') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}