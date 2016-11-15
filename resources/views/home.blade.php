@extends('layouts.app')

@section('content')
                        
 <?php
 Auth::user()->last_login = new Datetime;
 Auth::user()->save();
 ?>                       

                        
<div class="container-fluid">
    <div class="row">
            <div class="jumbotron">
                <h1>Welcome, {{ Auth::user()->first_name }} </h1>
                        <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
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

         <i class="fa fa-circle text-info"></i> Admins
         <i class="fa fa-circle text-success"></i> Employees
         <i class="fa fa-circle text-warning"></i> Employers

     </div>
    </div>

                <!-- javascript -->
                <script type="text/javascript">
                Chartist.Pie('#chartPreferences', {

                labels: ['{{ $admin_count }} ({{ number_format($admin_count / $user_count * 100,2) }}%)',
                            '{{ $employee_count }} ({{ number_format($employee_count / $user_count * 100,2) }}%)',
                            '{{ $employer_count }} ({{ number_format($employer_count / $user_count * 100,2) }}%)'],
                series: [{{ number_format($admin_count / $user_count * 100,2) }}, {{ number_format($employee_count / $user_count * 100,2) }}, {{ number_format($employer_count / $user_count * 100,0) }}]

                });
                </script>

                <p> &nbsp; </p>

                        </div>
                    </div>
                </div>

                    @elseif (Auth::user()->employee_id != null)

                    <div class="col-md-3">

                        <h2>My Account</h2>

                        <ul class="list-group">
                            <a class="list-group-item" href="/profile/skills" >
                                Offers
                            </a>
                            <a class="list-group-item" href="/my-reviews" >
                                My Reviews
                            </a>
                            <a class="list-group-item" href="/profile/skills" >
                                Add a Skill
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

                    <h2> JobDate Profile Tips</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a mattis eros. Sed interdum nec arcu eu placerat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi mollis scelerisque enim posuere volutpat. Duis laoreet iaculis nisi in suscipit. Etiam in est felis. Aenean augue tellus, vulputate sit amet ligula cursus, sodales volutpat elit. Donec sit amet tristique risus, sed imperdiet lorem. Curabitur ipsum enim, lacinia vitae imperdiet ac, pellentesque at diam.</p>

                    </div>

                    @elseif (Auth::user()->employer_id != null)

                        <div class="col-md-3">

                        <h2>My Account</h2>

                        <ul class="list-group">
                            <a class="list-group-item" href="/jobs" >
                                My Job Listings
                            </a>
                            <a class="list-group-item" href="/search" >
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

                    <h2> JobDate Text</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a mattis eros. Sed interdum nec arcu eu placerat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi mollis scelerisque enim posuere volutpat. Duis laoreet iaculis nisi in suscipit. Etiam in est felis. Aenean augue tellus, vulputate sit amet ligula cursus, sodales volutpat elit. Donec sit amet tristique risus, sed imperdiet lorem. Curabitur ipsum enim, lacinia vitae imperdiet ac, pellentesque at diam.</p>

                    </div>


                    @else

                    @endif

                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection