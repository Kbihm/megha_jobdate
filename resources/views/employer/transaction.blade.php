 @extends('layouts.app')
@section('content')

<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Transaction</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Card Number:</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}">

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('expiry') ? ' has-error' : '' }}">
                            <label for="expiry" class="col-md-4 control-label">Expiry:</label>

                            <div class="col-md-6">
                                <input id="expiry" type="textarea" class="form-control" name="expiry" value="{{ old('expiry') }}">

                                @if ($errors->has('expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expiry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name as it appears on card:</label>

                            <div class="col-md-6">
                                <input id="name" type="textarea" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('ccv') ? ' has-error' : '' }}">
                            <label for="ccv" class="col-md-4 control-label">CCV:</label>

                            <div class="col-md-6">
                                <input id="ccv" type="textarea" class="form-control" ccv="ccv" value="{{ old('ccv') }}">

                                @if ($errors->has('ccv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                           
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-news"></i> Subscribe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>


@endsection