 @extends('layouts.app')
@section('content')

        
        <div class="col-md-8 col-md-offset-2">

            @foreach ($news as $new)
            
                <div class="panel panel-heading">
                    {{ $new->title}}
                </div>

                <div  class="panel panel-body">  
                <a href="{{ URL::to('admin/news/' . $new->id) }}">
                    Title: {{$new->title}}
                    <br>
                    Message: {{ $new->message}}
                </a>
                    <div class="col-md-2 pull-right">
                        <a href="{{ URL::to('admin/news/' . $new->id) }}" class="btn btn-success"> Edit </a>
                    </div>
                </div>
            
            @endforeach


        <a href="{{ URL::to('admin/news/create') }} " class ="btn btn-success"> Create News </a>
    </div>

@endsection