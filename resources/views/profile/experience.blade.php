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
                    </div>
                @endif

            @endif
        <div class="content">
        <h4 class="title"> Manage your account </h4>

                <ul class="list-group">
                    <a class="list-group-item" href="/profile">Your Information</a>
                    @if ($user->employee_id != null)
                    <a class="list-group-item" href="/profile/skills" >Skills</a>
                    <a class="list-group-item active" href="/profile/experience">Experience</a>
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
                    <a class="btn btn-primary btn-block" href="/staff/{{ $user->employee_id }}"> How Employers see me </a>
        @endif
        </div>

        </div>
        </div>


        </div>


        <div class="col-md-9">
        
            <h4 >Experience</h4>

            <div class="card">
            <div class="content">
                
            @if (sizeof($user->employee->experience) > 0)
                    @foreach ($user->employee->experience as $experience)
                    <h4>{{ $experience->title }}  <span class="text-muted"> ({{ $experience->establishment_name}})</span> </h4>
                    <h6> {{ $experience->employment_length }} </h6>
                    <p> {{ $experience->description }} </p>
                        <div>
                                <form class="form-horizontal" role="form" method="POST" action="/experience/{{ $experience->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type-"submit" class="btn btn-danger"> Delete </button>
                                </form>
                         </div>
                    <hr>

                    @endforeach
                @else
                    <h3> You haven't got any experiences saved. Add one now! </h3>
                @endif
            </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">Add Past Work Experience</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/experience/">
                        {{ csrf_field() }}
                <br>
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Position Title:</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" @if (count($errors)) value="{{ old('title') }}" @endif>
                                @if ($errors->has('title'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                        </div>

                    </div> 

                     <div class="form-group {{ $errors->has('establishment_name') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Name of Establishment:</label>
                        <div class="col-sm-8">
                            <input type="text" name="establishment_name" class="form-control" @if (count($errors)) value="{{ old('establishment_name') }}" @endif>
                                @if ($errors->has('establishment_name'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('establishment_name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div> 

                    <div class="form-group {{ $errors->has('employment_length') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Employment Length:</label>
                        <div class="col-sm-8">
                            <input type="text" name="employment_length" class="form-control" @if (count($errors)) value="{{ old('employment_length') }}" @endif>
                                @if ($errors->has('employment_length'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('employment_length') }}</strong>
                                    </span>
                                @endif
                        </div>

                    </div> 

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-sm-4 control-label">Describe your roles:</label>
                        <div class="col-sm-8">
                            <input type="textarea" name="description" class="form-control" @if (count($errors)) value="{{ old('description') }}" @endif>
                                @if ($errors->has('description'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div> 
                     <input name="employee_id" class="form-control" type="hidden" value="{{$user->id}}">   
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

