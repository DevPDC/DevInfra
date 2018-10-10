@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','')
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
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Credit Card</strong>
                <small>Form</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" placeholder="Enter your name" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Credit Card Number</label>
                            <input class="form-control" id="ccnumber" placeholder="0000 0000 0000 0000" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="ccmonth">Month</label>
                        <select class="form-control" id="ccmonth">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="ccyear">Year</label>
                        <select class="form-control" id="ccyear">
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cvv">CVV/CVC</label>
                            <input class="form-control" id="cvv" placeholder="123" type="text">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Company</strong>
                <small>Form</small>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="company">Company</label>
                    <input class="form-control" id="company" placeholder="Enter your company name" type="text">
                </div>
                <div class="form-group">
                    <label for="vat">VAT</label>
                    <input class="form-control" id="vat" placeholder="PL1234567890" type="text">
                </div>
                <div class="form-group">
                    <label for="street">Street</label>
                    <input class="form-control" id="street" placeholder="Enter street name" type="text">
                </div>
                <div class="row">
                    <div class="form-group col-sm-8">
                        <label for="city">City</label>
                        <input class="form-control" id="city" placeholder="Enter your city" type="text">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="postal-code">Postal Code</label>
                        <input class="form-control" id="postal-code" placeholder="Postal Code" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input class="form-control" id="country" placeholder="Country name" type="text">
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong>Basic Form</strong> Elements</div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Static</label>
                        <div class="col-md-9">
                            <p class="form-control-static">Username</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Text Input</label>
                        <div class="col-md-9">
                            <input class="form-control" id="text-input" name="text-input" placeholder="Text" type="text">
                            <span class="help-block">This is a help text</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="email-input">Email Input</label>
                        <div class="col-md-9">
                            <input class="form-control" id="email-input" name="email-input" placeholder="Enter Email"
                                type="email">
                            <span class="help-block">Please enter your email</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="password-input">Password</label>
                        <div class="col-md-9">
                            <input class="form-control" id="password-input" name="password-input" placeholder="Password"
                                type="password">
                            <span class="help-block">Please enter a complex password</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="disabled-input">Disabled Input</label>
                        <div class="col-md-9">
                            <input class="form-control" id="disabled-input" name="disabled-input" placeholder="Disabled"
                                disabled="" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="textarea-input">Textarea</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9"
                                placeholder="Content.."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Select</label>
                        <div class="col-md-9">
                            <select class="form-control" id="select1" name="select1">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select2">Select Large</label>
                        <div class="col-md-9">
                            <select class="form-control form-control-lg" id="select2" name="select2">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select3">Select Small</label>
                        <div class="col-md-9">
                            <select class="form-control form-control-sm" id="select3" name="select3">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="disabledSelect">Disabled Select</label>
                        <div class="col-md-9">
                            <select class="form-control" id="disabledSelect" disabled="">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="multiple-select">Multiple select</label>
                        <div class="col-md-9">
                            <select class="form-control" id="multiple-select" name="multiple-select" size="5" multiple="">
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                                <option value="4">Option #4</option>
                                <option value="5">Option #5</option>
                                <option value="6">Option #6</option>
                                <option value="7">Option #7</option>
                                <option value="8">Option #8</option>
                                <option value="9">Option #9</option>
                                <option value="10">Option #10</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Radios</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check">
                                <input class="form-check-input" id="radio1" value="radio1" name="radios" type="radio">
                                <label class="form-check-label" for="radio1">Option 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radio2" value="radio2" name="radios" type="radio">
                                <label class="form-check-label" for="radio2">Option 2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radio3" value="radio2" name="radios" type="radio">
                                <label class="form-check-label" for="radio3">Option 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Inline Radios</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="inline-radio1" value="option1" name="inline-radios"
                                    type="radio">
                                <label class="form-check-label" for="inline-radio1">One</label>
                            </div>
                            <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="inline-radio2" value="option2" name="inline-radios"
                                    type="radio">
                                <label class="form-check-label" for="inline-radio2">Two</label>
                            </div>
                            <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="inline-radio3" value="option3" name="inline-radios"
                                    type="radio">
                                <label class="form-check-label" for="inline-radio3">Three</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Checkboxes</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="check1" value="" type="checkbox">
                                <label class="form-check-label" for="check1">Option 1</label>
                            </div>
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="check2" value="" type="checkbox">
                                <label class="form-check-label" for="check2">Option 2</label>
                            </div>
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="check3" value="" type="checkbox">
                                <label class="form-check-label" for="check3">Option 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Inline Checkboxes</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="inline-checkbox1" value="check1" type="checkbox">
                                <label class="form-check-label" for="inline-checkbox1">One</label>
                            </div>
                            <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="inline-checkbox2" value="check2" type="checkbox">
                                <label class="form-check-label" for="inline-checkbox2">Two</label>
                            </div>
                            <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="inline-checkbox3" value="check3" type="checkbox">
                                <label class="form-check-label" for="inline-checkbox3">Three</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="file-input">File input</label>
                        <div class="col-md-9">
                            <input id="file-input" name="file-input" type="file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="file-multiple-input">Multiple File
                            input</label>
                        <div class="col-md-9">
                            <input id="file-multiple-input" name="file-multiple-input" multiple="" type="file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <strong>Inline</strong> Form</div>
            <div class="card-body">
                <form class="form-inline" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputName2">Name</label>
                        <input class="form-control" id="exampleInputName2" placeholder="Jane Doe" type="text">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com" type="email">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong>Horizontal</strong> Form</div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="hf-email">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" id="hf-email" name="hf-email" placeholder="Enter Email.." type="email">
                            <span class="help-block">Please enter your email</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="hf-password">Password</label>
                        <div class="col-md-9">
                            <input class="form-control" id="hf-password" name="hf-password" placeholder="Enter Password.."
                                type="password">
                            <span class="help-block">Please enter your password</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <strong>Normal</strong> Form</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nf-email">Email</label>
                        <input class="form-control" id="nf-email" name="nf-email" placeholder="Enter Email.." type="email">
                        <span class="help-block">Please enter your email</span>
                    </div>
                    <div class="form-group">
                        <label for="nf-password">Password</label>
                        <input class="form-control" id="nf-password" name="nf-password" placeholder="Enter Password.."
                            type="password">
                        <span class="help-block">Please enter your password</span>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Input
                <strong>Grid</strong>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <input class="form-control" placeholder=".col-sm-3" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input class="form-control" placeholder=".col-sm-4" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <input class="form-control" placeholder=".col-sm-5" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input class="form-control" placeholder=".col-sm-6" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-7">
                            <input class="form-control" placeholder=".col-sm-7" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input class="form-control" placeholder=".col-sm-8" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input class="form-control" placeholder=".col-sm-9" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input class="form-control" placeholder=".col-sm-10" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input class="form-control" placeholder=".col-sm-11" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input class="form-control" placeholder=".col-sm-12" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-user"></i> Login</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Input
                <strong>Sizes</strong>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="input-small">Small Input</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm" id="input-small" name="input-small" placeholder=".form-control-sm"
                                type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="input-normal">Normal Input</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="input-normal" name="input-normal" placeholder="Normal" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="input-large">Large Input</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-lg" id="input-large" name="input-large" placeholder=".form-control-lg"
                                type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Validation states</strong> Form</div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-col-form-label" for="inputSuccess1">Input with success</label>
                    <input class="form-control is-valid" id="inputSuccess1" type="text">
                </div>
                <div class="form-group">
                    <label class="form-col-form-label" for="inputError1">Input with error</label>
                    <input class="form-control is-invalid" id="inputError1" type="text">
                    <div class="invalid-feedback">Please provide a valid informations.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Validation</strong>
                <code>was-validated</code>
            </div>
            <div class="card-body was-validated">
                <div class="form-group">
                    <label class="form-col-form-label" for="inputSuccess2">Input with success</label>
                    <input class="form-control is-valid" id="inputSuccess2" type="text">
                </div>
                <div class="form-group">
                    <label class="form-col-form-label" for="inputError2">Input required</label>
                    <input class="form-control is-invalid" id="inputError2" required="" type="text">
                    <div class="invalid-feedback">Please provide a valid informations.</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <strong>Icon/Text</strong> Groups</div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input class="form-control" id="input1-group1" name="input1-group1" placeholder="Username"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input class="form-control" id="input2-group1" name="input2-group1" placeholder="Email"
                                    type="email">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-euro"></i>
                                    </span>
                                </div>
                                <input class="form-control" id="input3-group1" name="input3-group1" placeholder=".."
                                    type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <strong>Buttons</strong> Groups</div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i> Search</button>
                                </span>
                                <input class="form-control" id="input1-group2" name="input1-group2" placeholder="Username"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input class="form-control" id="input2-group2" name="input2-group2" placeholder="Email"
                                    type="email">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button">Submit</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-facebook"></i>
                                    </button>
                                </span>
                                <input class="form-control" id="input3-group2" name="input3-group2" placeholder="Search"
                                    type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <strong>Dropdowns</strong> Groups</div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider" role="separator"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <input class="form-control" id="input1-group3" name="input1-group3" placeholder="Username"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input class="form-control" id="input2-group3" name="input2-group3" placeholder="Email"
                                    type="email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider" role="separator"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">Action</button>
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button"
                                        data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider" role="separator"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <input class="form-control" id="input3-group3" name="input3-group3" placeholder=".."
                                    type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider" role="separator"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Use the grid for big devices!
                <small>
                    <code>.col-lg-*</code>
                    <code>.col-md-*</code>
                    <code>.col-sm-*</code>
                </small>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input class="form-control" placeholder=".col-md-8" type="text">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" placeholder=".col-md-4" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7">
                            <input class="form-control" placeholder=".col-md-7" type="text">
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" placeholder=".col-md-5" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" placeholder=".col-md-6" type="text">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" placeholder=".col-md-6" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input class="form-control" placeholder=".col-md-5" type="text">
                        </div>
                        <div class="col-md-7">
                            <input class="form-control" placeholder=".col-md-7" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input class="form-control" placeholder=".col-md-4" type="text">
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" placeholder=".col-md-8" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">Action</button>
                <button class="btn btn-sm btn-danger" type="button">Action</button>
                <button class="btn btn-sm btn-warning" type="button">Action</button>
                <button class="btn btn-sm btn-info" type="button">Action</button>
                <button class="btn btn-sm btn-success" type="button">Action</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Input Grid for small devices!
                <small>
                    <code>.col-*</code>
                </small>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group row">
                        <div class="col-4">
                            <input class="form-control" placeholder=".col-4" type="text">
                        </div>
                        <div class="col-8">
                            <input class="form-control" placeholder=".col-8" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5">
                            <input class="form-control" placeholder=".col-5" type="text">
                        </div>
                        <div class="col-7">
                            <input class="form-control" placeholder=".col-7" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <input class="form-control" placeholder=".col-6" type="text">
                        </div>
                        <div class="col-6">
                            <input class="form-control" placeholder=".col-6" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-7">
                            <input class="form-control" placeholder=".col-5" type="text">
                        </div>
                        <div class="col-5">
                            <input class="form-control" placeholder=".col-5" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <input class="form-control" placeholder=".col-8" type="text">
                        </div>
                        <div class="col-4">
                            <input class="form-control" placeholder=".col-4" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">Action</button>
                <button class="btn btn-sm btn-danger" type="button">Action</button>
                <button class="btn btn-sm btn-warning" type="button">Action</button>
                <button class="btn btn-sm btn-info" type="button">Action</button>
                <button class="btn btn-sm btn-success" type="button">Action</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Username</span>
                            </div>
                            <input class="form-control" id="username3" name="username3" type="text">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input class="form-control" id="email3" name="email3" type="email">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Password</span>
                            </div>
                            <input class="form-control" id="password3" name="password3" type="password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" id="username2" name="username2" placeholder="Username" type="text">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" id="email2" name="email2" placeholder="Email" type="email">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" id="password2" name="password2" placeholder="Password" type="password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <button class="btn btn-sm btn-secondary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" id="username" name="username" placeholder="Username" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                            <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <button class="btn btn-sm btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>Form Elements
                <div class="card-header-actions">
                    <a class="btn-setting d-sm-down-none" href="#">
                        <i class="icon-settings"></i>
                    </a>
                    <a class="btn btn-minimize" href="#" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="true">
                        <i class="icon-arrow-up"></i>
                    </a>
                    <a class="btn-close" href="#">
                        <i class="icon-close"></i>
                    </a>
                </div>
            </div>
            <div class="card-body collapse show" id="collapseExample">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-form-label" for="prependedInput">Prepended text</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input class="form-control" id="prependedInput" size="16" type="text">
                            </div>
                            <p class="help-block">Here's some help text</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="appendedInput">Appended text</label>
                        <div class="controls">
                            <div class="input-group">
                                <input class="form-control" id="appendedInput" size="16" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <span class="help-block">Here's more help text</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="appendedPrependedInput">Append and prepend</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input class="form-control" id="appendedPrependedInput" size="16" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="appendedInputButton">Append with button</label>
                        <div class="controls">
                            <div class="input-group">
                                <input class="form-control" id="appendedInputButton" size="16" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="appendedInputButtons">Two-button append</label>
                        <div class="controls">
                            <div class="input-group">
                                <input class="form-control" id="appendedInputButtons" size="16" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="button">Search</button>
                                    <button class="btn btn-secondary" type="button">Options</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <button class="btn btn-secondary" type="button">Cancel</button>
                    </div>
                </form>
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

@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}