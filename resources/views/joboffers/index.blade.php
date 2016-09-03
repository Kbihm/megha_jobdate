 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

           <a href="{{ URL::to('offers/create') }} " class ="btn btn-success"> New JobOffer </a>            

            <h2> My Job Offers </h2>
            <hr>

            @foreach ($joboffers as $joboffer)

                <div class="panel panel-success">    
                    <div class="panel-heading">

                    </div>

                    <div  class="panel-body">  
                    

                    </div>
                </div>
                
            @endforeach
            
    </div>

@endsection           

