 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

                    @if ($settings != null)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        JobDate Settings
                        </div>

                        <div  class="panel-body">  
                            
                            <form class="form">

                                <div class="form-group">
                                    <label>Subscription Days</label>
                                    <input type="text" name="sub_days" value="{{ $settings->sub_days }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Subscription Price</label>
                                    <input type="text" name="sub_price" value="{{ $settings->sub_price }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Support Email</label>
                                    <input type="text" name="support_email" value="{{ $settings->support_email }}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Dispute Email</label>
                                    <input type="text" name="dispute_email" value="{{ $settings->dispute_email }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Employee Registration Blocked</label> <br/>
                                    <input type="checkbox" name="employee_registration_blocked" value="{{ $settings->employee_registration_blocked }}" class="">
                                </div>

                                <hr>

                                <input type="submit" value="Update" class="btn btn-primary">


                            </form>

                        </div>
                    </div>

                    @endif

    </div>

@endsection           

