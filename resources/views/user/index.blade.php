 @extends('layouts.app')
@section('content')



    <div class="col-md-3">

        <div class="card card-refine">


        <div class="header">
            <h4 class="title">Refine
                <button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" title="" data-original-title="Reset Filter">
                    <i class="fa fa-refresh"></i>
                </button>
            </h4>
        </div>

        <div class="content">

                        <div class="panel-group" id="accordion">
                            <form class="form" role="form" method="POST" action="/search">
                                                    {{ csrf_field() }} 
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a data-toggle="collapse" href="#refinePrice" aria-expanded="true" class="collapsed">
                                          Area
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="refinePrice" class="panel-collapse collapse in">
                                      <div class="panel-body">
                                         
                                                     <div class="form-group">
                                                        <label>State</label>
                                                        <select id="state" class="form-control" name="state" value="">
                                                            <option value="tba">Coming Soon.</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Region</label>
                                                        <select id="region" class="form-control" name="region" value="">
                                                            <option value="tba">Coming Soon.</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Area</label>
                                                        <select id="area" class="form-control" name="area" value="">
                                                            <option value="tba">Coming Soon.</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Suburb</label>
                                                        <select id="suburb" class="form-control" name="suburb" value="">
                                                            <option value="tba">Coming Soon.</option>
                                                        </select>
                                                    </div>
                                         
                                         </div>
                                    </div>
                                  </div>

                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a data-toggle="collapse" href="#refineClothing" aria-expanded="true" class="collapsed">
                                          Availability
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="refineClothing" class="panel-collapse collapse in">
                                      <div class="panel-body">
                                                                        
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input name="date" type="text" id="datepicker" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Time of Day</label>
                                                <select name="time" class="form-control">
                                                    <option value="">Any</option>
                                                    <option value="morning">Morning</option>
                                                    <option value="day">Day</option>
                                                    <option value="night">Night</option>
                                                </select>
                                            </div>

                                      </div>
                                    </div>
                                  </div>


                                   <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a data-toggle="collapse" href="#refineDesigner" aria-expanded="true">
                                          About
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="refineDesigner" class="panel-collapse collapse in">
                                      <div class="panel-body">
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
                                                <select name="fulltime" id="fulltime" class="form-control">
                                                    <option value="">Any</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                <button class="btn btn-default btn-xs btn pull-right btn-simple" type="submit">
                    <i class="fa fa-refresh"></i>
                </button>
                                      </div>
                                    </div>
                                  </div><!-- end panel -->

                                                </form>

                                </div>

        </div>
        </div>

    </div>


    <div class="col-md-9">
        
                    @foreach($users as $user)
                        @if($user->employee_id != null)



                        <div class="card card-horizontal">
                            <div class="row">
                                @if (Storage::disk('local')->has($user->employee->id . '.jpg'))
                                <div class="col-md-5">
                                
                                
                                    <div class="image" style="background-image: url({{route('image', ['filename' => $user->employee->id.'.jpg'])}}); background-position: center center; background-size: cover;">
                                        <img src="{{route('image', ['filename' => $user->employee->id.'.jpg'])}}" alt="..." style="display: none;">
                                        <div class="filter filter-azure">
                                            <a type="button" class="btn btn-neutral btn-round" href="/staff/{{ $user->employee->id }}">
                                                <i class="fa fa-heart"></i> Hire
                                            </a>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="col-md-7">
                                @else
                                <div class="col-md-12" style="margin-left:20px">
                                @endif


                                     <div class="content">

                                        @if( $user->average_rating > 2.5)
                                       <p class="category text-info">
                                            <i class="fa fa-trophy"></i> Best of JobDate
                                        </p>
                                        @else
                                            <p> &nbsp; </p>
                                        @endif

                                        <a class="card-link" href="#">
                                            <h4 class="title">{{$user->first_name}} {{$user->last_name}} </h4>
                                        </a>
                                        <a class="card-link" href="#">
                                            <p class="description">{{ str_limit($user->employee->about, $limit = 200, $end = '...') }}</p>
                                        </a>
                                         <div class="footer">
                                            <div class="stats">
                                                <a class="card-link" href="#">
                                                   <i class="fa fa-usd"></i> {{ number_format($user->employee->hourly_rate, 2) }}
                                                </a>
                                            </div>
                                            <div class="stats">
                                              <a class="card-link" href="#">
                                                <i class="fa fa-briefcase"></i> {{ $user->employee->role }} 
                                              </a>
                                            </div>
                                            <div class="stats">
                                               <a class="card-link" href="#">
                                                <i class="fa fa-star"></i> {{ sizeOf($user->employee->comments) }} Reviews
                                               </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif
                    @endforeach


</div>

@endsection           

