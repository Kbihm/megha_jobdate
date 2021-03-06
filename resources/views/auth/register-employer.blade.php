@extends('layouts.app')

@section('content')
 
<div class="container">

<div class="col-md-8 col-md-offset-2">

    <h2>Register as an Employer</h2>
    <hr>

            <div class="panel panel-default">
                
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register/employer') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Contact Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('establishment_name') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Establishment Name</label>

                            <div class="col-md-6">
                                <input id="establishment_name" type="text" class="form-control" name="establishment_name" value="{{ old('establishment_name') }}">

                                @if ($errors->has('establishment_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('establishment_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('abn') ? ' has-error' : '' }}">
                        <label for="abn" class="col-md-4 control-label">ABN</label>

                        <div class="col-md-6">
                            <input id="abn" type="abn" class="form-control" name="abn" value="{{ old('abn') }}">

                            @if ($errors->has('abn'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('abn') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <!--<hr>

                       <div class="form-group{{ $errors->has('promo_code') ? ' has-error' : '' }}">
                            <label for="promo_code" class="col-md-4 control-label">Promo Code</label>

                            <div class="col-md-6">
                                <input id="promo_code" type="tel" class="form-control" name="promo_code" value="{{ old('promo_code') }}">

                                @if ($errors->has('promo_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('promo_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <p><small class="text-muted">You will be prompted to choose your payment schedule and can apply a coupon code next. </small></p>
                                <p><small class="text-muted"> By creating an account you are agreeing to the <a href="http://jobdate.com.au/tos">Terms and Conditions.</a>  </small></p>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    </div>
@endsection