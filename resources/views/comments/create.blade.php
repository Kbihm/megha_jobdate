 @extends('layouts.app')
@section('content')

<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Leave A Comment for {NAME}</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/joboffers/create">
                        {{ csrf_field() }}

                <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                     <label for="rating" class="col-md-4 control-label">Review:</label>
                    <div class="pull-left">
                    <button type="button" value="1" for="rating" class="btn btn-danger" data-toggle="button" aria-pressed="false" autocomplete="off">
                    Negative
                    </button>
                    <button type="button" value="2" for="rating" class="btn btn-warning" data-toggle="button" aria-pressed="false" autocomplete="off">
                    Neutral
                    </button>
                    <button type="button" value="3" for="rating" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
                    Positive
                    </button>
                   </div>
                </div>
                <br>
                    
                        
                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <label for="comment" class="col-md-4 control-label">Comment:</label>

                    <div class="col-md-2">
                        <select class="form-control" name="comment" id="comment" style="width: 250px;">
                            <option value="Good">Good</option>
                            <option value="Didnt show up">Didnt show up</option>
                            <option value="more placeholders">more placeholders</option>
                            <option value="ah">ah</option>
                        </select> 
                        @if ($errors->has('comment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>   
                        <div class="form-group">
                            <div class="text-center" >
                                <button type="submit" class="btn btn-primary">
                                    Leave Review
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection