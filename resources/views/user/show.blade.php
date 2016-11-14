@extends('layouts.app')
    @section('content')

    @if(null !== (session('error')))
        <div class="alert alert-danger"><strong>Oops! </strong>{{session('error')}}</div>
    @endif
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
                    text-align: center;
                    height: 30px;
                    width: 100%;   
                    font-weight:200;
                    background-color: #f7f7f7;
                    font-size: 20px;
                }
                .calendar .dayheader {
                    text-align: center;
                    height: 25px;
                    font-weight:200;
                    background-color: #f7f7f7;
                    font-size:18px;
                }
                .calendar .day {

                }
                .calendar .today {
                background-color: #5ab4dd;
                border-color: #5ad6dd;
                }
                .calendar .inactive {
                /*background-color: #dedede;*/
                }
                #row{
                    clear:left;
                    float:left;
                    height: 22%;
                    width: 96%;
                    margin-left: 2%;
                    margin-right: 2%;
                    margin-bottom: 2%;
                }
                .calendar .day,
                .calendar .inactive {
                    border: 1px solid #e5e5e5;
                    border-width: 1px 0 0 1px;
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

                <div class="card card-product ">
                    @if (Storage::disk('local')->has($user->id . '.jpg'))
                    <div class="image">
                        <a href="#">
                            <img src="{{route('image', ['filename' => $user->id.'.jpg'])}}" alt="...">
                        </a>
                    </div>
                    @endif
                    <div class="content">
                        <h4 class="title">{{ $user->user->first_name }} {{ $user->user->last_name }}</h4>
                        
                        <br>
                        <span> {{ sizeOf($user->comments )}} Reviews - {{ number_format($user->average_rating / 3 * 100, 2) }}% Rating </span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ number_format($user->average_rating / 3 * 100, 2) }}%;"></div>
                        </div>


                        <div class="footer">

                            <span class="price">Role</span>
                            <span class="pull-right">
                                {{ $user->role }}
                            </span>
                            </br>

                            <span class="price">Hourly Rate</span>
                            <span class="pull-right">
                                <i class="fa fa-usd"></i>{{ number_format($user->hourly_rate, 2) }}
                            </span>
                            </br>

                            <span class="price">Gender</span>
                            <span class="pull-right">
                                @if ($user->gender == 0)
                                     <i class="fa fa-male"></i> Male
                                @elseif ($user->gender == 1)
                                     <i class="fa fa-female"></i> Female
                                @endif  
                            </span>
                            <br>
                            <span class="price">Last Active</span>
                            <span class="pull-right">
                                {{ date('M d, Y', strtotime($user->user->last_login)) }}
                            </span>

                        </div>
                    </div>
                </div>


                <div class="card card-product">
                    <div class="content">

                            <h4 class="title">Location </h4>

                            <div class="footer">
                                <span class="price">State</span>
                                <span class="pull-right">
                                    {{ $user->state }}
                                </span>
                                
                                <br>
                                <span class="price">Region</span>
                                <span class="pull-right">
                                    {{ $user->region }}
                                </span>
                                <br>
                                <span class="price">Area</span>
                                <span class="pull-right">
                                    {{ $user->area }}
                                </span>
                                <br>
                                <span class="price">Suburb</span>
                                <span class="pull-right">
                                    {{ $user->suburb }}
                                </span>
                            </div>

                    </div>
                </div>


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

            <div class="card">
                <div class="content">
                    <h4 class="title">About {{$user->user->first_name}}</h4>
                    <p class="description">{{$user->about}}</p>
                </div>
            </div> 

            <div class="card">
                <div class="content">
                    <div class="row">
                    <div class="col-md-12">

                    <h4 class="title">{{$user->user->first_name}}'s Availability</h4>
                
                        <div class="calendar">

                        <div class="monheader">{{ date('F') }} </div>
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
                            <row id="row" style="text-align: right; padding-right: 10px;"> {{$i}} </row> 
                            
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

                </div> <!-- end .calendar -->
            </div> <!-- end .content -->
        </div> <!-- end .card -->

        <div class="card">
            <div class="content">
                <h4 class="title">Skills</h4>

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

        
        <div class="card">
            <div class="content">
                <h4 class="title">Past Experience</h4>

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


        <div class="card">
                <div class="content">
                    <h4 class="title">Reviews about {{$user->user->first_name}} from other JobDate Employers</h4>

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