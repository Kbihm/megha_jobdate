@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class=""><a href="/experience">Experience</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class=""><a href="/profile/subscription" >Subscription</a></li>
            @endif
            <li class="active"><a href="/profile/security">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">

        <!--
            SECURITY
        -->
        <div class="tab-pane fade active in" id="security">
           
          <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                
                    <form class="form-horizontal" role="form" method="POST" action="/p/edit">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="col-md-4 control-label">Current Password:</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" name="old_password" value="{{ old('old_password') }}">

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="col-md-4 control-label">New Passord:</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" >

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                                             
                        <div class="form-group{{ $errors->has('new_password_confirm') ? ' has-error' : '' }}">
                            <label for="new_password_confirm" class="col-md-4 control-label">Confirm New Password:</label>

                            <div class="col-md-6">
                                <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirm" value="{{ old('new_password_confirm') }}">

                                @if ($errors->has('new_password_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Edit
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>


                </div>
            </div>
        </div>

         <div class="col-md-10">

            <div class="panel panel-default">
                <div class="panel-heading">Card Details</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Card Number:</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}">

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('expiry') ? ' has-error' : '' }}">
                            <label for="expiry" class="col-md-4 control-label">Expiry:</label>

                            <div class="col-md-6">
                                <input id="expiry" type="textarea" class="form-control" name="expiry" value="{{ old('expiry') }}">

                                @if ($errors->has('expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expiry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name as it appears on card:</label>

                            <div class="col-md-6">
                                <input id="name" type="textarea" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('ccv') ? ' has-error' : '' }}">
                            <label for="ccv" class="col-md-4 control-label">CCV:</label>

                            <div class="col-md-6">
                                <input id="ccv" type="textarea" class="form-control" ccv="ccv" value="{{ old('ccv') }}">

                                @if ($errors->has('ccv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                           
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    
    </div>

@endsection           

