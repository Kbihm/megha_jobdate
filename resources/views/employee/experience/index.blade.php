 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

           <a href="{{ URL::to('experience/create') }} " class ="btn btn-success"> New Experience </a>            

            <h2> My Experience </h2>
            <hr>

            @foreach($experiences as $experience)

                <div class="panel panel-primary">    
                    <div class="panel-heading">
                        {{ $experience->title }} at {{ $experience->establishment_name }}
                    </div>
 
                    <div  class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Employment Length: $experience->employment_length</h4>
                            </div>
                        </div>

                        <hr>
                        <h4>Description </h4>
                        {{ $experience->description }}
                        <br>
                        <hr>
                        <a href="/experience/{{ $experience->id }}/edit" class="btn btn-primary">Edit </a>

                    </div>
                </div>
                
            @endforeach 
            
    </div>

@endsection           

