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

        <div class="row">
        
        <div class="col-md-6">
        <h4>Employer Info </h4>
        <table class="table">
            <tr>
                <th>User ID</th>
                <td>{{ $user->employer->user_id }}</td>
            </tr>
            <tr>
                <th>Account Created At</th>
                <td>{{ $user->employer->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $user->employer->updated_at }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $user->employer->phone }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $user->employer->address }}</td>
            </tr>
            <tr>
                <th>ABN</th>
                <td>{{ $user->employer->abn }}</td>
            </tr>
            <tr>
                <th>Establishment Name</th>
                <td>{{ $user->employer->establishment_name }}</td>
            </tr>
            <tr>
                <th>Email Confirmed</th>
                <td>{{ $user->employer->email_confirmed }}</td>
            </tr>
            <tr>
                <th>Stripe ID</th>
                <td>{{ $user->employer->stripe_id }}</td>
            </tr>
            <tr>
                <th>Card Brand</th>
                <td>{{ $user->employer->card_brand }}</td>
            </tr>
            <tr>
                <th>Card Last Four</th>
                <td>{{ $user->employer->card_last_four }}</td>
            </tr>
            <tr>
                <th>Trial Ends At</th>
                <td>{{ $user->employer->trial_ends_at }}</td>
            </tr>
        </table>
        </div>
        </div>
    @elseif ($user->employee_id != null)
        <div class="row">
        
        <div class="col-md-6">
        <h4>Employee Info </h4>
        <table class="table">
            <tr>
                <th>User ID</th>
                <td>{{ $user->employee->user_id }}</td>
            </tr>
            <tr>
                <th>Account Created At</th>
                <td>{{ $user->employee->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $user->employee->updated_at }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $user->employee->phone }}</td>
            </tr>
            <tr>
                <th>Average Rating</th>
                <td>{{ $user->employee->average_rating }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->employee->role }}</td>
            </tr>
            <tr>
                <th>About</th>
                <td>{{ $user->employee->about }}</td>
            </tr>
            <tr>
                <th>Gender (0 = M, 1 = F)</th>
                <td>{{ $user->employee->gender }}</td>
            </tr>
            <tr>
                <th>Looking Fulltime</th>
                <td>{{ $user->employee->fulltime }}</td>
            </tr>
            <tr>
                <th>Hourly Rate</th>
                <td>${{ $user->employee->hourly_rate }}</td>
            </tr>

        </table>
        </div>
        </div>
        <hr>
        <a href="/staff/{{ $user->id }}" class="btn btn-primary">View Employee Profile</a>
    @elseif($user->admin_id != null)
        {{ $user->admin }}
    @else
        Error.
    @endif


@endsection           

