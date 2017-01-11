@extends('layouts.app')

@section('title')
Qualifications
@endsection

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
                    </div>
                @endif

            @endif
        <div class="content">
        <h4 class="title"> Manage your account </h4>

                <ul class="list-group">
                    <a class="list-group-item" href="/profile">Your Information</a>
                    @if ($user->employee_id != null)
                    <a class="list-group-item active" href="/profile/skills" >Qualifications</a>
                    <a class="list-group-item" href="/profile/experience">Experience</a>
                    <a class="list-group-item" href="/profile/availability">Availability</a>
                    @endif
                    @if ($user->employer_id != null)
                    <a class="list-group-item" href="/profile/subscription" >Subscription</a>
                    
                    @endif
                    <a class="list-group-item" href="/profile/security">Security</a>
                    <a class="list-group-item" href="/profile/delete">Delete My Account</a>
                </ul>

        <hr>

        <div class="footer">

        @if ($user->employee_id != null)
                    <a class="btn btn-primary btn-block" href="/staff/{{ $user->employee_id }}"> How Employers see me </a>
        @endif
        </div>

        </div>
        </div>


        </div>


        <div class="col-md-9">
        

        <!--
            SKILLS
        -->
        <h4 >Qualifications</h4>

        <div class="card">
            <div class="content">
                

                @if (sizeof($user->employee->skill) > 0)
                <ul class="list-group">
                    @foreach ($user->employee->skill as $skill)
                    
                    <li class="list-group-item"> 
                    <div class="container-fluid">
                             <p class="col-md-10"> {{ $skill->skill }} </p>
                            <form class="col-md-2"  role="form" method="POST" action="/skills/{{ $skill->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type-"submit" class="pull-right btn-sm btn-danger btn-fill"> Delete </button>
                            </form>
                    </div>
                    </li>

                    @endforeach
                </ul>
                @else
                 <h4 class="title"> You don't currently have any qualifications saved. Try adding one! </h4>
                @endif

                           
            </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Add a New Qualification</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/skills/" >
                        {{ csrf_field() }}
                <br>
                    
                        
                    <div class="form-group{{ $errors->has('skill') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">Qualification</label>
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
                                    Add Qualification
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
                </div>
                
            </div>
        </div>

@endsection