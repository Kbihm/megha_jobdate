@extends('layouts.app')

@section('title')
Job Listings
@endsection

@section('content')

    <div class="col-md-7 ">


            <h2> Job Listings </h2>
            <a href="/archivedE" class="btn btn-success pull-right">Accepted Jobs</a>
            <p class="text-muted"> These are the Jobs you've been invited to.</p>
            <hr>

            @foreach($joboffers as $joboffer)

                <div class="card">    
                    <div class="content">

                        <h4 class="title"> {{ $joboffer->role }} at {{ $joboffer->employer['establishment_name'] }} @if(isset($joboffer->status)) {{$joboffer->status}} @endif </h4>
                        
                        <div class="row">
                            <div class="col-md-3"> <i class="fa fa-clock-o"></i> {{ $joboffer->time }}</div>
                            <div class="col-md-3"> <i class="fa fa-briefcase"></i> {{ $joboffer->role }}</div>
                            <div class="col-md-3"> <i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($joboffer->date)) }}</div>
                            <div class="col-md-3"> <i class="fa fa-calendar-times-o"></i> {{ $joboffer->hours }} hours</div>
                        </div>

                        <h4>Description </h4>
                        <p class="description">{{ $joboffer->description }} </p>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                          @if (Auth::user()->employer_id != null)
                                <a href="/offers/{{ $joboffer->id }}/edit" class="btn btn-primary">Edit </a>
                          @elseif (Auth::user()->employee_id != null && $joboffer->status != 'accepted')
                          <form action="/offers/{{$joboffer->id}}" method="POST" class="form-horizontal" role="form">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger btn-fill col-md-3 pull-left"> Decline Offer </button>

                            </form>
                            &nbsp;
                            <a href="/offers/acceptJobOffer/{{$joboffer->id}}" class="btn btn-success btn-fill col-md-3 pull-right"> Accept Offer </a>
  
                          @endif
                          @if($joboffer->status == "accepted")
                           <a class="btn btn-success"> Accepted </a>
                          @elseif($joboffer->status == "declined")
                           <a class="btn btn-danger"> Declined </a>
                          @endif
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach 
            
    </div>
    <div class="col-md-5">
                    <h2> Detail Requests </h2>
                <p class="text-muted"> Here are requests for details from employers: <p>
                <hr>
                @foreach($requests as $request)
                <div class="card">
                <div class="content">
                <div class="row col-md-12">
                     <h4 class="title">{{ $request->employer->user->first_name}} {{$request->employer->user->last_name}}  <br> From:&nbsp;{{ $request->employer->establishment_name}} </h4>
                </div>
                <div class="row col-md-12">
                <hr>
                </div>

                    <div class="row">

                    <div class="col-xs-6">
                     <a href="/invite/accept/{{$request->id}}" class="btn btn-success btn-fill"> Send Details </a>
                     </div>
                     <div class="col-xs-6 text-right">
                     <a href="/invite/decline/{{$request->id}}" class="btn btn-danger btn-fill"> Decline </a>
                    </div>
                    </div><br>
                </div>
                </div>
                @endforeach
                </div> 
            </div>
    </div>
@endsection           

