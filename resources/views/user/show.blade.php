@extends('layouts.app')
    @section('content')
<?php ?>

        <!--  <small>Employee Profile</small> -->

            <div class="row">

            <div class="col-md-3">

                <h3 class="page-title"> {{ $user->first_name }} </h3>
                <img src="http://placehold.it/250x300" width="250px" height="300px"/>

                <hr>

                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width:{{ $user->employee->average_rating * 10 }}%;"
                    aria-valuemin="0" aria-valuemax="100">
                        
                    </div>
                    <div class="col-md-4" style="color:black; text-align: center;"> Average Rating:  <?php $rating = $user->employee->average_rating; echo $rating*10; ?>% </div>
                </div>

                <div class="list-group">
                    <a href="/admin/comments/create" class="list-group-item">
                        <span class="badge">{{ sizeof(App\Comment::where('employee_id', $user->employee_id)->where('approved', true)->get()) }}</span>
                        Review {{ $user->first_name }}
                    </a>
                    <a href="#" class="list-group-item">
                        Invite {{ $user->first_name }} to a Job
                    </a>
                    @if (Auth::user()->admin_id != null)
                    <a href="#" class="list-group-item">
                        Delete {{ $user->first_name }}'s Account
                    </a>      
                    @endif
                </div>

            </div>

            <div class="col-md-9">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">About {{$user->first_name}}</h3>
                </div>
                <div class="panel-body">
                    <p>{{$user->employee->about}}</p>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$user->first_name}}'s Availability</h3>
                </div>
                <div class="panel-body">
                    <h4>Feature in later version.</h4>
                </div>
            </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Skills</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->employee->skill) > 0)
                <ul>
                    @foreach ($user->employee->skill as $skill)
                    <li> {{ $skill->name }} </li>
                    @endforeach
                </ul>
                @else
                    <p> {{ $user->first_name }} hasn't put in any skills just yet. </p>
                @endif
            </div>
        </div>

        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Experience</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->employee->experience) > 0)
                    @foreach ($user->employee->experience as $experience)
                    <h4>{{ $experience->title }}  <span class="text-muted"> ({{ $experience->establishment_name}})</span> </h4>
                    <h6> {{ $experience->employment_length }} </h6>
                    <p> {{ $experience->description }} </p>
                    <hr>
                    @endforeach
                @else
                    <p> {{ $user->first_name }} hasn't put in any experience just yet. </p>
                @endif
            </div>
        </div>


        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Reviews about {{$user->first_name}} from other JobDate Employers</h3>
                </div>
                <div class="panel-body">
                    @if (sizeof($user->employee->comments) > 0)
                    @foreach($user->employee->comments as $comment)
                        @if ($comment-> approved != 0)
                                <blockquote>
                                    <div class="pull-right">
                                    @if ($comment->rating == 1)
                                        <span class="label label-danger">Negative</span>
                                    @elseif ($comment->rating == 2)
                                        <span class="label label-default">Neutral</span>
                                    @elseif ($comment->rating == 3)
                                        <span class="label label-success">Positive</span>
                                    @endif
                                    </div>
                                    <p>{{$comment->comment}}<p>
                                    <small>{{ $comment->employer->user->first_name }} at {{ $comment->employer->establishment_name }} </small>

                                    @if (Auth::user()->admin_id != null || Auth::user()->employer_id ==  $comment->employer_id)
                                        <form class="form-horizontal" role="form" method="POST" action="/admin/comments/{{ $comment->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type-"submit" class="btn btn-danger btn-xs"> Delete </button>
                                        </form>
                                    @endif
                                </blockquote>                             
                                    
                                    
    
                        @endif
                    @endforeach
                    @else
                     Looks like there aren't any reviews for {{$user->first_name }} just yet.
                    @endif
                </div>
            </div>

        </div>
        
    @endsection