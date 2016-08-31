 
 @extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">



        </div>

        <div class="col-md-9">

            <h1> {{ $user->first_name }} {{ $user->last_name }} </h1>

            Email: {{$user->email}} <br/>


            <hr>

            @if (Auth::user()->admin_id != null)
                You're an admin, you don't have any custom attributes. 
            @elseif (Auth::user()->employee_id != null)

                Account Type: Employee <br/>
                Phone: {{ $user->employee->phone }} <br/>
                Gender: {{ $user->employee->gender }} <br/>
                About: {{ $user->employee->about }} <br/>
                Looking for Full Time Work: {{ $user->employee->fulltime }} <br/>
                Hourly Rate: {{ $user->employee->hourly_rate }} <br/>

            @elseif (Auth::user()->employer_id != null)

                Account Type: Employer <br/>
                Phone: {{ $user->employer->phone }} <br/>
                ABN: {{ $user->employer->abn }} <br/>
                Address: {{ $user->employer->address }} <br/>
                Establishment name: {{ $user->employer->establishment_name }} <br/>
                Date: {{ $user->employer->subscription_end }} <br/>

            @else
                No role set, Uh oh... 
            @endif
            

        </div>
    </div>

@endsection           

