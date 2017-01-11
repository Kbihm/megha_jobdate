<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JobDate | @yield('title')</title>

    <link href="/bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/gsdk.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

    <!--<style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
         <script src="/assets/js/chartist.min.js"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="" href="{{ url('/') }}">
                <img src="/logo-jobdate.png" alt="JobDate Logo" style="max-height: 50px;
                        margin-top: 13px;
                        margin-left: 10px;">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    @if (Auth::guest())

                         <li><a href="/staff">Search</a></li> 

                    @elseif (Auth::user()->admin_id != null)

                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="/admin/user">Users</a></li>
                        <li><a href="/staff">Employees</a></li>
                        <li><a href="/admin/comments">Comments</a></li>
                        <!-- <li><a href="/admin/promocode">PromoCodes</a></li> -->
                        <li><a href="/admin/settings">Settings</a></li>

                    @elseif (Auth::user()->employee_id != null)

                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="/offers">Job Offers</a></li>
                        <li><a href="/my-reviews">Reviews</a></li>

                    @elseif (Auth::user()->employer_id != null)
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="/jobs">Jobs</a></li>
                        <li><a href="/staff">Search</a></li>
                        <li><a href="/reviews">Reviews</a></li>

                    @else
                        
                        No role set.

                    @endif

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/profile"><i class="fa fa-btn fa-user"></i>My Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

<div class="section section-gray">
    <div class="container">


    <div class="row">
        <div class="col-md-12">
        @if(null !== (session('success')))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:0 !important;"><span aria-hidden="true">&times;</span></button>
                {{session('success')}}
            </div>
        @endif

        @if(null !== (session('error')))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:0 !important;"><span aria-hidden="true">&times;</span></button>
                {{session('error')}}
            </div>
        @endif
        </div>
    </div>

        @yield('content')
                
    </div>
</div>

<footer class="footer footer-big footer-transparent" style="background-image: url('/assets/img/alcohol-bar-party-cocktail.jpg');">
            <!-- .footer-black is another class for the footer, for the transparent version, we recommend you to change the url of the image with your favourite image.          -->

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="title">Company</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="http://jobdate.com.au/">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="http://jobdate.com.au/about-us">
                                       About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="http://jobdate.com.au/news-feed/">
                                        News Feed
                                    </a>
                                </li>
                                <li>
                                    <a href="http://jobdate.com.au/pricing/">
                                        Pricing
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        <h5 class="title"> Help and Support</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="http://jobdate.com.au/contact-us/">
                                       Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="http://jobdate.com.au/how-it-works/">
                                       How it works
                                    </a>
                                </li>
                                <li>
                                    <a href="http://jobdate.com.au/terms-and-conditions/">
                                        Terms &amp; Conditions
                                    </a>
                                </li>
                                <li>
                                    <a href="http://jobdate.com.au/frequently-asked-questions/">
                                        Frequently Asked Questions
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        <h5 class="title">Follow us on</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/JobDateAU/"  target="_blank" class="btn btn-social btn-facebook btn-simple">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>
                                <!--<li>
                                   <a href="#" class="btn btn-social btn-twitter btn-simple">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                </li>-->
                                <!--<li>
                                     <a href="#" target="_blank" class="btn btn-social btn-reddit btn-simple">
                                        <i class="fa fa-google-plus-square"></i> Google+
                                    </a>
                                </li>-->
                                <li>
                                     <a href="https://twitter.com/JobdateAU" target="_blank" class="btn btn-social btn-twitter btn-simple">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                </li>
                                                                <li>
                                     <a href="https://www.instagram.com/jobdateau/"  target="_blank" class="btn btn-social btn-tumblr btn-simple">
                                        <i class="fa fa-instagram"></i> Instagram
                                    </a>
                                </li>
                                <!--<li>
                                     <a href="#"  target="_blank" class="btn btn-social btn-linkedin btn-simple">
                                        <i class="fa fa-linkedin"></i> LinkedIn
                                    </a>
                                </li>-->
                            </ul>
                        </nav>

                    </div>
                                        <div class="col-md-3">
                        <h5 class="title">We Accept</h5>
                        <span style="font-size:30px">
                        <i class="fa fa-cc-visa"></i> &nbsp;
                        <i class="fa fa-cc-mastercard"></i>  &nbsp;
                        <i class="fa fa-cc-amex"></i> &nbsp;
                        </span>
                    </div>
                </div>
                <hr>
                <div class="copyright">
                    © {{ date("Y") }} JobDate
                </div>
            </div>
        </footer>

    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
    <script>
    // $( function() {
    //     $( "#datepicker" ).datepicker();
    // } );

    // $('.datepicker').datepicker({
    //          weekStart:1,
    //          color: '{color}'
    // });

    </script>
    <script src="/assets/js/bootstrap-datepicker.js"></script>
	<script src="/assets/js/get-shit-done.js"></script>
    <script src="/assets/js/chartist.min.js"></script>
    <script src="/assets/js/gsdk-checkbox.js"></script>
</body>
</html>
