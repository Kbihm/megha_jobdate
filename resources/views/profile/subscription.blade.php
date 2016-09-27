@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="/profile/user" data-toggle="tab" aria-expanded="false">Your Information</a></li>
            <li class=""><a href="/profile/subscription" data-toggle="tab" aria-expanded="true">Subscription</a></li>
            <li class=""><a href="/profile/security" data-toggle="tab" aria-expanded="true">Security</a></li>
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