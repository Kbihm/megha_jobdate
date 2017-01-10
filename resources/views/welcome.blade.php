@extends('layouts.app')

@section('title')
Welcome
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="jumbotron">
                <h1>Welcome to JobDate! </h1>
                <p>Jobdate aims to bridge a gap in the Hospitality Industry, making it simpler to find staff and gain employment through a new age hiring process. </p>
                <p>Register now to start finding staff or to seek employment.</p>
                <a href="/register/employer" class="btn btn-success btn-fill">Start Finding Staff</a>
                <a href="/register/employee" class="btn btn-success btn-fill">Seek Employment</a>
            </div>

        </div>


        <div class="col-md-4">

            <div class="card">
                <div class="content">
                <h4 class="title">Login</h4>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Email Address</label>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>

                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="">
                                    <label class="checkbox checked" for="checkbox2">
                                        <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span><input type="checkbox" name="remember" value="" id="checkbox2" data-toggle="checkbox" checked="">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <p>&nbsp;</p>
                                <a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- End Login Panel -->

        </div>

        </div>
    </div>
</div>


@endsection
