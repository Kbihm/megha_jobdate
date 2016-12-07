@extends('layouts.email')

@section('content')
<p>
{{$verification->hash}}
 </p>  
@endsection