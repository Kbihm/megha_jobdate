<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

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

        
        $employer = $user->employer;
        $employer->newSubscription('main', 'monthly')->create($creditCardToken, [
            'email' => $user->email,
        ]);

        return redirect('profile/subscription');

    }

    public function SubscribeYearly(Request $request) {

        $user = Auth::user();

        if ($user->employer_id == null)
            return back();

        $creditCardToken = $request->stripeToken;
        
        $employer = $user->employer;
        $employer->newSubscription('main', 'yearly')->create($creditCardToken, [
            'email' => $user->email,
        ]);

        return redirect('profile/subscription');

    }

    public function cancel() {
        $user = Auth::user();
        $sub = $user->employer->subscription('main');

        // dd($user->employer->subscription('main')->onTrial());

        $sub->cancel();
        return redirect('profile/subscription');
    }

    public function resume() {
        $user = Auth::user();
        $user->employer->subscription('main')->resume();
        return redirect('profile/subscription');
    }

    public function swap() {
        return 'Broken ATM';
        $user = Auth::user();
        $sub = $user->employer->subscription('main');

        if ($sub->stripe_plan == 'monthly')
            $sub->swap('yearly');
        else if ($sub->stripe_plan == 'yearly')
            $sub->swap('monthly');

        // return redirect('profile/subscription');
    }

    public function invoice($invoiceId) {
    return Auth::user()->employer->downloadInvoice($invoiceId, [
        'vendor'  => 'Job Date ABN: XXX',
        'product' => 'Job Date Subscription',
    ]);
}

}
