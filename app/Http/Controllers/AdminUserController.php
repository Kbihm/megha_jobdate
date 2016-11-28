<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banned;
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

        if(!isset($users)){
             $users = User::paginate(30);
        }

        return view('admin-user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $banned = Banned::where('user_id', $id)->first();   
        return view('admin-user.show', compact('user', 'banned'));
    }

        function searchByEmail(Request $request) 
    { 
        $users = User::where('email', 'LIKE', "%$request->search%")
                    ->paginate(30);
        return view('admin-user.index', compact('users'));
    } 

}
