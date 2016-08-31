@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    @if (Auth::user()->admin_id != null)

                        Admin

                    @elseif (Auth::user()->employee_id != null)

                        Employee

                    @elseif (Auth::user()->employer_id != null)

                        Employer

                    @else
                        
                        No role set.

                    @endif

                    Account Type

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
