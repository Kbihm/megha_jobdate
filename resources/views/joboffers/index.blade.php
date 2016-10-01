  @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

         @if (Auth::user()->employer_id != null)
           <a href="{{ URL::to('jobs/create') }} " class ="btn btn-success"> New Job Offer </a>            
         @endif
            <h2> Job Listings </h2>
            <hr>
         @if(isset($joboffers))
            @foreach($joboffers as $joboffer)

                <div class="panel panel-primary">    
                    <div class="panel-heading"> 
                        {{ $joboffer->role }} at {{ Auth::user()->employer->establishment_name }}
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
                        <a href="/jobs/{{ $joboffer->id }}/edit" class="btn btn-primary">Edit </a>
                          @elseif (Auth::user()->employee_id != null)
                            <a href="/jobs/{{ $joboffer->id }}" class="btn btn-primary"> Reply to offer </a>
                          @endif
                    </div>
                </div>
                
            @endforeach 
        @endif
    </div>

@endsection           

