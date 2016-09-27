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
        if (Auth::user()->employer_id == null)
            return 'Not Authorized to complete this action.';
        else
            return $next($request);
    }
}
