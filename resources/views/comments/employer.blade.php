 
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
                    <th> &nbsp; </th>
                </tr>

                @foreach($comments as $comment)
                <tr> 
                    <td>{{ $comment->employer->establishment_name }}</td>
                    <td>{{ $comment->employee->user->first_name }} {{ $comment->employee->user->last_name }}</td>
                    <td>{{ $comment->rating }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>@if ($comment->approved == 0) No @else Yes @endif</td>
                    <td><a href="/admin/comments/{{ $comment->id }}/edit"> Edit </a></td>
                </tr>
                @endforeach

            </table>    
        
            {{ $comments->links() }}

    </div>

@endsection           

