 @extends('layouts.app')
@section('content')

 
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create News</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="/admin/news">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message:</label>

                            <div class="col-md-6">
                                <input id="message" type="textarea" class="form-control" name="message" value="{{ old('message') }}">

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-news"></i> Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection