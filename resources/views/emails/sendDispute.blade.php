@extends('layouts.email')

@section('content')

{{ $user->email }} has filed a dispute about the comment with the text: {{ $comment->description }}
 <a href="dev.jobdate.com.au/staff/{{$user->employee->id}}"> Click here to view profile. </a>
                
@endsection
