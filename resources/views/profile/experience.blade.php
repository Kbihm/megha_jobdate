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
            EXPERIENCE
        -->
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

        @endsection           

