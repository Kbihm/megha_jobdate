 
 @extends('layouts.app')
@section('content')

    <div class="col-md-12">

            <table class="table table-striped table-hover">

                <tr> 
                    <th>Establishment</th>
                    <th>Employee</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Approved?</th>

                </tr>

                @foreach($comments as $comment)
                <tr> 
                    <td>{{ $comment->employer->establishment_name }}</td>
                    <td>{{ $comment->employee->user->first_name }} {{ $comment->employee->user->last_name }}</td>
                    <td>{{ $comment->rating }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>@if ($comment->approved == 0) No @else Yes @endif</td>
                </tr>
                @endforeach

            </table>    

    </div>

@endsection           

