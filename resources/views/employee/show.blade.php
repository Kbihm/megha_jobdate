 <?php    

 ?>
 
 @extends('layouts.employee')
@section('content')
            <h4><small>Employee Profile</small></h4>
        
        <div class="panel panel-primary">
            <div class="panel-heading" style="height:110px;">
                <h2 style="height:30px">Named Namington</h2>

                <h4 class="col-md-3"> Average Rating: </h4>
                <div class="progress col-md-8 pull-right">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                    aria-valuemin="0" aria-valuemax="100" style="width:83%">
                        83%
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-3 pull-left">
                <br><br>
                    <img src="404" width="250px" height="300px" />
                </div>
                <h4 class="text-center"><small> Biography and Info </small></h4>
                <hr>
                <div class="col-md-9 pull-right">
                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <hr>    
                </div>
                <div class="col-md-5">
                    <h4 class="text-center"><small> Skills </small></h4>
                    <hr>
                </div>
                <div class="col-md-4">
                    <h4 class="text-center"><small> Jobs </small></h4>
                    <hr>
                </div>
                <!-- Skills divs x 2, then Jobs divs x 2 -->
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <li class="glyphicon glyphicon-pencil"> One </li>
                    <br>
                    <li class="glyphicon glyphicon-pencil"> Two </li>
                    <br>
                    <li class="glyphicon glyphicon-pencil"> Three </li>
                </div>
                <div class="col-md-2">
                    <li class="glyphicon glyphicon-pencil"> Four </li>
                    <br>
                    <li class="glyphicon glyphicon-pencil"> Five </li>
                    <br>
                    <li class="glyphicon glyphicon-pencil"> Six </li>
                </div>
                <div class="col-md-2">
                    <li class="glyphicon glyphicon-briefcase"> One </li>
                    <br>
                    <li class="glyphicon glyphicon-briefcase"> Two </li>
                    <br>
                    <li class="glyphicon glyphicon-briefcase"> Three </li>
                </div>
                <div class="col-md-2">
                    <li class="glyphicon glyphicon-briefcase"> Four </li>
                    <br>
                    <li class="glyphicon glyphicon-briefcase"> Five </li>
                    <br>
                    <li class="glyphicon glyphicon-briefcase"> Six </li>
                </div>
                <div class="col-md-12">
                    <br><br>
                </div>
                <div class="col-md-6" style="height:200px;">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            Comments <span class="badge">3</span>
                        </a>
                        <div class="list-group-item">
                            <div class="pre-scrollable">

                                <div class="list-group-item">

                                    <div class="col-sm-2 pull-right">
                                        <icon class="btn-sm btn-success "><div class="glyphicon glyphicon-thumbs-up"></div> </icon>
                                    </div>
                                    Name was a great worker! On time and works hard.
                                </div>

                                <div class="list-group-item">
                                First Comment
                                </div>

                                <div class="list-group-item">
                                Pagination when comments exist
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


@endsection


