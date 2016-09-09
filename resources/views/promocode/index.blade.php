 
 @extends('layouts.app')
@section('content')

    <div class="col-md-12">

            <a href="{{ URL::to('admin/promocode/create') }} " class ="btn btn-success"> Create Promocode </a>
            <hr>

            <table class="table table-striped table-hover">

                <tr> 
                    <th>Code</th>
                    <th>Days Free</th>
                    <th>Expiry</th>
                    <th>Uses</th>
                    <th>Used</th>
                    <th>&nbsp;</th>
                </tr>

            @foreach ($promocodes as $promocode)

            <tr> 
                <td>{{ $promocode->code }}</td>
                <td>{{ $promocode->days }}</td>
                <td>{{ $promocode->expiry }}</td>
                <td>{{ $promocode->number_of_uses }}</td>
                <td>{{ $promocode->number_of_times_used }}</td>
                <td><a href="/admin/promocode/{{ $promocode->id }}/edit"> Edit </a></td>
            </tr>
                
            @endforeach

            </table>
        
            {{ $promocodes->links() }}
    </div>

@endsection           

