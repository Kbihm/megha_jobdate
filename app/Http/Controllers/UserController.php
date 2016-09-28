<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Skill;
use App\Experience;
use App\Comment;
use Auth;

class UserController extends Controller
{

    static $password_rules = [
        '',
        ''
    ];

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('employer');
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
            return view('profile.security', compact('user'));
    }

    public function resetpassword(Request $request)
    {
        $user = Auth::user();
        // $this->validate($request, $password_rules);

        if (Hash::make($request->old_password) == $user->getPassword()) {
            $user->password = Hash::make($request->new_password);
            $user->save();
        } else {
            return redirect('back');
        }

        $pw_update = true;
        return view('security', compact('user'), $pw_update);
    }

}
