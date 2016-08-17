 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

            @foreach ($promocodes as $promocode)
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                       {{ $promocode->code }}
                    </div>
                    <div class="panel panel-body">
                        {{ $promocode->discount }}
                    </div>
                </div>
            @endforeach




    </div>

@endsection           

