@extends('layouts.app')
@section('content')

    <div class="row">

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

            @if (Auth::user()->employer->subscribed('main'))

                @if (Auth::user()->employer->subscription('main')->onTrial())

                <h4> You're still on your free trial!</h4>

                @endif

                <h4 class="title"> You're currently on a {{ $user->employer->subscription('main')->stripe_plan }} subscription. </h4>
                
                <p>Payment Information </p>
                <p>
                    @if ($user->employer->card_brand == 'Visa')
                        <i class="fa fa-cc-visa"></i> 
                    @elseif ($user->employer->card_brand == 'Mastercard')
                        <i class="fa fa-cc-mastercard"></i> 
                    @elseif ($user->employer->card_brand == 'American Express')
                        <i class="fa fa-cc-amex"></i> 
                    @else
                        {{ $user->employer->card_brand }}
                    @endif
                    &nbsp;
                    **** **** **** {{ $user->employer->card_last_four}} </p>
                <p> <!-- Created on: {{ date('F d, Y', strtotime($user->employer->created_at)) }} <br /> -->
                    <small> Last modified: {{ date('F d, Y', strtotime($user->employer->updated_at)) }} </small></p>
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

            <h4 class="title">You're not currently subscribed, have a look at our subscriptions.</h4>                

            <div class="row">
            <div class="col-md-6">

            <h4> Subscribe Monthly </h4>

                <form action="/subscribe" method="POST">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_VxmN6uGKu6efujyJ4UfxQlYZ"
                    data-amount="3500"
                    data-name="Job Date"
                    data-description="Monthly Subscription"
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
                    data-amount="33000"
                    data-name="Job Date"
                    data-description="Yearly Subscription"
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


            @if(Auth::user()->employer->subscribed('main'))
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
            @endif

            
    @endif


    </div>
    </div>

@endsection