 @extends('layouts.app')
@section('content')

<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Past Work Experience</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/experience/">
                        {{ csrf_field() }}
                <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Position Title:</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" @if (count($errors)) value="{{ old('title') }}" @endif>
                        </div>
                    </div> 

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Name of Establishment:</label>
                        <div class="col-sm-10">
                            <input type="text" name="establishment_name" class="form-control" @if (count($errors)) value="{{ old('establishment_name') }}" @endif>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Start of Employment:</label>
                        <div class="col-sm-10">
                            <input type="text" name="employment_start" class="form-control" @if (count($errors)) value="{{ old('employment_length') }}" @endif>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">End of Employment:</label>
                        <div class="col-sm-10">
                            <input type="text" name="employment_finish" class="form-control" @if (count($errors)) value="{{ old('employment_length') }}" @endif>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Are you currently employed at this establishment?:</label>
                        <div class="col-sm-10">
                            <input type="text" name="employment_finish" class="form-control" @if (count($errors)) value="{{ old('employment_length') }}" @endif>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Describe your roles:</label>
                        <div class="col-sm-10">
                            <input type="textarea" name="description" class="form-control" @if (count($errors)) value="{{ old('description') }}" @endif>
                        </div>
                    </div> 
                     <input name="employee_id" class="form-control" type="hidden" value="{{$user}}">   
                        <div class="form-group">
                            <div class="text-center" >
                                <button type="submit" class="btn btn-primary">
                                    Submit Experience
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection 
