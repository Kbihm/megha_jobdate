 @extends('layouts.app')
@section('content')

    <div class="col-md-3">

        <div class="well">

        <h4>Narrow your Search </h4>
        <form class="form">

        <div class="form-group">
            <label>State</label>
            <select id="role" class="form-control" name="region" value="">
                <option value="tba">Coming Soon.</option>
            </select>
        </div>

        <div class="form-group">
            <label>Region</label>
            <select id="role" class="form-control" name="region" value="">
                <option value="tba">Coming Soon.</option>
            </select>
        </div>

        <div class="form-group">
            <label>Area</label>
            <select id="role" class="form-control" name="region" value="">
                <option value="tba">Coming Soon.</option>
            </select>
        </div>

        <div class="form-group">
            <label>Suburb</label>
            <select id="role" class="form-control" name="region" value="">
                <option value="tba">Coming Soon.</option>
            </select>
        </div>

        <div class="form-group">
            <label>Available on the</label>
            <input type="text" id="datepicker" class="form-control">
        </div>

        <div class="form-group">
            <label>Time of Day</label>
            <select class="form-control">
                <option>Any</option>
                <option>Morning</option>
                <option>Day</option>
                <option>Night</option>
            </select>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select id="role" class="form-control" name="role" value="">
                <option value="Any">Any</option>
                <option value="Waiter/Waitress">Waiter/Waitress</option>
                <option value="Bartender">Bartender</option>
                <option value="Chef">Chef</option>
                <option value="Musician">Musician</option>
                <option value="Kitchen Hand">Kitchen Hand</option>
            </select>
        </div>

        <div class="form-group">
            <label>Looking for Fulltime Work</label> <br/>
            <select class="form-control">
                <option>Any</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Search</button>

        </form>
        </div>

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
                                            @if (Storage::disk('local')->has($user->employee->id . '.jpg'))
                                                <div style="background-image: url({{route('image', ['filename' => $user->employee->id.'.jpg'])}}); background-position: center; background-repeat: no-repeat; border: 1px solid black; height: 150px; width:150px; background-size: contain; background-color: grey;"></div>
                                            @else
                                                <div style="height: 150px; width:150px; background-color: grey; border: 1px solid black;"> <h4 class="text-center" style="margin-top:60px"> No Image</h4> </div>
                                            @endif
                                        <hr style="margin-top:10px; margin-bottom:10px;">
                                        Average Rating:  {{ number_format($user->employee->average_rating / 3 * 100, 2) }}%
                                   </div>
                                   <div class="col-md-9">
                                        <p>About {{$user->first_name}} </p>
                                        <ul>
                                        <li> <strong>Hourly Rate</strong> ${{ number_format($user->employee->hourly_rate, 2) }} </li>
                                        <li> <strong>Role</strong> {{ $user->employee->role }} </li>
                                        <li> <strong>Bio</strong> {{ str_limit($user->employee->about, $limit = 100, $end = '...') }} </li>
                                        </ul>

                                        <!-- <a class="btn" href="/offers/{{$user->id}}"> Send Job Offer </a> -->
                                   </div>
                            </div>
                            </div>



                        @endif
                    @endforeach
        
    </div>

@endsection           

