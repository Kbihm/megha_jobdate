@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class=""><a href="/profile/experience">Experience</a></li>
            <li class="active"><a href="/profile/availability">Availability</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class=""><a href="/profile/subscription" >Subscription</a></li>
            @endif
            <li class=""><a href="/profile/security">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        

            <div class="panel panel-default">
                <div class="panel-heading">Availability</div>
                <div class="panel-body">

                    <h4>Set your availability for the next 30 days </h4>
                    <hr>
 
                    <table class="table table-striped">

                        <tr>
                            <th>Date</th>
                            <th class="text-center">Morning</th>
                            <th class="text-center">Day</th>
                            <th class="text-center">Night</th>
                            <th>&nbsp; </th>
                        </tr>

                        @for($i = 0; $i < $first['mday']; $i++)
                               <!-- #padding -->
                        @endfor


                        @for($i = $first['mday']; $i <= $daytarget; $i++)

                        <tr>
                            <form class="avail" action="" type="post"> 

                            <input type="text" name="date" value="{{ $first['year'] }}-{{ $first['mon'] }}-{{ $i }}" hidden="hidden">

                            <td>{{ $i }}/{{ $first['mon'] }}/{{ $first['year'] }}</td>
                            <td class="text-center">
                                <input type="checkbox" name="morning">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="day">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="night">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" type="submit" >Save</button>
                            </td>

                            </form>
                        </tr>

                        @endfor   


                        @if($first['mon'] == $last['mon']-1)
                        @for($i = 1; $i <= $last['mday']-1; $i++)

                        <tr>
                            <td>{{ $i }}/{{ $last['mon'] }}/{{ $last['year'] }}</td>
                            <td class="text-center">
                                <input type="checkbox">
                            </td>
                            <td class="text-center">
                                <input type="checkbox">
                            </td>
                            <td class="text-center">
                                <input type="checkbox">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success">Save</button>
                            </td>
                        </tr>

                        
                        @endfor
                        @endif

                    </table>


                </div>
            </div>

            <script type="text/javascript">


            $("#avail").submit(function(e) {
                e.preventDefault();
                console.log("submit fired");
            });


            </script>


        @endsection           

