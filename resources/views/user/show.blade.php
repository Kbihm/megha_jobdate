@extends('layouts.app')
    @section('content')
<?php ?>

        <!--  <small>Employee Profile</small> -->

            <div class="row">

            <div class="col-md-3">

                <h3 class="page-title"> {{ $user->first_name }} </h3>
                <img src="http://placehold.it/250x300" width="250px" height="300px"/>

                <hr>

                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100" style="width:<?php $rating = $user->employee->average_rating; echo $rating*10; ?>%">
                        
                    </div>
                    <div class="col-md-4" style="color:black; text-align: center;"> Average Rating:  <?php $rating = $user->employee->average_rating; echo $rating*10; ?>% </div>
                </div>

                <div><a href="/admin/comments/create" class="btn btn-primary">Leave A Review</a></div>
                <br>
                <div><button href="/jobs/test" class="btn btn-primary">Request Contact Details</button></div>
                

            </div>

            <div class="col-md-9">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">About {{$user->first_name}}</h3>
                </div>
                <div class="panel-body">
                    <p>{{$user->employee->about}}</p>
                </div>
            </div>

            <!-- 

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

            </div> -->


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Skills</h3>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach ($user->employee->skill as $skill)
                    <li> {{ $skill->name }} </li>
                    @endforeach
                </ul>
            </div>
        </div>

        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Experience</h3>
            </div>
            <div class="panel-body">
                @foreach ($user->employee->experience as $experience)
                <h4>{{ $experience->title }}  <span class="text-muted"> ({{ $experience->establishment_name}})</span> </h4>
                <h6> {{ $experience->employment_length }} </h6>
                <p> {{ $experience->description }} </p>
                <hr>
                @endforeach
            </div>
        </div>

        </div>
        
    @endsection