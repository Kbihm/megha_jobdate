@extends('layouts.app')

@section('content')
 <!--</div> </div>-->


<div class="container">

    <div class="col-md-6">


        <h1 style="margin-top:65px">Welcome to JobDate </h1>

        <p> Here are pricing options for employers seeking potential staff. If you're looking for work, it's free! </p>
        <p> All subscriptions are charged at the END of your trial and if not satisfied within the trial period you can cancel at any time and you will not be charged. </p>
    </div>

        <div class="">
                <div class="col-md-3 text-center">

                    <div class="card card-price">
                                    <div class="content">
                                        <h6 class="category">Employers</h6>
                                        <h1 class="price">
                                            <small>$</small>35 <small>/mo</small>
                                        </h1>

                                        <p class="text-muted text-center">$330/yr</p>

                                        <ul class="list-unstyled list-lines">
                                            <li>
                                                <i class="fa fa-calendar"></i> 14 Day Free Trial
                                            </li>
                                            <li>
                                                <i class="fa fa-money"></i> Pay Monthly or Yearly
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

        </div>
    

</div>
@endsection
