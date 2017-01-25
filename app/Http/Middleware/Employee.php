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
        if(!Auth::Check()){
            return view('welcome');
        }
        if (Auth::user()->employee->email_confirmed == false)
            return back()->with("error", "You need to confirm your email before accessing that page. Please check your email account and click the link to verify your email.
             Ensure you check your spam folder and if you still can't find the email contact support.");

        if (Auth::user()->employee_id != null || Auth::user()->admin_id == null)
            return $next($request);
        else
            return response('Not Authorized to complete this action.', 401);
    }
}
