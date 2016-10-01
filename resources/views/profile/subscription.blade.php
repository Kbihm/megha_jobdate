@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class="active"><a href="profile/experience">Experience</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class="active"><a href="/profile/subscription" >Subscription</a></li>
            @endif
            <li class=""><a href="/profile/security">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="subscription">
           
            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Subscription</h3>
            </div>
            <div class="panel-body">
                Coming Soon!

                <h2 class="text-danger text-center"> Subscription Ends: {{ $user->employer->subscription_end }} </h2>
            </div>
        </div>

        </div>
        @endsection