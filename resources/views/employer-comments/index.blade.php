 
 @extends('layouts.app')

@section('title')
Reviews
@endsection

@section('content')

  <div class="col-md-8 col-md-offset-2">

        <h3 class="title"> Reviews you've got to leave for Jobdate Staff</h3>

            <hr>

            <div class="card">
                <div class="content">

        @if(sizeof($joboffers) > 0)
                    @foreach($joboffers as $joboffer)
                                <blockquote>    
                                   <div class="pull-right">
                                    <strong>{{ $joboffer->time }} - {{$joboffer->date}}</strong>
                                    </div>
                                    <p>{{ $joboffer->role}} at {{ $joboffer->employer->establishment_name }}<p>
                                   <a class="btn btn-primary btn-xs" href="/reviews/create/{{$joboffer->employee_id}}"> Review </a>
                                </blockquote>                             
                    @endforeach
        @else
                    <h3> There doesn't seem to be any reviews for you to leave. </h3>
                    @endif

            </div>
            </div>
            </hr>
            </div>

    <div class="col-md-8 col-md-offset-2">

        <h3 class="title"> Reviews you've left for JobDate Staff</h3>

            <hr>

            <div class="card">
                <div class="content">
                    
                    

                    @if (sizeof($comments) > 0)
                    @foreach($comments as $comment)
                        
                                <blockquote>
                                    <div class="pull-right">
                                    @if ($comment-> approved == 0)
                                        <span class="label label-default">Pending Admin Approval</span>
                                    @endif
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
                                    
                    @endforeach
                    @else
                     Looks like you haven't left any reviews just yet.
                    @endif
                </div>
            </div>

            {{ $comments->links() }}

    </div>

@endsection           

