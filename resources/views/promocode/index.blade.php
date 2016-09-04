 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

            <a href="{{ URL::to('admin/promocode/create') }} " class ="btn btn-success"> Create Promocode </a>
            <hr>

            @foreach ($promocodes as $promocode)

                <div class="panel panel-success">    
                    <div class="panel-heading">
                       {{ $promocode->code }}
                    </div>

                    <div  class="panel-body">  
                    <a href="{{ URL::to('admin/promocode/' . $promocode->id) }}">
                        <br>
                        Days free: {{ $promocode->days }}
                        <br>
                        Expiry: {{ $promocode->expiry}}
                        <br>
                        Number of Uses: {{ $promocode->number_of_uses}}
                    </a>
                        <div class="col-md-2 pull-right">
                            <a href="{{ URL::to('admin/promocode/' . $promocode->id) }}" class="btn btn-success"> Edit </a>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
    </div>

@endsection           

