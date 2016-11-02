@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-3">
        
            @if($user->employee_id != null)
                @if (Storage::disk('local')->has($user->employee->id . '.jpg'))
                <div style="background-image: url({{route('image', ['filename' => $user->employee->id.'.jpg'])}}); background-position: center; background-repeat: no-repeat; border: 1px solid black; height: 250px; width:250px; background-size: contain; background-color: grey;"></div>
                @else
                <div style="height: 250px; width:250px; background-color: grey; border: 1px solid black;"> <h4 class="text-center"> You have no profile image set. </h4> </div>
                @endif
            @endif
        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class=""><a href="/profile/experience">Experience</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class=""><a href="/profile/subscription" >Subscription</a></li>
            @endif
            <li class=""><a href="/profile/security">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">

        <!--
            USER
        -->
        <div class="tab-pane fade  active in" id="user">

            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $user->first_name }} {{ $user->last_name }}</h3>
            </div>
            <div class="panel-body">

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

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Role:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="role" >
                                    @foreach($roles as $role)
                                    <option value="{{ $role }}">
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
                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Update
                                </button>
                            </div>
                        </div>
                    </form>

                    @if($user->employee_id != null)

                    <button type="button" class="btn btn-primary btn-lg col-md-offset-4" data-toggle="modal" data-target="#myModal">
                    Upload a profile picture
                    </button>

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
                                <h4> Note that your profile picture MUST be in '.jpg' format! We recommend a 250x250 image. </h4>
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

        <!--
            SKILLS
        -->
        @if ($user->employee_id != null)
        <div class="tab-pane fade" id="skills">
                        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Skills</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->employee->skill) > 0)
                <ul>
                    @foreach ($user->employee->skill as $skill)
                    <li> {{ $skill->skill }} </li>
                    @endforeach
                </ul>
                @else
                 <h3> You don't currently have any skills saved. Try adding one! </h3>
                @endif
                <a href="skills/create" class="btn btn-primary"> Add Skills </a>
                           
            </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Add a New Skill</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/skills/">
                        {{ csrf_field() }}
                <br>
                    
                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Skill</label>
                        <div class="col-sm-10">
                            <input type="text" name="skill" class="form-control" @if (count($errors)) value="{{ old('skill') }}" @endif>
                        </div>
                    </div> 
                    <input name="employee_id" class="form-control" type="hidden" value="{{$user}}">   
                        <div class="form-group">
                            <div class="text-center" >
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
                </div>
            </div>
        </div>
        @endif

        <!--
            EXPERIENCE
        -->
        @if ($user->employee_id != null)
        <div class="tab-pane fade" id="experience">
             

            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Experience</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->employee->experience) > 0)
                    @foreach ($user->employee->experience as $experience)
                    <h4>{{ $experience->title }}  <span class="text-muted"> ({{ $experience->establishment_name}})</span> </h4>
                    <h6> {{ $experience->employment_length }} </h6>
                    <p> {{ $experience->description }} </p>
                    <hr>
                    @endforeach
                @else
                    <h3> You haven't got any experiences saved. Add one now! </h3>
                @endif
                <a href="experience/create" class="btn btn-primary"> Add Experiences </a>
            </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">Add Past Work Experience</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/experience/">
                        {{ csrf_field() }}
                <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Position Title:</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" @if (count($errors)) value="{{ old('title') }}" @endif>
                        </div>
                    </div> 

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Name of Establishment:</label>
                        <div class="col-sm-10">
                            <input type="text" name="establishment_name" class="form-control" @if (count($errors)) value="{{ old('establishment_name') }}" @endif>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Employment Length:</label>
                        <div class="col-sm-10">
                            <input type="text" name="employment_length" class="form-control" @if (count($errors)) value="{{ old('employment_length') }}" @endif>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Describe your roles:</label>
                        <div class="col-sm-10">
                            <input type="textarea" name="description" class="form-control" @if (count($errors)) value="{{ old('description') }}" @endif>
                        </div>
                    </div> 
                     <input name="employee_id" class="form-control" type="hidden" value="{{$user}}">   
                        <div class="form-group">
                            <div class="text-center" >
                                <button type="submit" class="btn btn-primary">
                                    Submit Experience
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
        @endif
        
        <!--
            Subscription
        -->
        @if ($user->employer_id != null)
        <div class="tab-pane fade" id="subscription">
           
            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Subscription</h3>
            </div>
            <div class="panel-body">
                Coming Soon!

                <h2 class="text-danger text-center"> Subscription Ends: {{ $user->employer->subscription_end }} </h2>
            </div>
        </div>

        </div>
        @endif
            
        </div>
        </div>




        
        </div>
    </div>

@endsection           
