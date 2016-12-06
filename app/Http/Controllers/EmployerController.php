<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Employer;

class EmployerController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function subscribe(Request $request) {

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

    }

    public function SubscribeYearly(Request $request) {

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

    }

    public function cancel() {
        $user = Auth::user();
        $user->subscription('main')->cancel();
        return redirect('profile/subscription')->withError('Subscription Cancelled.');
    }

    public function resume() {
        $user = Auth::user();
        $user->subscription('main')->resume();
        return redirect('profile/subscription')->with('success', 'Your Subscription has been resumed.');
    }

    public function swap() {
        // return 'Broken ATM';
        $user = Auth::user();
        $sub = $user->subscription('main');

        if ($sub->stripe_plan == 'monthly')
            $sub->swap('yearly');
        else if ($sub->stripe_plan == 'yearly')
            $sub->swap('monthly');

        return redirect('profile/subscription')->with('success', 'Subscription Billing Period Changed.');
    }

    public function invoice($invoiceId) {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor'  => 'Job Date ABN: 806 134 637 82 Prices include GST.',
            'product' => 'Job Date Subscription',
        ]);
    }

    public function UpdateCard(Request $request) {

        $user = Auth::user();

        if ($user->employer_id == null)
            return back();

        $creditCardToken = $request->stripeToken;

        $user->updateCard($creditCardToken);

        return back()->with('success', 'Card Details Updated');

        }


}
