 
 @extends('layouts.app')

@section('title')
New Skill
@endsection

@section('content')

    <div class="col-md-8 col-md-offset-2">

           <a href="{{ URL::to('skills/create') }} " class ="btn btn-success"> New Skill </a>            

            <h2> My Skills </h2>
            <hr>
            <ul class="list-group">
            @foreach($skills as $skill)

                        <li class="list-group-item" style="height:60px;">
                        <strong> {{ $skill->skill }} </strong>
                         <div class="pull-right">
                            <form class="form-horizontal" role="form" method="POST" action="/skills/{{ $skill->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type-"submit" class="btn btn-danger"> Delete </button>
                                </form>
                         </div>

                        </li>

                
            @endforeach 
            </ul>
    </div>

@endsection           

