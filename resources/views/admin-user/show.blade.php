 @extends('layouts.app')
@section('content')

    <a href="/admin/user"> Back to all </a>
    <hr>

    <table class="table table-striped table-hover">

    <tr>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Email </th>
        <th>Account Type</th>
    </tr>

    <tr>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->email }} </td>
        <td>
            @if ($user->employer_id != null)
                Employer
            @elseif ($user->employee_id != null)
                Employee
            @elseif($user->admin_id != null)
                Admin
            @else
                Error.
            @endif
        </td>
    </tr>

    </table>


    @if ($user->employer_id != null)
        {{ $user->employer }}
    @elseif ($user->employee_id != null)
        {{ $user->employee }}
        <hr>
        <a href="/staff/{{ $user->id }}" class="btn btn-primary">View Employee Profile</a>
    @elseif($user->admin_id != null)
        {{ $user->admin }}
    @else
        Error.
    @endif


@endsection           

