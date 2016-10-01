@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class="active"><a href="profile/experience">Experience</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class="active"><a href="/profile/subscription" >Subscription</a></li>
            @endif
            <li class=""><a href="/profile/security">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="subscription">
           
            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Subscription</h3>
            </div>
            <div class="panel-body">
                Coming Soon!

                <h2 class="text-danger text-center"> Subscription Ends: {{ $user->employer->subscription_end }} </h2>

                
            </div>
            </div>

            @if($user->employer_id != null)

            <div class="panel panel-default">
                <div class="panel-heading">Billing Information</div>
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
    @endif
        </div>

        </div>
        @endsection