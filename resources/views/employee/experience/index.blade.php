 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

           <a href="{{ URL::to('experience/create') }} " class ="btn btn-success"> New Experience </a>            

            <h2> My Experience </h2>
            <hr>

            @foreach($experiences as $experience)
                <div class="panel panel-primary">    
                    <div class="panel-heading">
                     <h4 style="color:white;">   Job at <strong> {{ $experience->establishment_name }} </strong> </h4>

                    </div>
 
                    <div  class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                Role: <h4>{{ $experience->title }}</h4>
                            </div>
                            <div class="col-md-6">
                                Employment Length: <h4>{{ $experience->employment_length }}</h4>
                            </div>
                        </div>

                        <hr>
                        <h4>Description: </h4>
                        {{ $experience->description }}
        
                        <br>
                        <hr>
                        
                        <div class="pull-right">
                            <form class="form-horizontal" role="form" method="POST" action="/experience/{{ $experience->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type-"submit" class="btn btn-danger"> Delete </button>
                                </form>
                         </div>

                    </div>
                </div>                
            @endforeach 
            
    </div>

@endsection           
