@extends('layouts.app')

@section('content')
 <!--</div> </div>-->


<div class="container">

    <div class="col-md-6">

        <div class="hidden-sm hidden-xs">
            <hr><hr><hr>
        </div>
        <h1>Welcome to JobDate </h1>

        <p> Everyday carry authentic pabst bushwick kinfolk fam typewriter chicharrones occupy paleo, farm-to-table lyft listicle taxidermy waistcoat. Post-ironic next level la croix vinyl. Pour-over ugh cold-pressed, aesthetic distillery fingerstache etsy cronut. Cliche kogi umami church-key, chillwave narwhal authentic gluten-free offal. Keytar asymmetrical sartorial.</p>

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

        <div class="col-md-3">
            <div class="card card-price">
                            <div class="content">
                                <h6 class="category">Employers</h6>
                                <h1 class="price">
                                    <small>$</small>35 <small>/mo</small>
                                </h1>
                                <p class="text-muted text-center"><small>$</small>330 <small>/year</small></p>

                                <ul class="list-unstyled list-lines">
                                   <li>
                                        <i class="fa fa-calendar"></i> 30 Days Free Trial
                                    </li>
                                    <li>
                                        <i class="fa fa-money"></i> Pay Monthly or Annually
                                    </li>
                                    <li>
                                        <i class="fa fa-clock-o"></i> When you need them
                                    </li>
                                    <li>
                                        <i class="fa fa-search"></i> Complex Searching
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                               <a href="/register/employer" class="btn btn-info btn-fill btn-block">Start Finding People</a>
                            </div>
                        </div>

        </div>
           
        </div>



    

</div>
@endsection
