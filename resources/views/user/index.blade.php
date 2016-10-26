 @extends('layouts.app')
@section('content')

    <div class="col-md-3">

        <h4>Search Filters Go Here </h4>

        <ul>
            <li>Date </li>
            <li>Time of Day (Morning / Day / Night) </li>
            <li>Role </li>
            <li>Looking for fulltime Work </li>
            <li>Profile Active (Done in background always true) </li>
        </ul>

        <form class="form">

        <div class="form-group">
            <label>Date</label>
            <input type="text" id="datepicker" class="form-control">
        </div>


        </form>

    </div>


    <div class="col-md-9">
        
                    @foreach($users as $user)
                        @if($user->employee_id != null)

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <a href="/staff/{{ $user->employee->id }}" >
                                    <h3 class="panel-title" style="color:#fff;">{{$user->first_name}} {{$user->last_name}}</h3>
                                </a>
                            </div>
                            <div class="panel-body">
                                   <div class="col-md-3">
                                         <img src="/profilePics/{{ $user->employee_id }}.jpg" class="img-responsive"  alt="{{ $user->first_name }}">
                                        <hr style="margin-top:10px; margin-bottom:10px;">
                                        Average Rating:  <?php $rating = $user->employee->average_rating; echo $rating*10; ?>% 
                                   </div>   
                                   <div class="col-md-9">
                                        <p>About {{$user->first_name}} </p>
                                        <ul>
                                        <li> <strong>Hourly Rate: {{$user->employee->hourly_rate}}</strong> </li>
                                        <li> <strong>Bio:</strong> {{ str_limit($user->employee->about, $limit = 100, $end = '...') }} </li>
                                        <li> <strong> Availability </strong> </li>
                                        </ul>

                                        <!-- <a class="btn" href="/offers/{{$user->id}}"> Send Job Offer </a> -->
                                   </div>
                            </div>
                            </div>



                        @endif
                    @endforeach
        
    </div>

@endsection           

