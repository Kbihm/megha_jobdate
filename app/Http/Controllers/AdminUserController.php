<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class AdminUserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin-user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin-user.show', compact('user'));
    }

}
