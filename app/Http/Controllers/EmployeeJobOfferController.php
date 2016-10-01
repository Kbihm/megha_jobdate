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
        $joboffers = [];

        // This could be done better.
        for ($i = 0; $i < sizeOf($user->employee->invites); $i++) {
            array_push($joboffers, $user->employee->invites[$i]->joboffer);
        }

        return view('employee-joboffer.index', compact('joboffers'));
    }

}
