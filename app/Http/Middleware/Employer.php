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

            if ($user->subscribed('main')) {
                return $next($request);
            }
            else {
                return redirect('profile/subscription');
            }
        }
        else {
            return 'Not Authorized to complete this action.';
        }
    }
}
