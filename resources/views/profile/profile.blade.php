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
            USER
        -->
        <div class="tab-pane fade active in" id="user">

            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $user->first_name }} {{ $user->last_name }}</h3>
            </div>
            <div class="panel-body">

            @if (Auth::user()->admin_id != null)
                <h1> You're an admin, you don't have any custom attributes. </h1>
            @elseif (Auth::user()->employee_id != null)

                    <form class="form-horizontal" role="form" method="POST" action="/p/edit">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name:</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">

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
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled="disabled">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>     

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number:</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->employee->phone }}">

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
                                 <select default="Male" class="form-control" name="gender" id="gender">
                                <option <?php if ($user->employee->gender == 0 ) echo 'selected' ; ?> value="0">Male</option> 
                                <option <?php if ($user->employee->gender == 1 ) echo 'selected' ; ?> value="1">Female</option>
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
                                 <select class="form-control" name="fulltime" id="fulltime">
                                <option <?php if ($user->employee->fulltime == TRUE ) echo 'selected' ; ?> value="TRUE">Yes</option>
                                <option <?php if ($user->employee->fulltime == FALSE ) echo 'selected' ; ?> value="FALSE">No</option>
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
                                <textarea id="about" type="text" class="form-control" name="about">{{ $user->employee->about }}</textarea>

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
                                <input id="hourly_rate" type="number" class="form-control" name="hourly_rate" value="{{ $user->employee->hourly_rate }}">

                                @if ($errors->has('hourly_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-offset-3">
                            <a href="skills/create" class="btn btn-primary"> Add Skills </a>
                            <a href="experiences/create" class="btn btn-primary"> Add Experiences </a>
                        </div>
                        <br>
                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                     Edit
                                </button>
                            </div>
                        </div>
                    </form>

            @elseif (Auth::user()->employer_id != null)
                    <form class="form-horizontal" role="form" method="POST" action="/p/edit">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name:</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">

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
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled="disabled">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number:</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->employer->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('abn') ? ' has-error' : '' }}">
                            <label for="abn" class="col-md-4 control-label">What is your abn? </label>

                            <div class="col-md-6">
                                <input id="abn" type="number" class="form-control" name="abn" value="{{ $user->employer->abn }}">

                                @if ($errors->has('abn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('abn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">What is your address? </label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->employer->address }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('establishment_name') ? ' has-error' : '' }}">
                            <label for="establishment_name" class="col-md-4 control-label">What is your Establishment Name? </label>

                            <div class="col-md-6">
                                <input id="establishment_name" type="text" class="form-control" name="establishment_name" value="{{ $user->employer->establishment_name }}">

                                @if ($errors->has('establishment_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('establishment_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                     Update
                                </button>
                            </div>
                        </div>
                    </form>

            @else
                No role set, Uh oh... 
            @endif
            

            </div>
            </div>
            </div>

       
        </div>
        </div>




        
        </div>
    </div>

@endsection           

