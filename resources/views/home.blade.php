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
                            <li class="list-group-item">
                                <span class="badge">2</span>
                                Job Offers
                            </li>
                            <li class="list-group-item">
                                <span class="badge">14</span>
                                My Reviews
                            </li>
                            <li class="list-group-item">
                                Add a Skill
                            </li>
                            <li class="list-group-item">
                                Add Experience
                            </li>
                            <li class="list-group-item">
                                Update my details
                            </li>
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
                            <li class="list-group-item">
                                <span class="badge">14</span>
                                Reviews
                            </li>
                            <li class="list-group-item">
                                My Job Listings
                            </li>
                            <li class="list-group-item">
                                Find Staff
                            </li>
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
