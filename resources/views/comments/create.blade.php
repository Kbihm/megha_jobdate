 @extends('layouts.app') 

@section('title')
Create a Comment
@endsection

 @section('content')

<div class="container">

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Leave a Comment for {{$user->user->first_name}} {{$user->user->last_name}} </div>
			<div class="panel-body">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#" >Predefined Reviews</a></li>
                <li><a href="/reviews/custom/create/{{$user->id}}" >Write a custom review</a></li>
            </ul>

                            <div class="col-md-12">
                                <div class="form-group">

                                    <form class="form-horizontal" role="form" method="POST" action="/reviews/">
                                    {{ csrf_field() }}

                                    <label class="control-label">Use a predefined review</label>

                                    <div >
                                        <label>
                                            <input type="radio" name="comment" id="comment" value="{{$user->user->first_name}} was punctual and was able to complete tasks as per their profile and work history, I would recommend this employee to other employers in the future." checked="">
                                            <span class="text-success">Positive</span> – <small>  {{$user->user->first_name}} was punctual and was able to complete tasks as per their profile and work history, I would recommend this employee to other employers in the future. </small> 
                                        </label>
                                    </div>
                                    <br/>
                                    <div >
                                        <label>
                                            <input type="radio" name="comment" id="comment" value="{{$user->user->first_name}} did not turn up punctually but completed all tasks at a high level.">
                                            <span class="text-muted">Neutral</span> – <small>  {{$user->user->first_name}} did not turn up punctually but completed all tasks at a high level. </small> 
                                        </label>
                                    </div>
                                    <br/>
                                    <div >
                                        <label>
                                            <input type="radio" name="comment" id="comment" value="{{$user->user->first_name}} was a good worker but the job itself was not suited to the employer.">
                                            <span class="text-muted">Neutral</span> – <small>  {{$user->user->first_name}} was a good worker but the job itself was not suited to the employer. </small> 
                                        </label>
                                    </div>
                                    <br/>
                                    <div >
                                        <label>
                                            <input type="radio" name="comment" id="comment" value="{{$user->user->first_name}} was not able to complete the tasks as per their profile and work history.">
                                            <span class="text-danger">Negative</span> – <small> {{$user->user->first_name}} was not able to complete the tasks as per their profile and work history. </small>
                                        </label>
                                    </div>
                                    <br/>
                                    <div >
                                        <label>
                                            <input type="radio" name="comment" id="comment" value="{{$user->user->first_name}} never showed up for the job.">
                                            <span class="text-danger">Negative</span> – <small>  {{$user->user->first_name}} never showed up for the job. </small>
                                        </label>
                                    </div>

                                </div>
                                  <input type="hidden" name="employee_id" value="{{$user->id}}">
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