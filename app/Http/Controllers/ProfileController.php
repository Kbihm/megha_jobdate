<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joboffer;
use App\Http\Requests;
use App\User;
use Auth;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employer');
    }

    public function index() 
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show($id) 
    {
    //Please confirm if this is efficient. Otherwise change  //
        $self_user = Auth::user();
        $user = User::find($id);
        if($self_user->employer_id != null){
            $jobs = Joboffer::where('employer_id', $self_user->employer_id)->get();
            return view('user.show', compact('user', 'jobs'));
        }
        return view('user.show', compact('user'));
    }

}
