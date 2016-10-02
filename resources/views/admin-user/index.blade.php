 @extends('layouts.app')
@section('content')

    
    <table class="table table-striped table-hover">

    <tr>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Email </th>
        <th>Type </th>
    </tr>


    @foreach ($users as $user)
    <tr>
        <td><a href="/admin/user/{{ $user->id }}"> {{ $user->first_name }}</a></td>
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
    @endforeach

    </table>


@endsection           

