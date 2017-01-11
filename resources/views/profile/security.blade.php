@extends('layouts.app')

@section('title')
Account Security
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
                    <a class="list-group-item" href="/profile/skills" >Qualifications</a>
                    <a class="list-group-item" href="/profile/experience">Experience</a>
                    <a class="list-group-item" href="/profile/availability">Availability</a>
                    @endif
                    @if ($user->employer_id != null)
                    <a class="list-group-item" href="/profile/subscription" >Subscription</a>
                    @endif
                    <a class="list-group-item active" href="/profile/security">Security</a>
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
            SECURITY
        -->
        <div class="tab-pane fade active in" id="security">
           
          <div class="col-md-12">

          @if ($pw_update == true)
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Updated!</strong> You successfully updated your password.
            </div>
          @endif


          <h4> Change Password </h4>

            <div class="card">
                <div class="content">
                
                    <br>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/updatepass') }}">
                        {{ csrf_field() }}
                                                
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="col-md-4 control-label">New Password:</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" >

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                                             
                        <div class="form-group{{ $errors->has('new_password_confirm') ? ' has-error' : '' }}">
                            <label for="new_password_confirm" class="col-md-4 control-label">Confirm New Password:</label>

                            <div class="col-md-6">
                                <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirm" value="{{ old('new_password_confirm') }}">

                                @if ($errors->has('new_password_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password_confirm') }}</strong>
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


                </div>
            </div>
        </div>
        
        </div>

        </div>

@endsection           

