 <?php    

 ?>
 
 @extends('layouts.employee')
@section('content')
            <h4><small>Employee Profile</small></h4>
        <hr>
        <div class="panel panel-header">
        <h2>{Name}</h2>
        </div>
                    <div class="col-md-3 pull-right">
                        <p> Average Rating: </p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100" style="width:83%">
                                83%
                            </div>
                        </div>
                    </div>
        
         <div class="col-md-3 pull-left">
                        <img src="404" width="250px" height="250px" />
         </div>

        <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <br><br><br><br><br><br><br><br><br><br>
        
        <h4><small>RECENT POSTS</small></h4>
        <hr>
        <h2>Officially Blogging</h2>
        <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
        <h5><span class="label label-success">Lorem</span></h5><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <hr>

        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
            <textarea class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <br><br>
        
        <p><span class="badge">2</span> Comments:</p><br>
        
        <div class="row">
            <div class="col-sm-2 text-center">
            <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-sm-10">
            <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
            <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <br>
            </div>
            <div class="col-sm-2 text-center">
            <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-sm-10">
            <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
            <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <br>    
            </div>
        </div>
        </div>
    </div>
    </div>


@endsection


