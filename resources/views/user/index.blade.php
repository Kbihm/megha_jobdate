 @extends('layouts.app')
@section('content')

    <div class="col-md-10 col-md-offset-2">

                    @foreach($users as $user)
                        @if($user->employee_id != null)


                        <div class="panel panel-default">
                            <div class="panel panel-heading">
                                {{$user->first_name}} {{$user->last_name}}

                                <div class="col-md-7 pull-right">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width:<?php $rating = $user->employee->average_rating; echo $rating*10; ?>%">
                                            
                                        </div>
                                        <div class="col-md-4"> Average Rating:  <?php $rating = $user->employee->average_rating; echo $rating*10; ?>% </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="panel panel-body">
                                   <div class="col-md-3">
                                   <img src="http://tinyurl.com/javaltj"></img>
                                   </div>
                                   <div class="col-md-3">
                                   <strong>Hourly Rate: {{$user->employee->hourly_rate}}</strong>
                                   </div>
                                   <div class="col-md-3">
                                   <strong>Bio:</strong> {{ str_limit($user->employee->about, $limit = 100, $end = '...') }}
                                   </div>
                                   <div class="col-md-3">
                                    <strong> availability </strong>
                                    <button class="btn"> Send Job Offer </button>
                                   </div>
                            </div>
                           (how can i remove this extra panel line?)
                        </div>


                        @endif
                    @endforeach

    </div>

@endsection           

