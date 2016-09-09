 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

                    @if ($settings != null)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        JobDate Settings
                        </div>

                        <div  class="panel-body">  
                            
                            <form class="form" action="/admin/settings/1" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PATCH')}}

                                <div class="form-group{{ $errors->has('sub_days') ? ' has-error' : '' }}">
                                    <label>Subscription Days</label>
                                    <input type="text" name="sub_days" value="{{ $settings->sub_days }}" class="form-control">

                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_days') }}</strong>
                                    </span>
                                </div>

                                <div class="form-group{{ $errors->has('sub_price') ? ' has-error' : '' }}">
                                    <label>Subscription Price</label>
                                    <input type="text" name="sub_price" value="{{ $settings->sub_price }}" class="form-control">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_price') }}</strong>
                                    </span>
                                </div>

                                <div class="form-group{{ $errors->has('support_email') ? ' has-error' : '' }}">
                                    <label>Support Email</label>
                                    <input type="text" name="support_email" value="{{ $settings->support_email }}" class="form-control">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('support_email') }}</strong>
                                    </span>
                                </div>
                                
                                <div class="form-group{{ $errors->has('dispute_email') ? ' has-error' : '' }}">
                                    <label>Dispute Email</label>
                                    <input type="text" name="dispute_email" value="{{ $settings->dispute_email }}" class="form-control">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dispute_email') }}</strong>
                                    </span>
                                </div>

                                <div class="form-group{{ $errors->has('employee_registration_blocked') ? ' has-error' : '' }}">
                                    <label>Employee Registration Blocked</label> <br/>
                                    <input type="checkbox" name="employee_registration_blocked" value="{{ $settings->employee_registration_blocked }}"  class="">
                                <span class="help-block">
                                        <strong>{{ $errors->first('employee_registration_blocked') }}</strong>
                                    </span>
                                </div>

                                <hr>

                                <input type="submit" value="Update" class="btn btn-primary">


                            </form>

                        </div>
                    </div>

                    @endif

    </div>

@endsection           

