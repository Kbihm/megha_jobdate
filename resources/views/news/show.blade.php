 @extends('layouts.app')
@section('content')


<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit News {{$new->id}}</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="/admin/news/{{ $new->id }}">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $new->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Number of Uses:</label>

                            <div class="col-md-6">
                                <input id="message" type="textarea" class="form-control" name="message" value="{{ $new->message }}">

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                        

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-news"></i>Update
                                </button>
                            </form>
                                <form class="form-horizontal" role="form" method="POST" action="/admin/news/{{ $new->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type-"submit" class="btn btn-danger"> Delete </button>
                                </form>
                            </div>
                        </div>


                    
                </div>
 


        </div>
    </div>
</div>

@endsection