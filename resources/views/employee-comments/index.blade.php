 
 @extends('layouts.app')
 
@section('content')
@if(isset($dispute_submitted))
<div class="alert alert-warning col-md-12"><strong>Your dispute has been successfully submitted.</div>
@endif
    <div class="col-md-8 col-md-offset-2">

            <h2 class="">Reviews about you</h2>
            <p class="text-muted">Here's what people are saying about you. </p>
            <hr>

            <div class="card">
                <div class="content">

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
                                    
                                    <a type="button" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#myModal">Dispute </a>


                                    @if (Auth::user()->admin_id != null || Auth::user()->employer_id ==  $comment->employer_id)
                                        <form class="form-horizontal" role="form" method="POST" action="/admin/comments/{{ $comment->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type-"submit" class="btn btn-danger btn-xs"> Delete </button>
                                        </form>
                                    @endif
                                </blockquote>                             
                                
                                <br>
                                    
    
                        @endif
                    @endforeach
                    @else
                     Looks like there aren't any reviews for you just yet.
                    @endif
                </div>
            </div>

    </div>

                    @if(Auth::User()->employee_id != null)
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Dispute a Review</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger"> </p>
                                <hr>
                                    <form action="/email/dispute/{{Auth::user()->id}}/{{$comment->id}}" method="GET" role="form">
                                        {{ csrf_field() }}
                                        <label class="form-label" for="dispute"> Tell us why you're unhappy with this comment: </label>
                                        <input class="form-control" type="text" id="dispute" name="dispute">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit Dispute</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endif
@endsection           

