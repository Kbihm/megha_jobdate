<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Employee
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
        if (Auth::user()->employee_id != null || Auth::user()->admin_id == null)
            return $next($request);
        else
            return 'Not Authorized to complete this action.';
    }
}