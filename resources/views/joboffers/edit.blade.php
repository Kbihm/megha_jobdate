@extends('layouts.app')


@section('content')
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Job Listing</div>
                <div class="panel-body">
 

                    <form class="form-horizontal" role="form" method="POST" action="/joboffers/edit">
                        {{ csrf_field() }} 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PATCH')}}


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <input type="text" name="date" class="form-control" @if (count($errors)) value="{{ old('date') }}" @else value="{{ $joboffer->date }}" @endif>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea style="resize: none;" type="input" name="description" class="form-control" @if (count($errors)) value="{{ old('description') }}" @else value="{{ $joboffer->description }}" @endif>{{ $joboffer->description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="time" class="col-sm-2 control-label">Time:</label>
                            <div class="btn-group col-sm-10" data-toggle="buttons">
                            <label class="btn btn-warning col-sm-3">
                                <input type="checkbox" autocomplete="off" value="morning"> Morning
                            </label>
                            <label class="btn btn-danger col-sm-3">
                                <input type="checkbox" autocomplete="off" value="lunch"> Lunch
                            </label>
                            <label class="btn btn-primary col-sm-3">
                                <input type="checkbox" autocomplete="off" value="evening"> Evening
                            </label>
                        </div>

                    {{-- 
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $role)
                                <option value="{{ $role }}">
                                    {{ $role }}
                                </option>
                                @endforeach
                        </div>
                        --}}
                        <div class="col-sm-offset-5">
                                <div class="col-sm-4">
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