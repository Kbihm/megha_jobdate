 @extends('layouts.app') 
 @section('content')

<div class="container">

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Leave a Comment for {{$user->user->first_name}} {{$user->user->last_name}} </div>
			<div class="panel-body">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#" >Predefined Reviews</a></li>
                <li><a href="/reviews/custom/create/{{$user->id}}" >Write a Custom Reviews</a></li>
            </ul>

                            <div class="col-md-12">
                                <div class="form-group">

                                    <form class="form-horizontal" role="form" method="POST" action="/reviews/">
                                    {{ csrf_field() }}

                                    <label class="control-label">Use a predefined review</label>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            <span class="text-success">Positive</span> – {{$user->user->first_name}} was punctual and was able to complete tasks as per their profile and work history, I would recommend this employee to other employers in the future.
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            <span class="text-muted">Neutral</span> – {{$user->user->first_name}} did not turn up punctually but completed all tasks at a high level.
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            <span class="text-muted">Neutral</span> – {{$user->user->first_name}} was a good worker but the job itself was not suited to the employer.
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            <span class="text-danger">Negative</span> – {{$user->user->first_name}} was not able to complete the tasks as per their profile and work history.
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            <span class="text-danger">Negative</span> – {{$user->user->first_name}} never showed up for the job.
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Leave Review
                                </button>
                            </div>

                            

                            </form>

                        </div>
                    </div>


        </div>

    </div>

</div>

@endsection