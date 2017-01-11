@extends('layouts.email')

@section('content')
<p>
Congratulations {{$user->first_name}}, welcome to Jobdate, your new era of employment opportunities where you pick your roster and hours that work for you, your nearly there just follow the link below to verify your account and complete your profile to be potentially matched to thousands of jobs working around your schedule. <br><br>
We strongly advise that you fully complete your profile, including a profile picture to maximise your chances for gaining employment, the more an employee can see the more likely they are to select you.
Jobdate, it’s as simple as that!<br><br>
<a href="app.jobdate.com.au/verify/{{$verification->hash}}"> Click here to verify your account </a><br><br>
If this email was sent to you and you are not the intended recipient please ignore this email and we apologise for any inconvenience.<br><br>
If the link above does not work, paste this link into your browser's URL bar: app.jobdate.com.au/verify/{{$verification->hash}}
 </p> 
@endsection