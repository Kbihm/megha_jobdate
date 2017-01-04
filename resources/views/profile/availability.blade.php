@extends('layouts.app')
@section('content')

        <?php
 
            $availability = [];

            foreach ($user->employee->availability as $avl) {

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

        <div class="card">
           
        
            @if ($user->employee_id != null)

                @if (Storage::disk('local')->has($user->employee_id . '.jpg'))
                    <div class="image">
                        <a href="#">
                            <img src="{{route('image', ['filename' => $user->employee_id.'.jpg'])}}" alt="...">
                        </a>
                    </div>
                @endif

            @endif
        <div class="content">
        <h4 class="title"> Manage your account </h4>

                <ul class="list-group">
                    <a class="list-group-item" href="/profile">Your Information</a>
                    @if ($user->employee_id != null)
                    <a class="list-group-item" href="/profile/skills" >Skills</a>
                    <a class="list-group-item" href="/profile/experience">Experience</a>
                    <a class="list-group-item active" href="/profile/availability">Availability</a>
                    @endif
                    @if ($user->employer_id != null)
                    <a class="list-group-item" href="/profile/subscription" >Subscription</a>
                    
                    @endif
                    <a class="list-group-item" href="/profile/security">Security</a>
                </ul>

        <hr>

        <div class="footer">

        @if ($user->employee_id != null)
                    <a class="btn btn-primary btn-block" href="/staff/{{ $user->employee_id }}"> How Employers see me </a>
        @endif
        </div>

        </div>
        </div>


        </div>


        <div class="col-md-9">
        
        <h4>Availability</h4>

            <div class="card">
                
                <div class="content">

                <div class="pull-left">
                    <h4 class="title">Set your availability for the next 30 days </h4>
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary" id="toggle">Check All</button>
                    <button class="btn btn-primary" id="untoggle">Uncheck All</button>
                </div>
                <div class="clearfix"></div>
                    <hr>
 
                    <table class="table table-striped">

                        <tr>
                            <th>Date</th>
                            <th class="text-center">Morning</th>
                            <th class="text-center">Day</th>
                            <th class="text-center">Night</th>
                        </tr>
<?php

 ?>
                        @for($i = $first['mday']; $i <= $daytarget; $i++)

                        <tr class="data-row">
                            <input type="hidden" name="date" id="date" value="{{ $first['year'] }}-{{ $first['mon'] }}-{{ $i }}">
                            
                            <?php $thisdate = strtotime($first['year'].'-'.$first['mon'].'-'.$i);   ?>

                            <td>{{ date('d F Y (l)', $thisdate) }} </td>

                            <?php $key = array_search($first['year'].'-'.$first['mon'].'-'.$i, array_column($availability, 'date')); ?>
                            @if($key !== false)
                                
                                @if($availability[$key]['morning'] == false)
                                <td class="text-center">
                                    <input type="checkbox" name="morning" id="morning">
                                </td>
                                @else
                                <td class="text-center">
                                    <input type="checkbox" name="morning" id="morning" checked="checked">
                                </td>
                                @endif

                                @if($availability[$key]['day'] == false)
                                <td class="text-center">
                                    <input type="checkbox" name="day" id="day">
                                </td>
                                @else
                                <td class="text-center">
                                    <input type="checkbox" name="day" id="day" checked="checked">
                                </td>
                                @endif

                                @if($availability[$key]['night'] == false)
                                <td class="text-center">
                                    <input type="checkbox" name="night" id="night">
                                </td>
                                @else
                                <td class="text-center">
                                    <input type="checkbox" name="night" id="night" checked="checked">
                                </td>
                                @endif
                        </tr>

                        @endif
                        @if($key == false && $key !== 0)

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

                        @endif
                        @endfor   


                        @if($first['mon'] != $last['mon'])
                        @for($i = 1; $i <= $last['mday']-1; $i++)

                        <tr class="data-row">
                            <input type="hidden" id="date" name="date" value="{{ $last['year'] }}-{{ $last['mon'] }}-{{ $i }}" >

                            <?php $thisdate = strtotime($last['year'].'-'.$last['mon'].'-'.$i); ?>

                            <td>{{ date('d F Y (l)', $thisdate) }} </td>

                            <?php $key = array_search($last['year'].'-'.$last['mon'].'-'.$i, array_column($availability, 'date')); ?>
                                @if($key !== false)

                                @if($availability[$key]['morning'] == false)
                                <td class="text-center">
                                    <input type="checkbox" name="morning" id="morning">
                                </td>
                                @else
                                <td class="text-center">
                                    <input type="checkbox" name="morning" id="morning" checked="checked">
                                </td>
                                @endif

                                @if($availability[$key]['day'] == false)
                                <td class="text-center">
                                    <input type="checkbox" name="day" id="day">
                                </td>
                                @else
                                <td class="text-center">
                                    <input type="checkbox" name="day" id="day" checked="checked">
                                </td>
                                @endif

                                @if($availability[$key]['night'] == false)
                                <td class="text-center">
                                    <input type="checkbox" name="night" id="night">
                                </td>
                                @else
                                <td class="text-center">
                                    <input type="checkbox" name="night" id="night" checked="checked">
                                </td>
                                @endif
                                

                        </tr>

                            @endif
                            @if( $key == false && $key !== 0 )

                                <td class="text-center">
                                    <input type="checkbox" name="morning" id="morning">
                                </td>


                                <td class="text-center">
                                    <input type="checkbox" name="day" id="day">

                                <td class="text-center">
                                    <input type="checkbox" name="night" id="night">
                                </td>
                        </tr>
                            @endif
                        
                        @endfor
                        @endif

                    </table>

                    <div class="text-center">
                        <button type="submit" id="submit" class="btn btn-success btn-fill">Save</button> 
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

                dataavl = {
                    "avl": availability
                    };

                console.log(JSON.stringify(dataavl));

               $.ajax({
                    url: "/avl",
                    type: "post",
                    data: JSON.stringify(dataavl),
                    processData: false,
                    dataType: "json",
                    contentType: "application/json",
                    success:function(data) {
                        location.reload();
                    } 
                }).error(function(response){
                    console.log("Error: " + response.data)
                    alert('Could not save');
                });

                 console.log(availability);

            });


            $("#toggle").on('click', function() {

                $("input[type='checkbox']").prop("checked", true);

            });

            $("#untoggle").on('click', function() {

                $("input[type='checkbox']").prop("checked", false);
            
            });

            </script>

            </div>
            </div>
        @endsection           

