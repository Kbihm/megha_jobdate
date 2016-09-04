 @extends('layouts.app')
@section('content')
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Profle TO BE FINISHED WHEN USER CONTROLLER IS CREATED</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="/p/create">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name:</label>

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
                            <label for="last_name" class="col-md-4 control-label">Last Name:</label>

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
                            <label for="email" class="col-md-4 control-label">E-mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('email_confirm') ? ' has-error' : '' }}">
                            <label for="email_confirm" class="col-md-4 control-label">Confirm E-maiL:</label>

                            <div class="col-md-6">
                                <input id="email_confirm" type="text" class="form-control" name="email_confirm" value="{{ old('email_confirm') }}">

                                @if ($errors->has('email_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         

                                                                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password:</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="text" class="form-control" name="password_confirm" value="{{ old('password_confirm') }}">

                                @if ($errors->has('password_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                             
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number:</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender:</label>

                            <div class="col-md-6">
                                 <select default="Male" class="form=-control" name="gender" id="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                </select> 
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fulltime') ? ' has-error' : '' }}">
                            <label for="fulltime" class="col-md-4 control-label">Are you looking for fullime work?</label>

                            <div class="col-md-6">
                                 <select class="form=-control" name="fulltime" id="fulltime">
                                <option value="TRUE">Yes</option>
                                <option value="FALSE">No</option>
                                </select> 
                                @if ($errors->has('fulltime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fulltime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                                                                                
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Tell us a bit about yourself:</label>

                            <div class="col-md-6">
                                <input id="about" type="text" class="form-control" name="about" value="{{ old('about') }}">

                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      

                        <div class="form-group{{ $errors->has('hourly_rate') ? ' has-error' : '' }}">
                            <label for="hourly_rate" class="col-md-4 control-label">What is your desired hourly rate? </label>

                            <div class="col-md-6">
                                <input id="hourly_rate" type="number" class="form-control" name="hourly_rate" value="{{ old('hourly_rate') }}">

                                @if ($errors->has('hourly_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-promocode"></i> Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection