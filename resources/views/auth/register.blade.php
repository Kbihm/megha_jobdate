@extends('layouts.app')

@section('content')
 
<div class="container">

        <div class="col-md-6 text-center">
            <h4>Employees </h4>
            <p>Job Date allows you to set your availability to work when you're available. </p>
            <ul style="list-style-type:none;">
                <li>Get Job Offers</li>
                <li>List your skills &amp; Experience </li>
                <li>Completely Free </li>
            </ul>

            <a href="/register/employee" class="btn btn-lg btn-primary">Register as an Employee </a>

        </div>

        <div class="col-md-6 text-center">
           
            <h4>Employers </h4>
            <p>Job Date allows you to find people for when you need them. </p>
            <ul style="list-style-type:none;">
                <li>Send Job Offers</li>
                <li>See candidate reviews and past experience.</li>
                <li>Pay Monthly or Anually </li>
            </ul>

            <a href="/register/employer" class="btn btn-lg btn-primary">Register as an Employer </a>

        </div>

</div>
@endsection
