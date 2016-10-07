 @extends('layouts.app')
@section('content')

<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Leave A Comment for {{$user->user->first_name}} {{$user->user->last_name}} </div>
                <div class="panel-body">

                <div class="text-center"> 
                <form class="form-horizontal" role="form" method="POST" action="/reviews/">
                        {{ csrf_field() }}

                <div class="form-group {{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="rating" class="col-sm-4 control-label pull-left">Review:</label>
                            <div class="btn-group col-sm-8" data-toggle="buttons">
                            <label class="btn btn-danger col-sm-3">
                                <input name="rating" for="rating" type="checkbox" autocomplete="off" value="1">Negative
                            </label>
                            <label class="btn btn-warning col-sm-3">
                                <input name="rating" for="rating" type="checkbox" autocomplete="off" value="2">Neutral
                    </button>
                            </label>
                            <label class="btn btn-success col-sm-3">
                                <input name="rating" for="rating" type="checkbox" autocomplete="off" value="3">Positive
                            </label>

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
                    <input type="hidden" name="employee_id" value="{{$user->id}}">
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