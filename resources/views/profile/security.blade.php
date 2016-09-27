@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="/profile/user" data-toggle="tab" aria-expanded="false">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" data-toggle="tab" aria-expanded="true">Skills</a></li>
            <li class=""><a href="/profile/experience" data-toggle="tab" aria-expanded="true">Experience</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class=""><a href="/profile/subscription" data-toggle="tab" aria-expanded="true">Subscription</a></li>
            @endif
            <li class=""><a href="/profile/security" data-toggle="tab" aria-expanded="true">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">

        <!--
            SECURITY
        -->
        <div class="tab-pane fade active in" id="security">
           
          <div class="col-md-8 col-md-offset-2">
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
                                    <i class="fa fa-btn fa-promocode"></i> Edit
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection           

