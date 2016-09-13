 @extends('layouts.app')
@section('content')

    <div class="col-md-10 col-md-offset-2">
        
                    @foreach($users as $user)
                        @if($user->employee_id != null)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                <div class="col-sm-4">
                                        <a href="/admin/user/{{ $user->id }}" ><h4>{{$user->first_name}} {{$user->last_name}}</h4> </a>
                                </div>
                                    <div class="col-sm-6 pull-right">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100" style="width: <?php $rating = $user->employee->average_rating; echo $rating*10; ?>%"> 
                                            </div>
                                            <div class="col-md-4"> Average Rating:  <?php $rating = $user->employee->average_rating; echo $rating*10; ?>% </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div class="panel-body">
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
                                        <a class="btn" href="/offers/{{$user->id}}"> Send Job Offer </a>
                                   </div>
                            </div>
                            </div>



                        @endif
                    @endforeach
        
    </div>

@endsection           

