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


}
