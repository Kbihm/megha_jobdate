@extends('layouts.app')

@section('content')
 <!--</div> </div>-->


<div class="container">

    <div class="col-md-12 text-center">


        <h1>Welcome to JobDate </h1>

        <p> Here are pricing options for employers seeking potential staff. If you're looking for work, it's free! </p>
    </div>


    <!--<div class="row">
                <div class="col-md-4">
                   <div class="info">
                        <div class="icon icon-azure">
                            <i class="pe-7s-clock"></i>
                        </div>
                        <div class="description">
                            <h3> Save Time </h3>
                            <p>Spend your time generating new ideas. You don't have to think of implementing anymore.</p>
                        </div>
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="info">
                        <div class="icon icon-purple">
                            <i class="pe-7s-scissors"></i>
                        </div>
                        <div class="description">
                            <h3> Fast Prototyping </h3>
                            <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.</p>
                        </div>
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="info">
                        <div class="icon icon-pink">
                            <i class="pe-7s-like"></i>
                        </div>
                        <div class="description">
                            <h3> Made with Love </h3>
                            <p>Really fast implementation</p>
                        </div>
                   </div>
                </div>
            </div>-->

        <div class="">
                <div class="col-md-3 text-center">

                    <div class="card card-price">
                                    <div class="content">
                                        <h6 class="category">Employers</h6>
                                        <h1 class="price">
                                            <small>$</small>35 <small>/mo</small>
                                        </h1>

                                        <p class="text-muted text-center">Pay in monthly installments</p>

                                        <ul class="list-unstyled list-lines">
                                            <li>
                                                <i class="fa fa-calendar"></i> 14 Day Free Trial
                                            </li>
                                            <li>
                                                <i class="fa fa-money"></i> Pay Monthly
                                            </li>
                                            <li>
                                                <i class="fa fa-clock-o"></i> Find Staff Fast
                                            </li>
                                            <li>
                                                 <i class="fa fa-search"></i> Complex Searching
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer">
                                    <a href="/register/employee" class="btn btn-info btn-fill btn-block">Start Finding Staff</a>
                                    </div>
                                </div>

                    <!--<h4>Employees </h4>
                    <p>Job Date allows you to set your availability to work when you're available. </p>
                    <ul style="list-style-type:none;">
                        <li>Get Job Offers</li>
                        <li>List your skills &amp; Experience </li>
                        <li>Completely Free </li>
                    </ul>

                    <a  class="btn btn-lg btn-primary">Register as an Employee </a>-->

                </div>

                <div class="col-md-3">
                    <div class="card card-price">
                                    <div class="content">
                                        <h6 class="category">Employers</h6>
                                        <h1 class="price">
                                            <small>$</small>330 <small>/yr</small>
                                        </h1>
                                        <p class="text-muted text-center">Pay once per year</p>

                                        <ul class="list-unstyled list-lines">
                                        <li>
                                                <i class="fa fa-calendar"></i> 30 Days Free Trial
                                            </li>
                                            <li>
                                                <i class="fa fa-money"></i> Pay Annually
                                            </li>
                                            <li>
                                                <i class="fa fa-clock-o"></i> Find Staff Fast
                                            </li>
                                            <li>
                                                <i class="fa fa-search"></i> Complex Searching
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer">
                                    <a href="/register/employer" class="btn btn-info btn-fill btn-block">Start Finding Staff</a>
                                    </div>
                                </div>

                                

                </div>

                <div class="col-md-3 text-center">

                    <div class="card card-price">
                                    <div class="content">
                                        <h6 class="category">Multiple Locations</h6>
                                        <h1 class="price">
                                            <small>$</small>~ <small>/mo</small>
                                        </h1>

                                        <p class="text-muted text-center">Multiple Locations</p>

                                        <ul class="list-unstyled list-lines">
                                            <li>
                                                <i class="fa fa-clock-o"></i> Find staff fast
                                            </li>
                                            <li>
                                                <i class="fa fa-building"></i> For all locations
                                            </li>
                                            <li>
                                                <i class="fa fa-briefcase"></i> Customised Quote
                                            </li>
                                            <li>
                                                <i class="fa fa-check"></i> Hire more staff
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer">
                                    <a href="www.jobdate.com.au/contact-us" class="btn btn-info btn-fill btn-block">Contact for a quote</a>
                                    </div>
                                </div>

           
        </div>

         <div class="col-md-3 text-center">

            <div class="card card-price">
                            <div class="content">
                                <h6 class="category">Employees</h6>
                                <h1 class="price">
                                    <small>$</small>0 <small>/mo</small>
                                </h1>

                                <p class="text-muted text-center">Completely Free</p>

                                <ul class="list-unstyled list-lines">
                                    <li>
                                        <i class="fa fa-comments"></i> Have People Review you
                                    </li>
                                    <li>
                                        <i class="fa fa-magic"></i> Show your skills &amp; experience
                                    </li>
                                    <li>
                                        <i class="fa fa-briefcase"></i> Get Job Offers
                                    </li>
                                    <li>
                                        <i class="fa fa-level-up"></i> Gain More Experience
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                               <a href="/register/employee" class="btn btn-info btn-fill btn-block">Start Getting Job Offers</a>
                            </div>
                        </div>

            <!--<h4>Employees </h4>
            <p>Job Date allows you to set your availability to work when you're available. </p>
            <ul style="list-style-type:none;">
                <li>Get Job Offers</li>
                <li>List your skills &amp; Experience </li>
                <li>Completely Free </li>
            </ul>

            <a  class="btn btn-lg btn-primary">Register as an Employee </a>-->

        </div>

        <p class="text-center col-md-12"> All subscriptions are charged at the END of your trial and if not satisfied within the trial period you can cancel at any time and you will not be charged. </p>
    

</div>
@endsection
