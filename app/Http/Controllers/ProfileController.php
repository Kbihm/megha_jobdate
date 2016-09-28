<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function index() 
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show($id) 
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

}
