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

    public function cancel() {
        $user = Auth::user();
        $employer = $user->employer;
        $employer->subscription('main')->cancel();
        return redirect('profile/subscription');
    }

    public function resume() {
        $user = Auth::user();
        $user->employer->subscription('main')->resume();
        return redirect('profile/subscription');
    }

}
