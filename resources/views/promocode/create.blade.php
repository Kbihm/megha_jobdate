@extends('layouts.app')

@section('content')
 
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Promocode</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="/admin/promocode">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}">

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
                                <input id="number_of_uses" type="text" class="form-control" name="number_of_uses" value="{{ old('number_of_uses') }}">

                                @if ($errors->has('number_of_uses'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_uses') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                                             
                        <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                            <label for="days" class="col-md-4 control-label">Number of days:</label>

                            <div class="col-md-6">
                                <input id="days" type="text" class="form-control" name="days" value="{{ old('days') }}">

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
                                <input id="expiry" type="text" class="form-control" name="expiry" value="{{ old('expiry') }}">

                                @if ($errors->has('expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expiry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>        


                    
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-promocode"></i> Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection           
