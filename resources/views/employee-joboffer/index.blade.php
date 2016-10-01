@extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

            <h2> Job Listings </h2>
            <p class="text-muted"> Note: Currently Shows All rather than only the employees </p>
            <hr>

            @foreach($joboffers as $joboffer)

                <div class="panel panel-primary">    
                    <div class="panel-heading">
                        {{ $joboffer->role }} at {{ $joboffer->employer['establishment_name'] }}
                    </div>
 
                    <div  class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Time: {{ $joboffer->time }}</h4>
                                <h4>Role: {{ $joboffer->role }}</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>Date: {{ $joboffer->date }}</h4>
                                <h4>Hours: {{ $joboffer->hours }}</h4>
                            </div>
                        </div>

                        <hr>
                        <h4>Description </h4>
                        {{ $joboffer->description }}
                        <br>
                        <hr>
                          @if (Auth::user()->employer_id != null)
                        <a href="/offers/{{ $joboffer->id }}/edit" class="btn btn-primary">Edit </a>
                          @elseif (Auth::user()->employee_id != null)
                            <a href="/offers/{{ $joboffer->id }}" class="btn btn-primary"> Reply to offer </a>
                          @endif
                    </div>
                </div>
                
            @endforeach 
            
    </div>

@endsection           

