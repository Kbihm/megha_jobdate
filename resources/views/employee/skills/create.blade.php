 @extends('layouts.app')
@section('content')

<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a New Skill</div>
                <div class="panel-body">

                <div class="text-center">
                <form class="form-horizontal" role="form" method="POST" action="/skills/create">
                        {{ csrf_field() }}
                <br>
                    
                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Skill</label>
                        <div class="col-sm-10">
                            <input type="text" name="skill" class="form-control" @if (count($errors)) value="{{ old('skill') }}" @endif>
                        </div>
                    </div> 
                        <div class="form-group">
                            <div class="text-center" >
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection