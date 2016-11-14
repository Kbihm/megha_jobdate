@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class=""><a href="/profile/experience">Experience</a></li>
            <li class=""><a href="/profile/availability">Availability</a></li>
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
           
          <div class="col-md-12">

          @if ($pw_update == true)
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Updated!</strong> You successfully updated your password.
            </div>
          @endif

            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/updatepass') }}">
                        {{ csrf_field() }}
                                                
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="col-md-4 control-label">New Password:</label>

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
                                     Update
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

