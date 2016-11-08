<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Skill;
use App\Experience;
use App\Comment;
use Auth;
use App\Employee;
use App\Employer;
use App\Settings;

class UserController extends Controller
{

    public static $password_rules = [
        'new_password' => 'required',
        'new_password_confirm' => 'required|same:new_password',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
            $user = Auth::user();
            if($user->employee_id != null)
            {                     
            $roles = Settings::$roles;
            return view('profile.index', compact('user', 'roles'));
            }
            return view('profile.index', compact('user'));
    }

    public function subscription()
    {
            $user = Auth::user();
            return view('profile.subscription', compact('user'));
    }

    public function skills()
    {
            $user = Auth::user();
            return view('profile.skills', compact('user'));
    }

    public function experience()
    {
            $user = Auth::user();
            return view('profile.experience', compact('user'));
    }

    public function availability()
    {

        //Relevant for availability calendar
        $today = getdate();
        $start = mktime(0,0,0,$today['mon'],$today['mday'],$today['year']);
        $first = getdate($start);
        //set end date to 2 weeks from when the calendar starts
        $end = mktime(0,0,0,$first['mon'],$today['mday']+29,$first['year']);
        $last = getdate($end);

        if($first['mon']+1 == $last['mon']){
            $daytarget = $this->days_in_month($first['mon'], $first['year']);
        }
        else{
            $daytarget = $last['mday'];
        }
        
        // dd($first);

        $user = Auth::user();
        return view('profile.availability', compact('user', 'first', 'daytarget', 'last'));
    }

    public function security()
    {
            $user = Auth::user();
            $pw_update = false;
            return view('profile.security', compact('user', 'pw_update'));
    }

    public function updatepassword(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, self::$password_rules);

        $user->password = bcrypt($request->new_password);
        $user->save();

        $pw_update = true;
        return view('profile.security', compact('user', 'pw_update'));
    }

    public function UpdateEmployer(Request $request)
    {

        $this->validate($request, User::$update_rules);
        $this->validate($request, Employer::$update_rules);

        $user = Auth::user();
        $employer = $user->employer;

        $user->update($request->all());
        $employer->update($request->all());

        $employer->save();
        $user->save();

        return redirect('/profile');
    }

    public function UpdateEmployee(Request $request)
    {

        $this->validate($request, User::$update_rules);
        $this->validate($request, Employee::$rules);

        $user = Auth::user();
        $employee = $user->employee;

        $user->update($request->all());
        $employee->update($request->all());

        $employee->save();
        $user->save();

        return redirect('/profile');
    }

    function days_in_month($month, $year) 
    { 
    // calculate number of days in a month 
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
    } 



}
