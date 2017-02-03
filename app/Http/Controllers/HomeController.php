<?php

namespace App\Http\Controllers;

use Auth;
use App\Joboffer;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->employer_id != null){
                    $joboffers = Joboffer::where([
            ['status', '=', 'accepted'],
            ['employer_id', '=', Auth::user()->employer->id],
            ['date', '<',  date("Y-m-d")],
            ['review_left', '=', 0]
        ])->get();
        return view('home', compact('joboffers'));
        }
        if(Auth::User()->employee_id != null){

        $review = Comment::where('employee_id', '=', Auth::User()->employee->id)->orderBy("updated_at", "asc")->first();

        return view('home', compact('review'));
        }
        return view('home');

    }
}
