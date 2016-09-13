<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Skill;
use App\Experience;
use App\Comment;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // THIS IS A LIAM MADE FUNCTION //
    public function show($id) 
    {
        $user = User::find($id);
        $skills = Skill::where('employee_id', '=', $id)->get();
        $experiences = Experience::where('employee_id', '=', $id)->get();
        return view('user.show', compact('user', 'skills', 'experiences'));
    }

}
