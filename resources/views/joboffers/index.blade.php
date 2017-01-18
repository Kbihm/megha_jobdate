@extends('layouts.app')

@section('title')
    Job listings
@endsection

@section('content')

    <div class="col-md-8 col-md-offset-2">

   

        <div class="row">

            <div class="col-md-6">
            @if(! Request::is('jobs-archived'))
            <h2 style="margin-top:0;"> Job Listings </h2>
            @else
            <h2 style="margin-top:0;"> Archived Job Listings </h2>
            @endif
            
            </div>
            <div class="col-md-6 pull-right text-right">
            @if(! Request::is('jobs-archived'))
            <a href="{{ URL::to('archived') }} " class="btn btn-primary"> Accepted Jobs </a>    
            &nbsp;
            @endif
            <a href="{{ URL::to('jobs/create') }} " class="btn btn-success "> New Job Listing </a>            
            </div>
        </div>

        
         @if(isset($joboffers))
            @foreach($joboffers as $joboffer)
    
                <div class="card">    
                    <div class="content"> 
                        <h4 class="title"> {{ $joboffer->role }} at {{ $joboffer->employer->establishment_name }} </h4>
 
                    <div class="row">
                        <div class="col-md-3"> <i class="fa fa-clock-o"></i> {{ $joboffer->time }}</div>
                        <div class="col-md-3"> <i class="fa fa-briefcase"></i> {{ $joboffer->role }}</div>
                        <div class="col-md-3"> <i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($joboffer->date)) }}</div>
                        <div class="col-md-3"> <i class="fa fa-calendar-times-o"></i> {{ $joboffer->hours }} hours</div>
                    </div>

                        <hr>
                        <h4>Description </h4>
                        {{ $joboffer->description }}
                        <br>

                        <hr>
                          @if (Auth::user()->employer_id != null && $joboffer->status != "accepted")
                        <a href="/jobs/{{ $joboffer->id }}/edit" class="btn btn-primary">Edit </a>
                            <form class="col-md-2"  role="form" method="POST" action="/jobs/{{ $joboffer->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type-"submit" class="pull-right btn btn-danger "> Delete </button>
                            </form>

                          @elseif (Auth::user()->employee_id != null && $joboffer->status != "accepted")
                            <a href="/jobs/{{ $joboffer->id }}" class="btn btn-primary"> Reply to offer </a>
                          @endif
                          @if ($joboffer->status == "accepted")
                            <button class="btn btn-success right"> Accepted </button>
                          @endif
                    </div>
                </div>
                
            @endforeach 
        @endif
    </div>

@endsection           
