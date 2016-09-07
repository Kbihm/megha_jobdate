@extends('layouts.app')
    @section('content')
<?php ?>

         <h4><small>Employee Profile</small></h4>
        @foreach($comments as $comment)
        test
        @endforeach
        <div class="panel panel-primary">
            <div class="panel-heading" style="height:110px;">
                <h2 style="height:30px">Named Namington</h2>
                <div class="col-md-7 pull-right">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100" style="width:<?php $rating = $user->employee->average_rating; echo $rating*10; ?>%">
                            
                        </div>
                        <div class="col-md-4" style="color:black; text-align: center;"> Average Rating:  <?php $rating = $user->employee->average_rating; echo $rating*10; ?>% </div>
                    </div>
                </div> 
            </div>
            <div class="panel-body">
                <div class="col-md-3 pull-left">
                <br><br>
                    <img src="http://placehold.it/250x300" width="250px" height="300px" />
                </div>
                <h4 class="text-center"><small> Biography and Info </small></h4>
                <hr>
                <div class="col-md-9 pull-right">
                    <p>{{$user->employee->about}}</p>
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
                            Comments <span class="badge"><?php $number = count($comments); echo $number; ?></span>
                        </a>
                        <div class="list-group-item">
                            <div class="pre-scrollable" style="height: 125px;">

                            @foreach($comments as $comment)
                                <div class="list-group-item">
                                    <div class="col-sm-2 pull-right">
                                        <icon class="btn-sm btn-<?php 
                                            if($comment->rating == 1){
                                            echo"danger";}
                                            elseif($comment->rating == 2){
                                            echo"warning";}
                                            elseif($comment->rating == 3){
                                            echo"success";}
                                            ?>
                                            "> 
                                            </icon>
                                    </div>
                                    {{$comment->comment}}                                 
                                    
                                    @if (Auth::user()->admin_id != null)
                                        <form class="form-horizontal" role="form" method="POST" action="/admin/comments/{{ $comment->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type-"submit" class="btn btn-danger"> Delete </button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pull-right col-md-6"><a href="/admin/comments/create" class="btn btn-success">Leave A Review</a></div>
                <div class="pull-right col-md-6"><button href="/jobs/test" class="btn btn-danger">Request Contact Details</button></div>
                <div class="pull-right col-md-3"><h1>Availability</h1></div>
            </div>
        </div>
        
    @endsection