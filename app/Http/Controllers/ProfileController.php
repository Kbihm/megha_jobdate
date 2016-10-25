<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joboffer;
use App\Http\Requests;
use App\User;
use Auth;
use App\Employee;

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
    //Relevant for availability calendar
        $today = getdate();
        $start = mktime(0,0,0,$today['mon'],$today['mday'],$today['year']);
        $first = getdate($start);
    //set end date to 2 weeks from when the calendar starts
        $end = mktime(0,0,0,$first['mon'],$today['mday']+14,$first['year']);
        $last = getdate($end);
    //Please confirm if this is efficient. Otherwise change  //
        $self_user = Auth::user();
        $user = Employee::where('id', $id)->first();
        if($self_user->employer_id != null){
            $jobs = Joboffer::where('employer_id', $self_user->employer->id)->get();

            return view('user.show', compact('user', 'jobs', 'first', 'last'));
        }


        return view('user.show', compact('user', 'first', 'last'));
    }

}
