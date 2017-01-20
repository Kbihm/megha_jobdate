<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user->admin_id != null) {

            return $next($request);
        
        }
        elseif ($user->employer_id != null) {
//$user->subscribed('main')
            if ( 1 == 1) {
                return $next($request);
            }
            else {
                return redirect('profile/subscription')->with("error", "You need to subscribe before you can view that page.");
            }
        }
        else {
            return response('Not Authorized to complete this action.', 401);
        }
    }
}
