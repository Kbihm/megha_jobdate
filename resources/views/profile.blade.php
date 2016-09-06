 
 @extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">



        </div>

        <div class="panel col-md-9">
            <div class="panel-header">
                <h1> {{ $user->first_name }} {{ $user->last_name }} </h1>
                <div class="col-md-3 pull-right"> Account Type: Employee</div>
            </div>

            Email: {{$user->email}} <br/>


            <hr>

            @if (Auth::user()->admin_id != null)
                You're an admin, you don't have any custom attributes. 
            @elseif (Auth::user()->employee_id != null)


                 <div class="panel-body">
 
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('email_confirm') ? ' has-error' : '' }}">
                            <label for="email_confirm" class="col-md-4 control-label">Confirm E-mail:</label>

                            <div class="col-md-6">
                                <input id="email_confirm" type="text" class="form-control" name="email_confirm" value="{{ $user->email }}">

                                @if ($errors->has('email_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirm') }}</strong>
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
                                 <select default="Male" class="form=-control" name="gender" id="gender">
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
                                 <select class="form=-control" name="fulltime" id="fulltime">
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
                                <input id="about" type="text" class="form-control" name="about" value="{{ $user->employee->about }}">

                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      

                        <div class="form-group{{ $errors->has('hourly_rate') ? ' has-error' : '' }}">
                            <label for="hourly_rate" class="col-md-4 control-label">What is your desired abn? </label>

                            <div class="col-md-6">
                                <input id="hourly_rate" type="number" class="form-control" name="hourly_rate" value="{{ $user->employee->hourly_rate }}">

                                @if ($errors->has('hourly_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                     Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @elseif (Auth::user()->employer_id != null)
                                 <div class= "panel-body text-center">
                    <h2 style="color:red"> Subscription Ends: {{ $user->employer->subscription_end }} <br/> </h2>
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('email_confirm') ? ' has-error' : '' }}">
                            <label for="email_confirm" class="col-md-4 control-label">Confirm E-mail:</label>

                            <div class="col-md-6">
                                <input id="email_confirm" type="text" class="form-control" name="email_confirm" value="{{ $user->email }}">

                                @if ($errors->has('email_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirm') }}</strong>
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
                            <label for="establishment_name" class="col-md-4 control-label">What is your establishment_name? </label>

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
                                     Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            @else
                No role set, Uh oh... 
            @endif
            

        </div>
    </div>

@endsection           

