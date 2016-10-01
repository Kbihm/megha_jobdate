 
 @extends('layouts.app')
@section('content')

    <div class="col-md-12">

            <a href="/admin/comments/approved" class="btn btn-primary"> Approved Comments </a>
            &nbsp;
            <a href="/admin/comments" class="btn btn-primary"> Not Approved Comments </a>

            <br/>
            <hr>

            <table class="table table-striped table-hover">

                <tr> 
                    <th>Establishment (Name)</th>
                    <th>Employee</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Approved</th>
                </tr>

                @foreach($comments as $comment)
                <tr> 
                    <td>{{ $comment->employer->establishment_name }}  ({{ $comment->employer->user->first_name }})</td>
                    <td><a href="/admin/user/{{ $comment->employee->user->id }}">{{ $comment->employee->user->first_name }} {{ $comment->employee->user->last_name }}</a></td>
                    <td>
                        @if($comment->rating == 1) <span class="text-danger">Negative</span>
                        @elseif($comment->rating == 2) <span class="text-muted">Neutral</span>
                        @elseif($comment->rating == 3) <span class="text-success">Positive</span>
                        @endif
                    </td>
                    <td>{{ $comment->comment }}</td>
                    <td>@if ($comment->approved == 0) No @else Yes @endif</td>
                </tr>
                @endforeach

            </table>    
        
            {{ $comments->links() }}

    </div>

@endsection           

