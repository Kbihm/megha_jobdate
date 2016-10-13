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


}
