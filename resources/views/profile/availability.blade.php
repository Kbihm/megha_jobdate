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
                        </tr>

                        @for($i = $first['mday']; $i <= $daytarget; $i++)

                        <tr class="data-row">
                            <input type="hidden" name="date" id="date" value="{{ $first['year'] }}-{{ $first['mon'] }}-{{ $i }}">

                            <td>{{ $i }}/{{ $first['mon'] }}/{{ $first['year'] }}</td>
                            <td class="text-center">
                                <input type="checkbox" name="morning" id="morning">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="day" id="day">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="night" id="night">
                            </td>
                        </tr>

                        @endfor   


                        @if($first['mon'] == $last['mon']-1)
                        @for($i = 1; $i <= $last['mday']-1; $i++)

                        <tr class="data-row">
                            <input type="hidden" id="date" name="date" value="{{ $last['year'] }}-{{ $last['mon'] }}-{{ $i }}" >

                            <td>{{ $i }}/{{ $last['mon'] }}/{{ $last['year'] }}</td>
                            <td class="text-center">
                                <input type="checkbox" name="morning" id="morning">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="day" id="day">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="night" id="night">
                            </td>
                        </tr>
                        
                        @endfor
                        @endif

                    </table>

                    <div class="text-center">
                        <button type="submit" id="submit" class="btn btn-success">Save</button> 
                    </div>

                </div>
            </div>

            <script type="text/javascript">

            $("#submit").click(function() {

                availability = [];
                $(".data-row").each(function(index) {

                    var row = {
                        "date": $(this).find("#date").val(),
                        "morning": $(this).find("#morning").prop('checked'),
                        "day": $(this).find("#day").prop('checked'),
                        "night": $(this).find("#night").prop('checked')
                    }

                    // console.log("Date: " + $(this).find("#date").val());
                    // console.log("Morning: " + $(this).find("#morning").prop('checked'));
                    // console.log("Day: " + $(this).find("#day").prop('checked'));
                    // console.log("Night: " + $(this).find("#night").prop('checked'));
                    availability.push(row);

                });

               $.ajax({
                    url: "/avl",
                    type: "post",
                    data: availability,
                    processData: false,
                    dataType: "json",
                    contentType: "application/json"
                }).done(function(data) {
                    console.log(data);
                    window.reload();
                });

                // console.log(availability);

            });


            </script>


        @endsection           

