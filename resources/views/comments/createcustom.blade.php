 @extends('layouts.app') 
 @section('content')

<div class="container">

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Leave a Comment for {{$user->user->first_name}} {{$user->user->last_name}} </div>
			<div class="panel-body">

            <ul class="nav nav-tabs">
                <li><a href="/reviews/create/{{$user->id}}" >Predefined Reviews</a></li>
                <li class="active"><a href="#">Write a custom review</a></li>
            </ul>

                            <div class="col-md-12">
                                <div class="form-group">

                                    <form class="form-horizontal" role="form" method="POST" action="/reviews/custom">
                                    {{ csrf_field() }}

                                    <div class="col-md-12">
                                        <label class="control-label">Use a predefined review</label>
                                    </div>

                                    <div class="radio col-md-4">
                                        <label>
                                            <input type="radio" name="rating" id="Positive" value="2" checked="">
                                            <span class="text-success">Positive</span>
                                        </label>
                                    </div>

                                    <div class="radio col-md-4">
                                        <label>
                                            <input type="radio" name="rating" id="Neutral" value="1">
                                            <span class="text-muted">Neutral</span>
                                        </label>
                                    </div>

                                    <div class="radio col-md-4">
                                        <label>
                                            <input type="radio" name="rating" id="Negative" value="0">
                                            <span class="text-danger">Negative</span>
                                        </label>
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="comment" id="comment"> </textarea>
                                    </div>
                                </div>
                                  <input type="hidden" name="employee_id" value="{{$user->id}}">
                            </div>



                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Leave Review
                                </button>   
                                         
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Custom Comments</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h5> Hi there! Custom comments need to be approved by an administrator before they will show up on the employee's profile. </h6>
                                            <button type="submit" class="btn btn-primary">
                                                Submit Review
                                            </button>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                        </div>
                                    </div>
                                </div>         
                                         
                                         

                            </div>

                            

                            </form>

                        </div>
                    </div>


        </div>

    </div>

</div>

@endsection