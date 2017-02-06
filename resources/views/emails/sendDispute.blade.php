@extends('layouts.email')

@section('content')

There has been a dispute filed, here are the details. <br/>

This was disputed by <br/>

Name: <a href="https://app.jobdate.com.au/admin/user/{{$user->id}}">{{ $user->first_name }} {{ $user->last_name }} (click to view profile, need to be logged in as admin.)</a> <br/>
<br/>
Email: {{ $user->email }} (click to email)
<br/><br/>
Reason: {{ $dispute }} 
<br/>
Comment: {{ $comment->comment }}  <br/>
Comment Rating: 
        @if ($comment->rating == 0)
            Negative
        @elseif ($comment->rating == 1)
            Neutral
        @elseif ($comment->rating == 2)
            Positive
        @endif
<br/>
Date: {{ $comment->created_at }} 
                
@endsection
