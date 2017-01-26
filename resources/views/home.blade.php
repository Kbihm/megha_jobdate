@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
                        
 <?php
 Auth::user()->last_login = new Datetime;
 Auth::user()->save();
 ?>                       
            @if (Auth::user()->employee_id != null && Auth::user()->employee->email_confirmed == false && null === (session('error')))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:0 !important;"><span aria-hidden="true">&times;</span></button>
               Your account still isn't verified, please check your email for a verification link. Cant see your verification email?  <a href="/verify/set/{{Auth::user()->id}}">Click Here for a new verification link</a>
            </div>
            @endif  
                        
<div class="container-fluid">
  <div class="row">

            <div class="jumbotron">

                <h1>Hi {{ Auth::user()->first_name }}, Welcome to JobDate </h1>
                
                        @if (Auth::user()->employer_id != null)

                        <p>From here you have access to update your account settings and ability to search for staff. </p>

                        @elseif(Auth::user()->employee_id != null)

                        <p> From here you have access to update your profile settings. </p>

                        @else

                        <p> Here's some information about Job Date. </p>

                        @endif


            </div>

                    @if (Auth::user()->admin_id != null)


                    <?php 
                    
                        $admin_count = sizeOf(App\Admin::all());
                        $employee_count = sizeOf(App\Employee::all());
                        $employer_count = sizeOf(App\Employer::all());
                        $user_count = sizeOf(App\User::all());
                    
                    ?>

                        <!-- graphic area in html -->

    <div class="col-md-6">
    <div class="card">
        <div class="content">

    <h4 class="title">JobDate Users</h4>

    <div class="row margin-top">

     <div class="col-md-10 col-md-offset-1">

         <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

     </div>

    </div>

    <div class="row">

     <div class="col-md-10 col-md-offset-1">

         <h6>Legend</h6>

         <i class="fa fa-circle text-info"></i> Admins ({{ $admin_count }})
         <i class="fa fa-circle text-success"></i> Employees ({{ $employee_count }})
         <i class="fa fa-circle text-warning"></i> Employers ({{ $employer_count }})

         <?php 
         
            $yesterday = Carbon\Carbon::now()->subDay();

            $actv = App\User::where('last_login', '>', $yesterday)->get();
            $active_users = sizeOf($actv);
         
         ?>
         <hr>
         <p> {{ $active_users }} users active in past 24 hours. </p>
     </div>
    </div>

                <!-- javascript -->
                <script type="text/javascript">
                Chartist.Pie('#chartPreferences', {

                labels: ['{{ number_format($admin_count / $user_count * 100,0) }}%',
                            '{{ number_format($employee_count / $user_count * 100,0) }}%',
                            '{{ number_format($employer_count / $user_count * 100,0) }}%'],
                series: [{{ number_format($admin_count / $user_count * 100,2) }}, {{ number_format($employee_count / $user_count * 100,2) }}, {{ number_format($employer_count / $user_count * 100,0) }}]

                });
                </script>

                <p> &nbsp; </p>

                        </div>
                    </div>
                </div>

                    <div class="col-md-6">

                        <div class="card">
                            <div class="content">

                                <h4 class="title">Comments</h4>
                                <?php $comments_to_approve = App\Comment::where('approved', false)->get(); ?>

                                <p> {{ sizeOf($comments_to_approve) }} Comments need approval.</p>
                                <a href="/admin/comments" class="btn btn-primary" > See Comments </a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="content">

                                <h4 class="title">Job Offers</h4>
                                <?php $joboffer_count = App\Joboffer::all(); ?>
                                <p> {{ sizeOf($joboffer_count) }} Job Offers sent.</p>
                               
                                <?php $joboffer_approved_count = App\Joboffer::where('status', 'approved'); ?>
                                <p> {{ sizeOf($joboffer_approved_count) }} Job Offers approved.</p>

                            </div>
                        </div>

                        <div class="card">
                            <div class="content">

                                <h4 class="title">Employee Information</h4>

                                <?php $male_count = sizeOf(App\Employee::where('gender', '0')->orWhere('gender', 'Male')->get()); ?>
                                <?php $female_count = sizeOf(App\Employee::where('gender', '1')->orWhere('gender', 'Female')->get()); ?>

                                <p> {{ $employee_count }} employees. ({{ $male_count }} male, {{ $female_count }} female) </p>
                                <?php $skill_count = App\Skill::all(); ?>
                                <p> {{ sizeOf($skill_count) }} qualifications added.</p>
                               
                                <?php $experience_count = App\Experience::all(); ?>
                                <p> {{ sizeOf($experience_count) }} experience listings added.</p>

                                <?php $avg_hourly = number_format(App\Employee::all()->avg('hourly_rate'), 2);
                                 ?>

                                <p> Average Hourly Rate ${{ $avg_hourly }} </p>

                                <hr>

                                <ul>
                                    @foreach (App\Settings::$roles as $role)

                                        <?php $count = sizeOf(App\Employee::where('role', $role)->get()); ?>
                                        <li> {{ $count }} {{ $role }} </li>

                                    @endforeach
                                </ul>


                            </div>
                        </div>


                    </div>


                    @elseif (Auth::user()->employee_id != null)

                    <div class="col-md-3">

                        <h2>My Account</h2>

                        <ul class="list-group">
                            <a class="list-group-item" href="/offers" >
                                Offers
                            </a>
                            <a class="list-group-item" href="/my-reviews" >
                                My Reviews
                            </a>
                            <a class="list-group-item" href="/profile/skills" >
                                Add a Qualification
                            </a>
                            <a class="list-group-item" href="/profile/experience" >
                                Add Experience
                            </a>
                            <a class="list-group-item" href="/profile" >
                                Update my details
                            </a>
                        </ul>
                    </div>

                    <div class="col-md-9">
                                         <div class="card">
                        <div class="content">
        <h3> Latest review left for you</h3>


            <div class="card">
                <div class="content">

        @if(sizeof($review) > 0)
                                <blockquote>    
                                   <div class="pull-right">
                                   @if ($review->rating == 0)
                                        <span class="label label-danger">Negative</span>
                                    @elseif ($review->rating == 1)
                                        <span class="label label-default">Neutral</span>
                                    @elseif ($review->rating == 2)
                                        <span class="label label-success">Positive</span>
                                    @endif
                                    </div>
                                    <p>{{$review->comment}}<p>
                                </blockquote>                             
        @else
                    <p> There doesn't seem to be any reviews that have been left for you. </p>
                    @endif
                    </div>
                    </div>
                    </div>
             </div>
                    <div class="card"> <div class="content">

                    <h3> JobDate Profile Tips</h3>
                    
                    <p>Within this section you are able to navigate throughout your profile and update as needed.</p>
                    <p>Add a profile picture to your profile page to become more visible and stand out to potential Employers as this is the first thing that an employer sees when they search.</p>
                    <p>Regularly update you calendar availability as to not miss out on potential employment opportunities.</p>
                    <p>Add your relevant Skills to your profile, these can be things such as an RSA certificate or completed qualifications, this will allow employers to have a better understanding of you and make a better informed decision to hire you.</p>
                    <p>Ensure you keep your past experience up to date so an employer can see what work you have done in the past, this will allow them to see the type of fit you may have for a role and could help them make a decision to hire you.</p>
                    <p>When you complete the about me section, as this is one of the first things an employer will see when searching, keep this short and sharp, but outline your reasons for wanting the work you have put down on your profile, an employer can then see what motivates you and why they should hire you.</p>
                    <p>We hope you enjoy your Jobdate experience and you find employment in a suitable position.</p>

                    </div> </div>

                    </div>

                    @elseif (Auth::user()->employer_id != null)

                        <div class="col-md-3">

                        <h2>My Account</h2>

                        <ul class="list-group">
                            <a class="list-group-item" href="/jobs" >
                                My Job Listings
                            </a>
                            <a class="list-group-item" href="/staff" >
                                Find Staff
                            </a>
                            <a class="list-group-item" href="/reviews" >
                                Reviews I've Left
                            </a>
                            <a class="list-group-item" href="/profile/subscription" >
                                My Subscription
                            </a>
                        </ul>
                    </div>

                    <div class="col-md-9">
                     <div class="card">
                        <div class="content">
        <h2 > Reviews you've got to leave for Jobdate Staff</h2>


            <div class="card">
                <div class="content">

        @if(sizeof($joboffers) > 0)
                    @foreach($joboffers as $joboffer)
                                <blockquote>    
                                   <div class="pull-right">
                                    <i>{{ $joboffer->time }} - {{ date('M d, Y', strtotime($joboffer->date)) }}</i>
                                    </div>
                                    <p>{{ $joboffer->role}} at {{ $joboffer->employer->establishment_name }}<p>
                                   <a class="btn btn-primary btn-xs" href="/reviews/create/{{$joboffer->employee_id}}"> Review </a>
                                </blockquote>                             
                    @endforeach
        @else
                    <h3> There doesn't seem to be any reviews for you to leave. </h3>
                    @endif
                    </div>
             </div>
            </div>
            </hr>
            </div>
                    <div class="card"> <div class="content">

                    <h2> Employer Access</h2>
                                        <p>
                        Within this section you are able to navigate throughout your account and you can control your hiring experience. </p> 
                    <p>
                        You can search for staff, leave a review for a previous employee, update your subscription, update your company details and view previous job listings. </p> 
                    <p>
                        We hope you enjoy your Jobdate experience and find the process simple and effective to solve your staffing needs.
                    </p>
                    
                    </div> </div>
                    
                    </div>

                    


                    @else

                    @endif

                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection