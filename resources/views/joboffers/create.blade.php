@extends('layouts.app')


@section('content')
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a New Job Listing</div>
                <div class="panel-body">
 

                    <form class="form-horizontal" role="form" method="POST" action="/jobs/">
                        {{ csrf_field() }} 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <input type="text" name="date" class="form-control" @if (count($errors)) value="{{ old('date') }}" @endif>
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
                        <?php
                        use App\Settings;
                        $roles = Settings::$roles;
                        ?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="role" >
                                    @foreach($roles as $role)
                                    <option value="{{ $role }}">
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Number of estimated hours:</label>
                            <div class="col-sm-10">
                                <textarea style="resize: none;" type="input" name="description" class="form-control" @if (count($errors)) value="{{ old('description') }}" @endif></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea style="resize: none;" type="input" name="description" class="form-control" @if (count($errors)) value="{{ old('description') }}" @endif></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">Time:</label>
                            <div class="btn-group col-sm-10" data-toggle="buttons">
                            <label class="btn btn-warning col-sm-3">
                                <input name="time" type="checkbox" autocomplete="off" value="morning"> Morning
                            </label>
                            <label class="btn btn-danger col-sm-3">
                                <input name="time" type="checkbox" autocomplete="off" value="lunch"> Lunch
                            </label>
                            <label class="btn btn-primary col-sm-3">
                                <input name="time" type="checkbox" autocomplete="off" value="evening"> Evening
                            </label>

                        </div>


                        <div class="col-sm-offset-5">
                            @if ($errors->has('time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                                </span>
                            @endif
                                <div class="col-sm-4">
                                    <button class="btn btn-success form-control" type="submit" >
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection