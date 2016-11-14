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
        $end = mktime(0,0,0,$first['mon'],$today['mday']+13,$first['year']);
        $last = getdate($end);

        if($first['mon']+1 == $last['mon']){
            $daytarget = $this->days_in_month($first['mon'], $first['year']);
        }
        else{
            $daytarget = $last['mday'];
        }

    //Please confirm if this is efficient. Otherwise change  //
        $self_user = Auth::user();
        $user = Employee::where('id', $id)->first();
        $user->calc_rating();
        if($self_user->employer_id != null){
            $jobs = Joboffer::where('employer_id', $self_user->employer->id)->get();

            return view('user.show', compact('user', 'jobs', 'first', 'last', 'daytarget'));
        }

        return view('user.show', compact('user', 'first', 'last', 'daytarget'));
    }

    function days_in_month($month, $year) 
    { 
    // calculate number of days in a month 
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
    } 

    public function search(Request $request)
    {
        dd($request);
        //want dd/mm/yyyy, have , mm/dd/yyyy
        //test[0] = month, [1] = date, [2] = year
        $dates = explode('/', $request->date);
        $datetouse = $dates[2].'-'.$dates[0].'-'.$dates[1];
        //dd($datetouse);
        return view('user.index', compact('results'));
    }

}


