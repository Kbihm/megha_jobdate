 
 @extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Reviews you've left for JobDate Staff.</h3>
                </div>
                <div class="panel-body">
                    @if (sizeof($comments) > 0)
                    @foreach($comments as $comment)
                        @if ($comment-> approved != 0)
                                <blockquote>
                                    <div class="pull-right">
                                    @if ($comment->rating == 1)
                                        <span class="label label-danger">Negative</span>
                                    @elseif ($comment->rating == 2)
                                        <span class="label label-default">Neutral</span>
                                    @elseif ($comment->rating == 3)
                                        <span class="label label-success">Positive</span>
                                    @endif
                                    </div>
                                    <p>{{$comment->comment}}<p>
                                    <small>{{ $comment->employer->user->first_name }} at {{ $comment->employer->establishment_name }} </small>

                                    @if (Auth::user()->admin_id != null || Auth::user()->employer_id ==  $comment->employer_id)
                                        <form class="form-horizontal" role="form" method="POST" action="/reviews/{{ $comment->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type-"submit" class="btn btn-danger btn-xs"> Delete </button>
                                        </form>
                                    @endif
                                </blockquote>                             
                                    
                                    
    
                        @endif
                    @endforeach
                    @else
                     Looks like you haven't left any reviews just yet.
                    @endif
                </div>
            </div>

    </div>

@endsection           

