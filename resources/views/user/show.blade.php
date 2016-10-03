@extends('layouts.app')
    @section('content')
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

                <div class="btn-group">
                    <a href="/reviews/create/{{$user->employee->id}}"  class="btn btn-default col-md-12">
                        <div class="col-md-10">
                            Review {{ $user->first_name }}
                        </div>
                        <span class="badge pull-right">{{ sizeof(App\Comment::where('employee_id', $user->employee_id)->where('approved', true)->get()) }}</span>
                    </a>

                    <button type="button" class="btn btn-default dropdown-toggle col-md-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="col-md-10 pull-left"> 
                            Invite {{ $user->first_name }} to a Job 
                        </div> 
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                    @if (isset($jobs))
                     @foreach($jobs as $job)
                    <li role="separator" class="divider"></li>
                    <form method="POST" action="/invite" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="joboffer_id" value="{{$job->id}}">
                    <input type="hidden" name="employee_id" value="{{$user->employee->id}}">
                    <li><button type="submit">{{$job->date}}, {{$job->time}}</button></li>
                    </form>
                     @endforeach
                    @elseif (!isset($jobs))
                    <li role="seperator" class="divider"> </li>
                    <li><a href="joboffer/create" class="btn btn-default">You don't have any job listings.</a></li>
                    @endif
                    </ul>

                    
                        

                    @if (Auth::user()->admin_id != null)
                    <button type="button" href="#" class="btn btn-default">
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
                    <li> {{ $skill->skill }} </li>
                    @endforeach
                </ul>
                @else
                    <p> {{ $user->first_name }} hasn't put in any skills just yet. </p>
                @endif
            </div>
        </div>

        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Experiences</h3>
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