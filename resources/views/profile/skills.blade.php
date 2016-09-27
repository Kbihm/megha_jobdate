@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="/profile/user" data-toggle="tab" aria-expanded="false">Your Information</a></li>
            <li class=""><a href="/profile/skills" data-toggle="tab" aria-expanded="true">Skills</a></li>
            <li class=""><a href="/profile/experience" data-toggle="tab" aria-expanded="true">Experience</a></li>
            <li class=""><a href="/profile/security" data-toggle="tab" aria-expanded="true">Security</a></li>
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
            @if (isset($skills))
                @if (sizeof($skills) > 0)
                <ul>
                    @foreach ($skills as $skill)
                    <li> {{ $skill->skill }} </li>
                    @endforeach
                </ul>
                @else
                 <h3> You don't currently have any skills saved. Try adding one! </h3>
                @endif
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

@endsection