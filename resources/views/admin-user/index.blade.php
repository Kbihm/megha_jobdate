 @extends('layouts.app')
@section('content')

    
    <table class="table table-striped table-hover">

    <tr>
        <th>UID</th>
        <th>Name </th>
        <th>Email </th>
        <th>Type </th>
    </tr>


    @foreach ($users as $user)
    <tr>
        <td> {{ $user->id }}</td>
        <td><a href="/admin/user/{{ $user->id }}"> {{ $user->first_name }} {{ $user->last_name }}</a></td>
        <td>{{ $user->email }} </td>
        <td>
            @if ($user->employer_id != null)
                Employer
            @elseif ($user->employee_id != null)
                <a href="/staff/{{ $user->id }}" target="_blank">Employee</a>
            @elseif($user->admin_id != null)
                Admin
            @else
                Error.
            @endif
        </td>
    </tr>
    @endforeach

    </table>


@endsection           

