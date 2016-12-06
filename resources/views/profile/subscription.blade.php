@extends('layouts.app')
@section('content')

    <div class="row">

    @if(null !== (session('success')))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    @if(null !== (session('error')))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif

        <div class="col-md-3">

        <div class="card">
           
        
            @if ($user->employee_id != null)

                @if (Storage::disk('local')->has($user->employee_id . '.jpg'))
                    <div class="image">
                        <a href="#">
                            <img src="{{route('image', ['filename' => $user->employee_id.'.jpg'])}}" alt="...">
                        </a>
                    </div>
                @endif

            @endif
        <div class="content">
        <h4 class="title"> Manage your account </h4>

                <ul class="list-group">
                    <a class="list-group-item" href="/profile">Your Information</a>
                    @if ($user->employee_id != null)
                    <a class="list-group-item" href="/profile/skills" >Skills</a>
                    <a class="list-group-item" href="/profile/experience">Experience</a>
                    <a class="list-group-item" href="/profile/availability">Availability</a>
                    @endif
                    @if ($user->employer_id != null)
                    <a class="list-group-item active" href="/profile/subscription" >Subscription</a>
                    
                    @endif
                    <a class="list-group-item" href="/profile/security">Security</a>
                </ul>

        <hr>

        <div class="footer">

        @if ($user->employee_id != null)
                <a class="btn btn-primary btn-block" href="/staff/{{ $user->employee_id }}"> How Employers see me </a>
        @endif
        </div>

        </div>
        </div>

        </div>


        <div class="col-md-9">
           
        <h4 class="title">Subscription</h4>

            <div class="card">
            <div class="content">

            @if (Auth::user()->subscribed('main'))

                @if (Auth::user()->subscription('main')->onTrial())

                <h4> You're still on your free trial!</h4>

                @endif

                <h4 class="title"> You're currently on a {{ $user->subscription('main')->stripe_plan }} subscription. </h4>
                
                <p>Payment Information </p>
                <p>
                    @if ($user->card_brand == 'Visa')
                        <i class="fa fa-cc-visa"></i> 
                    @elseif ($user->card_brand == 'MasterCard')
                        <i class="fa fa-cc-mastercard"></i> 
                    @elseif ($user->card_brand == 'American Express')
                        <i class="fa fa-cc-amex"></i> 
                    @else
                        {{ $user->card_brand }}
                    @endif
                    &nbsp;
                    @if ($user->card_brand != 'American Express')*@endif*** **** **** {{ $user->card_last_four}} </p>
                    <small> Subscription Updated: {{ date('F d, Y', strtotime($user->subscription('main')->updated_at)) }} </small></p>
                <hr>
                
                <a href="/subscription/swap" class="btn btn-primary"> Change to Yearly Plan </a> &nbsp;
                <button class="btn btn-primary"  data-toggle="modal" data-target="#myModal"> Change Card Details </button> &nbsp;

                <hr>

                @if ($user->subscription('main')->cancelled())
                    You've cancelled your subscription.
                @endif

                @if ($user->subscription('main')->onGracePeriod())
                    You can resume your subscription before it runs out.
                    <hr>
                    <a href="/subscription/resume" class="btn btn-success"> Resume </a>
                @else 
                    <a href="/subscription/cancel" class="btn btn-danger"> Cancel </a>
                @endif

                

            @else

            <h4 class="title">You're not currently subscribed, have a look at our subscriptions.</h4>                

            <div class="row">

            <div class=" col-md-offset-1 col-md-4">
            <div class="card card-price card-plain">
                <form action="/subscribe" method="POST">
                    <div class="content">
                        <h6 class="category">Monthly</h6>
                        <h1 class="price">
                            <small>$</small>35
                        </h1>
                        <p class="text-muted text-center small">Price includes GST. </p>

                    <label>Coupon Code </label>
                    <input type="text" name="coupon_code" class="form-control">
                    <br/>
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_VxmN6uGKu6efujyJ4UfxQlYZ"
                            data-amount="3500"
                            data-name="Job Date"
                            data-description="Monthly Subscription"
                            data-locale="auto"
                            data-allow-remember-me=false
                            data-currency="aud"
                            data-email="{{ Auth::user()->email}}"
                            >
                        </script>
                    </div>

                    </form>
                </div>

        </div>

            <div class="col-md-4 col-md-offset-1">
            <div class="card card-price card-plain">
                <form action="/subscribe/yearly" method="POST">
                    <div class="content">
                        <h6 class="category">Yearly</h6>
                        <h1 class="price">
                            <small>$</small>330
                        </h1>
                        <p class="text-muted text-center small">Price includes GST. </p>

                    <label>Coupon Code </label>
                    <input type="text" name="coupon_code" class="form-control">
                    <br/>
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_VxmN6uGKu6efujyJ4UfxQlYZ"
                            data-amount="33000"
                            data-name="Job Date"
                            data-description="Yearly Subscription"
                            data-locale="auto"
                            data-currency="aud"
                            data-allow-remember-me=false
                            data-email="{{ Auth::user()->email}}"
                            >
                        </script>
                    </div>

                    </form>
                </div>

        </div>

        </div>

            @endif

            </div>
            </div>

            @if($user->employer_id != null)


            @if(Auth::user()->subscribed('main'))
            <div class="panel panel-default">
                <div class="panel-heading">Invoices</div>
                <div class="panel-body">

                <p> GST is Included in all prices. </p>

                <table class="table table-striped">
                        <tr>
                            <th>Date</td>
                            <th>Amount</td>
                            <th>&nbsp;</th>
                        </tr>

                    @foreach ($user->invoices() as $invoice)
                    
                        <tr>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                        </tr>
                    @endforeach
                </table>

                </div>
            </div> 
            @endif

            
    @endif

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Card Details</h4>
      </div>
      <div class="modal-body">
        
        <p> Click below to update your card details, they won't be charged until your subscription is due next. </p>

        <form action="/subscribe/updatecard" method="POST">
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_VxmN6uGKu6efujyJ4UfxQlYZ"
                            data-name="Job Date"
                            data-description="Update Card Details"
                            data-panel-label="Update Card Details"
                            data-locale="auto"
                            data-allow-remember-me=false
                            data-currency="aud"
                            data-email="{{ Auth::user()->email}}"
                            >
                        </script>

                    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    </div>
    </div>

@endsection