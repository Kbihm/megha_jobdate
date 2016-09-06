 @extends('layouts.app')
@section('content')

 
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Promocode
                    <div class="col-md-4 pull-right">
                        Number of times used: {{ $promocode->number_of_times_used }}
                    </div>
                
                </div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="/admin/promocode/{{ $promocode->id }}">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ $promocode->code }}">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('number_of_uses') ? ' has-error' : '' }}">
                            <label for="number_of_uses" class="col-md-4 control-label">Number of Uses:</label>

                            <div class="col-md-6">
                                <input id="number_of_uses" type="text" class="form-control" name="number_of_uses" value="{{ $promocode->number_of_uses }}">

                                @if ($errors->has('number_of_uses'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_uses') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
       
                        <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                            <label for="days" class="col-md-4 control-label">Days Free:</label>

                            <div class="col-md-6">
                                <input id="days" type="text" class="form-control" name="days" value="{{ $promocode->days }}">

                                @if ($errors->has('days'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                                                                
                        <div class="form-group{{ $errors->has('expiry') ? ' has-error' : '' }}">
                            <label for="expiry" class="col-md-4 control-label">Expiry Date:</label>

                            <div class="col-md-6">
                                <input id="expiry" type="text" class="form-control" name="expiry" value="{{ $promocode->expiry }}">

                                @if ($errors->has('expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expiry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       


                        
                        
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-promocode"></i>Update
                                </button>
                            </form>
                                <form class="form-horizontal" role="form" method="POST" action="/admin/promocode/{{ $promocode->id }}">
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