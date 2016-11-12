@extends('layouts.app')
    @section('content')
        <!--  <small>Employee Profile</small> -->
        <style>
                @charset "utf-8";
                .calendar {
                width: 100%;
                }
                .calendar div {
                float: left;
                height: 80px;
                width: 14.285714%;
                }
                .calendar .monheader {
                color: #FFFFFF;
                text-align: center;
                height: 20px;
                width: 100%;   
                background-color: #2fa4e7;
                }
                .calendar .dayheader {
                color: #FFFFFF;
                text-align: center;
                height: 20px;
                background-color: #2fa4e7;
                }
                .calendar .day {
                background-color: #fafafa;;
                }
                .calendar .today {
                background-color: #5ab4dd;
                border-color: #5ad6dd;
                }
                .calendar .inactive {
                background-color: #dedede;
                }
                #row{
                    clear: left;
                    float: left;
                    height: 25%;
                    width: 100%;

                }
                .calendar .day,
                .calendar .inactive {
                    border: 1px solid #828282;
                }
        </style>
        <?php
 
            $availability = [];

            foreach ($user->availability as $avl) {

                $tmp = [
                'date' => $avl->date,
                'morning' => $avl->morning,
                'day' => $avl->day,
                'night' => $avl->night
                ];

                array_push($availability, $tmp);
            }

        ?>

            <div class="row">
            <div class="col-md-3">
                <h3 class="page-title"> {{ $user->user->first_name }} </h3>
                @if (Storage::disk('local')->has($user->id . '.jpg'))
                <div style="background-image: url({{route('image', ['filename' => $user->id.'.jpg'])}}); background-position: center; background-repeat: no-repeat; border: 1px solid black; height: 250px; width:250px; background-size: contain; background-color: grey;"></div>


                @endif
                <hr>

                <div class="progress">
                    <div class="progress-bar" style="width: {{ number_format($user->average_rating / 3 * 100, 2) }}%;"></div>
                </div>

                <p> 

                    <h4>About {{ $user->user->first_name }} </h4>

                    <ul class="breadcrumb">
                        <li>{{ $user->state }}</li>
                        <li> {{ $user->region }}</li>
                        <li class="active">{{ $user->locale }}</li>
                    </ul>

                    <b>Role</b> {{ $user->role }} <br/>
                    <b>Gender</b>
                    @if ($user->gender == 0)
                        Male
                    @elseif ($user->gender == 1)
                        Female
                    @endif  
                    <br/>
                    <b>Hourly Rate</b> ${{ number_format($user->hourly_rate, 2) }}  <br/>
                    <b>Last Active</b> {{ date('F d, Y', strtotime($user->user->last_login)) }}
                </p>

                <hr>

                    <a href="/reviews/create/{{$user->id}}"  class="btn btn-default btn-block">
                        Review {{ $user->user->first_name }}
                    </a>

                    @if (isset($jobs))
                    <button type="button" class="btn btn-default dropdown-toggle col-md-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="col-md-10 pull-left"> 
                            Invite {{ $user->user->first_name }} to a Job 
                        </div> 
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu col-md-12">
                        
                        @foreach($jobs as $job)
                        <form method="POST" action="/invite" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="joboffer_id" value="{{$job->id}}">
                        <input type="hidden" name="employee_id" value="{{$user->id}}">
                        <li><button class="col-md-12" type="submit">{{ date('d F Y', strtotime($job->date)) }}, {{$job->time}}</button></li>
                        </form>
                        @endforeach
                    </ul>
                    @else

                    <hr>
                    <h5>Create a Job listing to invite {{ $user->user->first_name }}.</h5>

                    @endif 


            </div> <!-- end sidebar --> 

            <div class="col-md-9">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">About {{$user->user->first_name}}</h3>
                </div>
                <div class="panel-body">
                    <p>{{$user->about}}</p>
                </div>
            </div> 

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$user->user->first_name}}'s Availability</h3>
                </div>
                <div class="panel-body">
                        <div class="calendar">
                        <div class="monheader">Next 14 Days</div>
                        <div class="dayheader">Sun</div>
                        <div class="dayheader">Mon</div>
                        <div class="dayheader">Tue</div>
                        <div class="dayheader">Wed</div>
                        <div class="dayheader">Thu</div>
                        <div class="dayheader">Fri</div>
                        <div class="dayheader">Sat</div>

                        @for($i = 0; $i < $first['wday']; $i++)
                        <div class="inactive"></div>
                        @endfor

                            @for($i = $first['mday']; $i <= $daytarget; $i++)

                            <div class="day"> 
                            <row id="row" style="padding-left: 10px;"> {{$i}} </row> 
                            
                            <?php $key = array_search($first['year'].'-'.$first['mon'].'-'.$i, array_column($availability, 'date')); ?>
                                @if($key !== false)

                                   @if($availability[$key]['morning'] == false)
                                        <row id="row" style="background-color:#F44336;"></row>
                                   @else
                                        <row id="row" style="background-color:#4CAF50;"></row>
                                   @endif  

                                   @if($availability[$key]['day'] == false)                                   
                                        <row id="row" style="background-color:#F44336;"></row>
                                   @else
                                        <row id="row" style="background-color:#4CAF50;"></row>
                                   @endif

                                   @if($availability[$key]['night'] == false)
                                        <row id="row" style="background-color:#F44336;"></row>
                                   @else
                                        <row id="row" style="background-color:#4CAF50;"></row>
                                   @endif

                                @endif
                            </div>
                        @endfor   
                        @if($first['mon'] == $last['mon']-1)
                            @for($i = 1; $i <= $last['mday']-1; $i++)
                            <div class="day"> 
                            <row id="row"> {{$i}} </row> 
                            
                            <?php $key = array_search($first['year'].'-'.$first['mon'].'-'.$i, array_column($availability, 'date')); ?>
                                @if($key !== false)

                                   @if($availability[$key]['morning'] != false)
                                        <row id="row" style="background-color:#F44336;"></row>
                                   @else
                                        <row id="row" style="background-color:#4CAF50;"></row>
                                   @endif  

                                   @if($availability[$key]['day'] != false)                                   
                                        <row id="row" style="background-color:#F44336;"></row>
                                   @else
                                        <row id="row" style="background-color:#4CAF50;"></row>
                                   @endif

                                   @if($availability[$key]['night'] != false)
                                        <row id="row" style="background-color:#F44336;"></row>
                                   @else
                                        <row id="row" style="background-color:#4CAF50;"></row>
                                   @endif

                                @endif
                            </div>
                            @endfor
                        @endif

                        @for($i = 0; $i < 7 - $first['wday']; $i++)
                            <div class="inactive"></div>
                        @endfor

                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Skills</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->skill) > 0)
                <ul>
                    @foreach ($user->skill as $skill)
                    <li> {{ $skill->skill }} </li>
                    @endforeach
                </ul>
                @else
                    <p> {{ $user->user->first_name }} hasn't put in any skills just yet. </p>
                @endif
            </div>
        </div>

        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Experiences</h3>
            </div>
            <div class="panel-body">
                @if (sizeof($user->experience) > 0)
                    @foreach ($user->experience as $experience)
                    <h4>{{ $experience->title }}  <span class="text-muted"> ({{ $experience->establishment_name}})</span> </h4>
                    <h6> {{ $experience->employment_length }} </h6>
                    <p> {{ $experience->description }} </p>
                    <hr>
                    @endforeach
                @else
                    <p> {{ $user->user->first_name }} hasn't put in any experience just yet. </p>
                @endif
            </div>
        </div>


        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Reviews about {{$user->user->first_name}} from other JobDate Employers</h3>
                </div>
                <div class="panel-body">
                    @if (sizeof($user->comments) > 0)
                    @foreach($user->comments as $comment)
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
                                    <small>{{ $comment->employer->user->first_name }} at {{ $comment->employer->establishment_name }}  ({{ date('F, Y', strtotime($comment->created_at)) }}) </small>

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
                     Looks like there aren't any reviews for {{$user->user->first_name }} just yet.
                    @endif
                </div>
            </div>

        </div>
        
    @endsection