@extends('layouts.app')


@section('content') 
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit a Job Listing</div>
                <div class="panel-body">


                    <form class="form-horizontal" role="form" name="joboffer" method="POST" action="/jobs/{{ $joboffer->id }}">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }} 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <input type="text" name="date" class="form-control" @if (count($errors)) value="{{ old('date') }}" @else value="{{ $joboffer->date }}" @endif>
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
                                    <option @if ($joboffer->role == $role) selected @endif value="{{ $role }}" >
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea style="resize: none;" type="input" name="description" class="form-control">@if (count($errors)) {{ old('description') }} @else {{ $joboffer->description }} @endif </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Number of Hours:</label>
                            <div class="col-sm-10">
                                <input type="number" name="hours" class="form-control" @if (count($errors)) value="{{ old('hours') }}" @else value="{{ $joboffer->hours }}" @endif>
                                @if ($errors->has('hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">Time:</label>
                            <div class="btn-group col-sm-10" data-toggle="buttons">
                            <label class="btn btn-warning col-sm-3 @if($joboffer->time == 'morning') active @endif">
                                <input name="time" type="radio" autocomplete="off" value="morning" @if($joboffer->time == 'morning') checked="checked" @endif> Morning
                            </label>
                            <label class="btn btn-danger col-sm-3 @if($joboffer->time == 'lunch') active @endif">
                                <input name="time" type="radio" autocomplete="off" value="lunch" @if($joboffer->time == 'lunch') checked="checked"" @endif > Lunch
                            </label>
                            <label class="btn btn-primary col-sm-3 @if($joboffer->time == 'evening') active @endif">
                                <input name="time" type="radio" autocomplete="off" value="evening" @if($joboffer->time == 'evening') checked="checked" @endif> Evening
                            </label>
                        </div>


                        <div class="col-sm-offset-5">
                            @if ($errors->has('time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                                </span>
                            @endif
                                <div class="col-sm-4 form-group">
                                    <button class="btn btn-success form-control" type="submit" >
                                        Edit
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