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

                        Admin

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
                        
                        No role set.

                    @endif

                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection