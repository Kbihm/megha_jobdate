@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-3">

        <h4> Manage your account </h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile">Your Information</a></li>
            @if ($user->employee_id != null)
            <li class=""><a href="/profile/skills" >Skills</a></li>
            <li class="active"><a href="profile/experience">Experience</a></li>
            @endif
            @if ($user->employer_id != null)
            <li class="active"><a href="/profile/subscription" >Subscription</a></li>
            @endif
            <li class=""><a href="/profile/security">Security</a></li>
        </ul>


        </div>


        <div class="col-md-9">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="subscription">
           
            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Subscription</h3>
            </div>
            <div class="panel-body">

            @if (Auth::user()->employer->subscribed('main'))

                @if (Auth::user()->employer->subscription('main')->onTrial())

                <h4> You're still on your free trial!</h4>

                @endif

                <h4> You're currently on a {{ $user->employer->subscription('main')->stripe_plan }} subscription. </h4>
                <p> Using your {{ $user->employer->card_brand}} ending in {{ $user->employer->card_last_four}}.</p>
                <p> Created on: {{ date('F d, Y', strtotime($user->employer->created_at)) }} <br />
                    Last modified: {{ date('F d, Y', strtotime($user->employer->updated_at)) }}<br /></p>
                <hr>
                
                <a href="/subscription/swap" class="btn btn-primary"> Change to Yearly Plan </a> &nbsp;
                <a href="#" class="btn btn-primary"> Change Card Details </a> &nbsp;

                @if ($user->employer->subscription('main')->cancelled())
                    You've cancelled your subscription.
                @endif

                @if ($user->employer->subscription('main')->onGracePeriod())
                    On Grace Period
                    <a href="/subscription/resume" class="btn btn-success"> Resume </a>
                @else 
                    <a href="/subscription/cancel" class="btn btn-danger"> Cancel </a>
                @endif

                

            @else

            <h4>You're not currently subscribed, have a look at our subscriptions.</h4>                

            <div class="row">
            <div class="col-md-6">

            <h4> Subscribe Monthly </h4>

                <form action="/subscribe" method="POST">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_VxmN6uGKu6efujyJ4UfxQlYZ"
                    data-amount="3000"
                    data-name="Job Date"
                    data-description="Monthly Subscription"
                    data-image="https://s3.amazonaws.com/stripe-uploads/acct_156KIhIRGcBZPWlXmerchant-icon-1417779552694-1962856_296529483873563_7910790945420469738_n.png"
                    data-locale="auto"
                    data-currency="aud"
                    data-email="{{ Auth::user()->email}}"
                    >
                </script>
                </form>
            </div>

            <div class="col-md-6">

            <h4> Subscribe Yearly </h4>

                <form action="/subscribe/yearly" method="POST">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_VxmN6uGKu6efujyJ4UfxQlYZ"
                    data-amount="30000"
                    data-name="Job Date"
                    data-description="Yearly Subscription"
                    data-image="https://s3.amazonaws.com/stripe-uploads/acct_156KIhIRGcBZPWlXmerchant-icon-1417779552694-1962856_296529483873563_7910790945420469738_n.png"
                    data-locale="auto"
                    data-currency="aud"
                    data-email="{{ Auth::user()->email}}"
                    >
                </script>
                </form>
            </div>
            </div>

            @endif

            </div>
            </div>

            @if($user->employer_id != null)

            <div class="panel panel-default">
                <div class="panel-heading">Invoices</div>
                <div class="panel-body">

                <table class="table">
                    @foreach ($user->employer->invoices() as $invoice)
                        <tr>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                        </tr>
                    @endforeach
                </table>

                </div>
            </div> 

            <div class="panel panel-default sr-only">
                <div class="panel-heading">Billing Information</div>
                <div class="panel-body">
 
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Card Number:</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}">

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('expiry') ? ' has-error' : '' }}">
                            <label for="expiry" class="col-md-4 control-label">Expiry:</label>

                            <div class="col-md-6">
                                <input id="expiry" type="textarea" class="form-control" name="expiry" value="{{ old('expiry') }}">

                                @if ($errors->has('expiry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expiry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name as it appears on card:</label>

                            <div class="col-md-6">
                                <input id="name" type="textarea" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('ccv') ? ' has-error' : '' }}">
                            <label for="ccv" class="col-md-4 control-label">CCV:</label>

                            <div class="col-md-6">
                                <input id="ccv" type="textarea" class="form-control" ccv="ccv" value="{{ old('ccv') }}">

                                @if ($errors->has('ccv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                           
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Update
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    @endif
        </div>

        </div>
        @endsection