 
 @extends('layouts.app')
@section('content')

    <div class="col-md-12">
            <hr>

            <table class="table table-striped table-hover">

                <tr> 
                    <th>Date of Job</th>
                    <th>Time of Job</th>
                    <th>Employee Invited</th>
                    <th>Status</th>
                </tr>

            @foreach ($invites as $invite)

            <tr> 
                <td>{{ $invite->joboffer->date }}</td>
                <td>{{ $invite->joboffer->time }}</td>
                <td>{{ $invite->employee->id }}</td>
                <td> Status to be added </td>
                <td><a href="/invite/{{ $promocode->id }}/delete"> Delete </a></td>
            </tr>
                
            @endforeach

            </table>
        

    </div>

@endsection           

