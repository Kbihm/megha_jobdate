@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class="active"><a href="/profile/skills" >Skills</a></li>
            <li class=""><a href="/profile/experience">Experience</a></li>
            <li class=""><a href="/profile/availability">Availability</a></li>
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
            SKILLS
        -->
        <div class="tab-pane fade active in" id="skills">
                        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Skills</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->employee->skill) > 0)
                <ul class="list-group">
                    @foreach ($user->employee->skill as $skill)
                    
                    <li class="list-group-item"> 
                    <div class="container-fluid">
                             <p class="col-xs-1"> {{ $skill->skill }} </p>
                            <form class="col-xs-11"  role="form" method="POST" action="/skills/{{ $skill->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type-"submit" class="pull-right btn-sm btn-danger"> Delete </button>
                            </form>
                    </div>
                    </li>

                    @endforeach
                </ul>
                @else
                 <h3> You don't currently have any skills saved. Try adding one! </h3>
                @endif

                           
            </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Add a New Skill</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/skills/" >
                        {{ csrf_field() }}
                <br>
                    
                        
                    <div class="form-group{{ $errors->has('skill') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">Skill</label>
                        <div class="col-sm-10">
                            <input type="text" name="skill" class="form-control" @if (count($errors)) value="{{ old('skill') }}" @endif>
                        </div>
                    </div> 
                    <input name="employee_id" class="form-control" type="hidden" value="{{$user->employee->id}}">   
                                @if ($errors->has('skill'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skill') }}</strong>
                                    </span>
                                @endif
                        <div class="form-group">
                            <div class="text-center" >
                                <button type="submit" class="btn btn-primary">
                                    Add Skill
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
                </div>
                
            </div>
        </div>

@endsection