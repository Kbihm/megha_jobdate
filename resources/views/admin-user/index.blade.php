 @extends('layouts.app')
@section('content')

    
        <form class="form-horizontal" role="form" method="POST" action="/admin/user/search">
                        {{ csrf_field() }}
                        <div class="input-group">

                        <input type="text" class="form-control" name="search" placeholder="Search via email"
                        @if (isset($_POST['search']))
                          value="{{ $_POST['search'] }}"
                        >
                        @endif
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-fill" type="submit">Search</button>
                        </span>
                        </div>
        </form>

        <hr>

    <table class="table table-striped table-hover">

    <tr>
        <th>UID</th>
        <th>Name </th>
        <th>Email </th>
        <th>Type </th>
        <th>Created At </th>
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
        <td> {{ date('F d, Y', strtotime($user->created_at)) }} </td>
    </tr>
    @endforeach
    </table>

        {{ $users->links() }}


@endsection           

