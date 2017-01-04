@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-3">

        <div class="card">
           

            @if ($user->employee_id != null)

                @if (Storage::disk('local')->has($user->employee_id . '.jpg'))
                    <div class="image">
                                        
                        <a href="#">
                            <img src="{{route('image', ['filename' => $user->employee_id.'.jpg'])}}" alt="...">
                        </a>
                        <div class="filter filter-azure">
                            <a type="button" class="btn btn-neutral btn-round" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-camera"></i> Change Picture
                            </a>
                        </div>
                    </div>
                @endif

            @endif
        <div class="content">
        <h4 class="title"> Manage your account </h4>

                <ul class="list-group">
                    <a class="list-group-item active" href="/profile">Your Information</a>
                    @if ($user->employee_id != null)
                    <a class="list-group-item" href="/profile/skills" >Skills</a>
                    <a class="list-group-item" href="/profile/experience">Experience</a>
                    <a class="list-group-item" href="/profile/availability">Availability</a>
                    @endif
                    @if ($user->employer_id != null)
                    <a class="list-group-item" href="/profile/subscription" >Subscription</a>
                    
                    @endif
                    <a class="list-group-item" href="/profile/security">Security</a>
                </ul>

        <hr>

        <div class="footer">

        @if ($user->employee_id != null)
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
                    Upload/Change profile picture
                    </button>
                    <a class="btn btn-primary btn-block" href="/staff/{{ $user->employee_id }}"> How Employers see me </a>
        @endif
        </div>

        </div>
        </div>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">

        <!--
            USER
        -->

        <h4 class="title">Your Account Information</h4>

            <div class="card">
            <div class="content">

            @if ($user->admin_id != null)
                <h4> You're an admin, you don't have any custom attributes. </h4>
            @elseif ($user->employee_id != null)
                    
                    <form class="form-horizontal" role="form" method="POST" action="profile/update/employee">
                    
                        {{ csrf_field() }}
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

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Role:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="role">
                                    @foreach($roles as $role)
                                    <option value="{{ $role }}" @if($user->employee->role == $role) selected @endif >
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>    

                        <div class="form-group{{ $errors->has('second_role') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Secondary Role:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="second_role" >
                                <option value=null @if($user->employee->second_role == null) selected @endif> None </option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role }}" @if($user->employee->second_role == $role) selected @endif  >
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
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
                                <option <?php if ($user->employee->fulltime == TRUE ) echo 'selected' ; ?> value="1">Yes</option>
                                <option <?php if ($user->employee->fulltime == FALSE ) echo 'selected' ; ?> value="0">No</option>
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
                                <input id="hourly_rate" step="0.01" type="number" class="form-control" name="hourly_rate" value="{{ $user->employee->hourly_rate }}">

                                @if ($errors->has('hourly_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <h5 class="text-center"> Your preferred working location </h5>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">State</label>
                                     <div class="col-md-6">
                                    <select id="state" class="form-control" name="state" value="">
                                        <option value="{{ $user->employee->state }}" id="">{{ $user->employee->state }}</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Region</label>
                                    <div class="col-md-6">
                                    <select id="region" class="form-control" name="region" >
                                        <option value="{{ $user->employee->region }}" id="">{{ $user->employee->region }}</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Area</label>

                                    <div class="col-md-6">
                                    <select id="area" class="form-control" name="area" value="">
                                        <option value="{{ $user->employee->area }}">{{ $user->employee->area }}</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('suburb') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Suburb</label>
                                    <div class="col-md-6">
                                    <select id="suburb" class="form-control" name="suburb" value="">
                                        <option value="{{ $user->employee->suburb }}">{{ $user->employee->suburb }}</option>
                                    </select>
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

                    @if($user->employee_id != null)



                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Upload a Profile Image</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">Note that your profile picture MUST be in '.jpg' format!</p>
                                <p>We recommend an image larger than 500x500 and square. </p>
                                <hr>
                                    <form  method="POST" action="img/store" files="true" role="form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input  type="file" id="image" name="image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Upload Picture</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endif


            @elseif ($user->employer_id != null)
                    <form class="form-horizontal" role="form" method="POST" action="profile/update/employer">
                        {{ csrf_field() }}
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
                        
                    
                        <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

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

<script type="text/javascript" src="/region-script.js"></script>

@endsection           
