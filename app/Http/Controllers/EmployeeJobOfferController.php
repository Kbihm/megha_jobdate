<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Joboffer;
use Auth;

class EmployeeJobOfferController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }

    public function index()
    {
        $user = Auth::user();
        $joboffers = Joboffer::all();
        return view('employee-joboffer.index', compact('joboffers'));
    }

}
