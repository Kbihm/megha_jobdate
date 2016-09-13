 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

           <a href="{{ URL::to('skills/create') }} " class ="btn btn-success"> New Skill </a>            

            <h2> My Skills </h2>
            <hr>

            @foreach($skills as $skill)

                <div class="panel panel-primary">    
                    <div class="panel-heading">
                        {{ $skill->skill }}
                        <div class="pull-right">
                        <a href="/skills/{{ $skill->id }}/delete" class="btn btn-primary"> Delete </a>
                        </div>
                    </div>
                </div>
                
            @endforeach 
            
    </div>

@endsection           

