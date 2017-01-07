<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Employer;
use Log; 

class EmployerController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function subscribe(Request $request) {
        try {
        $user = Auth::user();

        if ($user->employer_id == null)
            return back();

        $creditCardToken = $request->stripeToken;

        if ($request->has('coupon_code')) {

            try {
                $user->newSubscription('main', 'monthly')
                ->withCoupon($request->coupon_code)
                ->create($creditCardToken, [
                    'email' => $user->email,
                ]);
            } catch (\Exception $e) {
                return back()->withError($e->getMessage());
            }

        } else {
            $user->newSubscription('main', 'monthly')->create($creditCardToken, [
                'email' => $user->email,
            ]);
        }

        return redirect('profile/subscription');
        } catch (Exception $e) {
            Log::warning($e->getMessage());
            return back()->with("error", "Sorry, an error occured. Please try again - if this issue persists contact support.");
        }
    }

    public function SubscribeYearly(Request $request) {
        try {
            $user = Auth::user();

            if ($user->employer_id == null)
                return back();

            $creditCardToken = $request->stripeToken;
            
            if ($request->has('coupon_code')) {

                try {
                    $user->newSubscription('main', 'yearly')
                    ->withCoupon($request->coupon_code)
                    ->create($creditCardToken, [
                        'email' => $user->email,
                    ]);
                } catch (\Exception $e) {
                    return back()->withError($e->getMessage());
                }

            } else {
                $user->newSubscription('main', 'yearly')->create($creditCardToken, [
                    'email' => $user->email,
                ]);
            }

            return redirect('profile/subscription');
        } catch (Exception $e) {
            Log::warning($e->getMessage());
            return back()->with("error", "Sorry, an error occured. Please try again - if this issue persists contact support.");
        }
        
    }

    public function cancel() {
        try {
            $user = Auth::user();
            $user->subscription('main')->cancel();
            return redirect('profile/subscription')->withError('Subscription Cancelled.');
        } catch (Exception $e) {
            Log::warning($e->getMessage());
            return back()->with("error", "Sorry, an error occured. Please try again - if this issue persists contact support.");
        }
    }

    public function resume() {
        try {
            $user = Auth::user();
            $user->subscription('main')->resume();
            return redirect('profile/subscription')->with('success', 'Your Subscription has been resumed.');
        } catch (Exception $e) {
          Log::warning($e->getMessage());
          return back()->with("error", "Sorry, an error occured. Please try again - if this issue persists contact support.");  
        }
    }

    public function swap() {
        try {
            $user = Auth::user();
            $sub = $user->subscription('main');

            if ($sub->stripe_plan == 'monthly')
                $sub->swap('yearly');
            elseif ($sub->stripe_plan == 'yearly')
                $sub->swap('monthly');

            return redirect('profile/subscription')->with('success', 'Subscription Billing Period Changed.');
        } catch (Exception $e) {
            Log::warning($e->getMessage());
            return back()->with("error", "Sorry, an error occured. Please try again - if this issue persists contact support.");
        }
     }

    public function invoice($invoiceId) {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor'  => 'Job Date ABN: 806 134 637 82 Prices include GST.',
            'product' => 'Job Date Subscription',
        ]);
    }

    public function UpdateCard(Request $request) {
            $user = Auth::user();

            try {
            if ($user->employer_id == null)
                return back();

            $creditCardToken = $request->stripeToken;

            $user->updateCard($creditCardToken);

            return back()->with('success', 'Card Details Updated');
            } catch (Exception $e) {
                Log::warning($e->getMessage());
                return back()->with("error", "Sorry, an error occured. Please try again - if this issue persists contact support.");
            }
        }

}
